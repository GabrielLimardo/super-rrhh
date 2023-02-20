<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SetaPDF_Signer_Pem as Pem;
use App\Models\User;


class CertificadoController extends Controller
{
    
    public static function newCertificado($id)
    {
        $usuario = User::find($id);
    
        $password = config('certificates.password');
        $dn = array(
            "commonName" => $usuario->name . " " . $usuario->last_name,
            "emailAddress" =>  trim($usuario->email),
        );
    
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 4096,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
    
        $privkey = openssl_pkey_new($config);
    
        if (!$privkey) {
            throw new Exception('Unable to generate private key');
        }
    
        $csr = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256'));
    
        if (!$csr) {
            throw new Exception('Unable to generate CSR');
        }
    
        $sscert = openssl_csr_sign($csr, null, $privkey, 365, array('digest_alg' => 'sha256'));
    
        if (!$sscert) {
            throw new Exception('Unable to sign CSR');
        }
    
        openssl_x509_export($sscert, $certout);
        openssl_pkey_export($privkey, $pkout, $password, array('digest_alg' => 'sha256'));
    
        $usuario->certificado_firma =  $certout;
        $usuario->key_secret =  $pkout;
    
        $usuario->save();
    
        return 'Certificate generated successfully';
    }


}
