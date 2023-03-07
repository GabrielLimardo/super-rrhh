<?php

namespace App\Classes\document;

use App\Models\User;
use App\Models\DocumentsPack;
use App\Models\Document;

class UploadDocument
{
    protected $request;
    protected $masive;
    protected $file_name;
    protected $file_path;
    protected $document_pack;
    public function __construct(array $data)
    {
        $this->request = $data['request'];
        $this->masive = $data['masive'];
        $this->document_pack = DocumentsPack::create(['name' => date('Y-m-d_H:i:s') . '_' . uniqid()]);
    }
    public function query()
    {
        $type_upload = $this->request->input('type_upload');
        switch ($type_upload) {
            case 'organization':
                $query = User::query();
                $company = $this->request->input('company');
                if ($company) {
                    $query->where('company_id', $company);
                    $branches = $this->request->input('branches');
                    if ($branches) {
                        $query->Where('branches_id', $branches);
                        $managements = $this->request->input('managements');
                        if ($managements) {
                            $query->Where('managements_id', $managements);
                        }
                    }
                }
                break;
            case 'labor_profile':
                // Hacer algo cuando type_upload sea igual a 'legajo'
                $labor_profile = explode(",", $this->request->labor_profile);
                if (empty($labor_profile)) {
                    $query = User::whereIn('labor_profile', $labor_profile)->get();
                }
                break;

            default:
                // Hacer algo cuando type_upload sea igual a 'documento'
                $document_nro = explode(",", $this->request->document_nro);
                if (!empty($document_nro)) {
                    $query = User::whereIn('document_nro', $document_nro)->get();
                }
                break;
        }
        return $query;
    }
    public function array($query)
    {
        //TODO $usuario = Auth::user()->id;
        $usuario = 1;
        $file_name_one = date('Ymd_His') . '_' . $usuario . '_' . uniqid() . '.pdf';
        $documentos = $query->map(function ($usuario)use ($file_name_one) {
            //TODO $user =  Auth::user()->id;
            $file_name = $this->masive ? $file_name_one : date('Ymd_His') . '_' . $usuario->id . '_' . uniqid() . '.pdf';
            return [
                'file_path' => $file_name,
                'document_type_id' => 1,
                'state_id' => 1,
                'user_id' => $usuario->id,
                'dissatisfied_text' => null,
                'extra_filter' => null,
                'employers_sees' => 1,
                'publication_date' => now(),
                // establecer la fecha de publicación actual
                'period' => null,
                'document_pack_id' => $this->document_pack->id,
            ];
        });
        return $documentos;
    }
    public function store_file($route, $file_name,$file)
    {
        $file->storeAs($route, $file_name, 'fs_disk');
    }

    public function masive_document($file,$basename_file,$route )
    {
        $fileName = $file->getClientOriginalName();
        if ($basename_file == 'document_nro') {
            $validation = $this->validateDocuments($fileName, $basename_file);
        }else {
            $validation =  $this->validateDocuments($fileName, $basename_file);
        }
   
        if ($validation['valid']) {

            $query = User::where('id', $validation['user']->id)->get();

            // Call the array() function to build the array of documents
            $documentos_array = $this->array($query);
            $file_name= $documentos_array[0]['file_path'];
            $this->store_file($route, $file_name, $file);
            // Loop through the array of documents and save each one
            foreach ($documentos_array as $documento_array) {
                $documento = new Document($documento_array);
                $documento->save();
                $documentos[] = $documento->id;
            }
        } else {
            $doc = [
                'nombre' => $fileName,
                'error' => $validation['msj']
            ];
            $errores[] = $doc;
        }
    }

    public static function validateDocuments($fileName, $basename_file) {
        $errors = [];
        $dni = explode(".", $fileName);
        $user = null;
        
        if ($basename_file == 'document_nro') {
            $user = User::where('document_nro', $dni[0])->first();
        } else {
            $user = User::where('labor_profile', $dni[0])->first();
        }
    
        if (!$user) {
            $errors[] = 'User not found';
        }

    
        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'user' => $user
        ];
    }

}