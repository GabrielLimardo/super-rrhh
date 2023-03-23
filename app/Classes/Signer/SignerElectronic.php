<?php 

namespace App\Classes\Signer;


use App\Bank\Signer\OnAllPages as AppearanceOnAllPages;
use App\Bank\DataBase\DataBase as DB;
use App\Bank\Signer\Certificado;
use SetaPDF_Core_Writer_File;
use SetaPDF_Core_Document;
use SetaPDF_Signer;
use SetaPDF_Signer_SignatureField;
use SetaPDF_Signer_Signature_Module_Cms;
use SetaPDF_Signer_Signature_Appearance_Dynamic;
use App\Bank\Notificacion\NotificacionRecibo as Mail; 
use Illuminate\Support\Facades\Log;

class SignerElectronic {

    protected $documento;
    protected $usuario;
    protected $siguiente_estado;
    protected $tipo_doc;
    protected $cliente;
    protected $clave_firma;
    protected $certificado_firma;
    protected $path;
    protected $error = array();
    protected $coordenadas = array();
    protected $db;
    protected $company;

    public function __construct(array $data)
    {
        $this->company = $data['db'];
        $this -> db = new DB($data['db']);
        $this -> siguiente_estado = $data['siguiente_estado'];
        $this -> usuario =    $this -> db -> getUsuarios($data['usuario']);
        $this -> documento =   $this -> db -> getDocumentos($data['documento']);
        $this -> tipo_doc =  $this -> db -> getTiposDocumentos($this -> documento -> id_tipo_documento);

        $doc = explode("-", $this -> documento -> nombre_archivo);
        $this -> path = env('FS') . $data['db']  . '/documentos/' . $doc[0] . '/'  . $doc[1] . '/' . $doc[2] . '/' . $doc[3] . '/' .  $doc[4] . '/' . $this -> documento -> nombre_archivo;

        $this -> coordenadas = [
            'x' => 0,
            'y' => 0,
            'w' => 180,
            'h' => 60,
        ];

    }

    public function notificacion(){

       try{
          Log::debug('envia mail: '.$this -> documento -> id . 'estado: '.$this -> siguiente_estado);
          $db =  new DB($this->company);
          $notificacion = new Mail($db, $this -> documento -> id,  $this -> siguiente_estado);
          $notificacion -> envioMail();
       }
       catch (\Exception $e) {
        return true;
       }

    }



    public function validaciones(){ // -> Valida la informacion del Usuario y el Documeno al cual se quiera firmar, caso contrario guarda los errores
             
            if(!$this -> usuario){ // -> Validar Usuario
               $this -> error[] = 'Usuario no encontrado';
            }
            else{ // Si exite conpruebo si tiene su clave secreta y certificado

                
                $exadecimal = explode("-", $this -> usuario -> certificado_firma); // Si tiene este caracter no es hexadecimal

                if( empty($this -> usuario -> key_secret) || empty($this -> usuario -> certificado_firma) || count($exadecimal) > 1){ //En el caso de que no tenga, se le creara una
                    
                    $cert = new Certificado($this -> usuario);
                    $data = $cert -> newCertificado(); 
                    $this -> db -> setCertificado($this -> usuario -> id,  $data['KEY'], $data['CERT']); 
                    
                    $this -> clave_firma = $data['KEY'];
                    $this -> certificado_firma = $data['CERT'];

                 }
                 else{
                    $this -> clave_firma = $this -> usuario -> key_secret;
                    $this -> certificado_firma = $this -> usuario -> certificado_firma;
                 }
        
            }

            if(!$this -> documento){ // -> Validar Documento
                $this -> error[] = 'Documento no encontrado';
             }
            else { // Si exite conpruebo se encuntra su documento en su PATH correspodiente

                if(!file_exists($this -> path)){
                    $this -> error[] = 'ID_DOCUMENTO: ' . $this -> documento -> id . ' NO REGISTRADO EN EL FS ' . $this -> path;
                }

                if(!$this -> tipo_doc){ // -> Validar el Tipo de documento
                    $this -> error[] = "ID_TIPO_DOCUMENTO: " . $this -> documento -> id_tipo_documento . ' NO REGISTRADO';
                }
                else{

                    if($this -> documento -> id_tipo_estado == 3){ // -> Si es Empleador
                        
                        $this -> coordenadas = [
                            'x' => $this -> tipo_doc -> c_empleador_x,
                            'y' => $this -> tipo_doc -> c_empleador_y,
                            'w' => $this -> tipo_doc -> ancho_empleador,
                            'h' => $this -> tipo_doc -> alto_empleador,
                        ];
                    }

                    else if($this -> documento -> id_tipo_estado == 4){ // -> Si es Empleado

                        $this -> coordenadas = [
                            'x' => $this -> tipo_doc -> c_empleado_x,
                            'y' => $this -> tipo_doc -> c_empleado_y,
                            'w' => $this -> tipo_doc -> ancho_empleado,
                            'h' => $this -> tipo_doc -> alto_empleado,
                        ];
                    }

                    else {
                        $this -> error[] = 'EL DOCUMENTO NO SE ENCUENTRA EN NINGUN ESTADO DE FIRMA';
                    }

                }
             }


        if(count($this -> error) > 0){
            return false;
        }
         
        return true;
     }

