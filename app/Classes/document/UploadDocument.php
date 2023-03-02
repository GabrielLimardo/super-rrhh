<?php

namespace App\Classes\document;
use App\Models\User;
use App\Models\DocumentsPack;
use Illuminate\Support\Facades\Storage;

class UploadDocument
{
    protected $request;
    protected $document_pack;
    public function __construct(array $data)
    {
        $this->request = $data['request'];
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

        $documentos = $query->map(function ($usuario) {
            return [
                'file_path' => 'ruta/al/archivo',
                // reemplazar con la ruta correcta
                'document_type_id' => 1,
                // reemplazar con el ID correcto del tipo de documento
                'state_id' => 1,
                // reemplazar con el ID correcto del estado del documento
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
    public function store_file($request, $organization, $user)
    {
        $storage_path = Storage::disk('fs_disk')->putFileAs($organization, $request->file('document'), date('Ymd_His') . '_' . $user . '_' . uniqid() . '.pdf');
        $file_path = $storage_path;
        return $file_path;
    }
}