    //  CAPTURA DE ERRORES
    public function getErrores(){
        return $this -> error;
    } 

    //  FIRMA ELECTRONICA
    public function signer(){ 

        if(!$this -> validaciones()){ // -> Validacion principal
            return false;
        }

        //Creo un nuevo PATH del documento a usar
        $namefile = public_path('docs'). '/' . $this -> usuario -> id .'_doc.pdf';

        //Copio el documento original y elimino el documento anterior
        copy($this -> path,$namefile);
        

        // crear una instancia de firmante
        $writer = new SetaPDF_Core_Writer_File( $this -> path ); // La salida va a ser en el PATH eliminado
        $document = SetaPDF_Core_Document::loadByFilename($namefile, $writer);
        
        // crear una instancia de firmante
        $signer = new SetaPDF_Signer($document);
        
        // añadir un campo de firma visible
        $field = $signer->addSignatureField(
            SetaPDF_Signer_SignatureField::DEFAULT_FIELD_NAME,
            1,
            SetaPDF_Signer_SignatureField::POSITION_LEFT_TOP,
            ['x' => $this -> coordenadas['x'], 'y' => $this -> coordenadas['y']],
            $this -> coordenadas['w'],
            $this -> coordenadas['h']
        );
        
        // y define que quieres usar este campo
        $signer->setSignatureFieldName($field->getQualifiedName());
        
        
        // ahora crea un módulo de firma
        $module = new SetaPDF_Signer_Signature_Module_Cms();

        // pasar la ruta al certificado
        $module->setCertificate(hex2bin($this -> certificado_firma));
        $module->setPrivateKey(hex2bin($this -> clave_firma));
        
        // ahora cree el módulo de apariencia y pase el módulo de firma
        $appearance = new SetaPDF_Signer_Signature_Appearance_Dynamic($module);
        
        // Establecer la firma xObject como gráfica
        $appearance->setGraphic(false);

        $appearance->setShow(
            SetaPDF_Signer_Signature_Appearance_Dynamic::CONFIG_DISTINGUISHED_NAME, false
        );

        $appearance->setShowTpl(
            SetaPDF_Signer_Signature_Appearance_Dynamic::CONFIG_DATE, 'Fecha: %s'
        );

        $appearance->setShowTpl(
            SetaPDF_Signer_Signature_Appearance_Dynamic::CONFIG_NAME,
            'Firmado electrónicamente por: %s'
        );
        // format the date
        $appearance->setShowFormat(
            SetaPDF_Signer_Signature_Appearance_Dynamic::CONFIG_DATE, 'd.m.Y H:i:s'
        );

        // pasar el módulo de apariencia envuelto en la clase de proxy a la instancia del firmante
        $signer->setAppearance(new AppearanceOnAllPages($appearance));

        
        // firmar el documento
        $signer->sign($module);

        // Una ves firmado elimino el documento temporal
        unlink($namefile);

        $this -> notificacion(); // Se notifica

        $this -> db -> setEstadoDocumento($this -> documento -> id, $this -> siguiente_estado );
        $this -> db -> setEstadoEnvios($this -> documento -> id);

        return true;
    }




}