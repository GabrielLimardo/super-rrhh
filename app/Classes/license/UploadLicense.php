<?php

namespace App\Classes\license;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\License;
use Dompdf\Dompdf;
use App\Models\LicenseType;
use App\Models\LicenseDaysUser;
use App\Models\LicenseFlow;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LicenseImport;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

class UploadLicense
{
    protected $request;
    protected $LicenseType;
    protected $LicenseFlow;

    public function __construct(array $data)
    {
        $this->request = $data['request'];
        $this->LicenseType = LicenseType::find($this->request->license_type_id);
    }
    public function process()
    {
        $filePath = $this->pdfmaker();
        if ( $this->request->masive == 1) {
            $file = $this->request->file('file');

            $spreadsheet = IOFactory::load($file);
    
            $rows = $spreadsheet->getActiveSheet()->toArray();
            // Recupera los datos importados y haz algo con ellos     
            $data = array();   
            foreach ($rows as $row) {
                $user_id = User::where('labor_profile',$row[0])->first()->id;
                $since = $row[1];
                $until = $row[2];
                $days = Carbon::parse($since)->diffInDays(Carbon::parse($until));
                if ($this->hasAvailableDays($days)){
                    $data[] = array('id' => $user_id, 'since' =>Carbon::createFromFormat('d/m/Y', $since)->format('Y-m-d'), 'until' => Carbon::createFromFormat('d/m/Y', $until)->format('Y-m-d'));
                }
            }
            $result = $this->upload($data, $filePath);
            return $result;

        }else {
            $user_id = User::find($this->request->user_id)->id;
            $since = $this->request->since;
            $until = $this->request->until;
            $days = Carbon::parse($since)->diffInDays(Carbon::parse($until));
            if ($this->hasAvailableDays($days)){
                $data[] = array('id' => $user_id, 'since' => $since, 'until' => $until);
            }else {
                return 'El usuario no tiene suficientes días disponibles para esa licencia';
            }
            $result = $this->upload($data, $filePath);
            return $result;
        }
 
    }
    public function pdfmaker()
    {
        $html = '<p>Este es un documento predeterminado hecho para el pedido de la licencia tipo '.$this->LicenseType->name.' que se va a efectuar desde '.$this->request->since.' hasta '.$this->request->until.'</p>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();
        //TODO cambiar organization y poner seguridad que no pueda subir si no esta registrado en esa organization el tipo de documento
        $usuario = 1;
        $file_name = date('Ymd_His') . '_' . $usuario . '_' . uniqid() . '.pdf';
        $organization = 1;
        $route = $organization . '/';
        Storage::disk('fs_disk')->put($route . $file_name, $pdfContent);
        $path = Storage::disk('fs_disk')->path($route . $file_name);

        return $file_name;
    }

    public function upload($users,$filePath)
    {
        $licensesData = [];       
        foreach ($users as $user) {
            if ( $this->request->masive == 1) {
                $file_name = date('Ymd_His') . '_' . $user['id'] . '_' . uniqid() . '.pdf';
                //todo editar organization y user
                $organization = 1;
                $route = $organization . '/';
                $path = Storage::disk('fs_disk')->path($route . $filePath);
                $new_path = Storage::disk('fs_disk')->path($route . $file_name);
                copy($path, $new_path);
                $filePath = $file_name;
                $fechasince = Carbon::createFromFormat('d/m/Y', $user['since']);
                $fechaFormateadaSince = $fechasince->format('Y-m-d');
                $fechauntil = Carbon::createFromFormat('d/m/Y', $user['since']);
                $fechaFormateadaUntil = $fechauntil->format('Y-m-d');
                $user['since'] = $fechaFormateadaSince;
                $user['until'] = $fechaFormateadaUntil;
            }
            $data = [
                'file_path' => $filePath,
                'license_type_id' => $this->LicenseType->id,
                'state_id' => LicenseFlow::where('license_type_id', $this->request->license_type_id)->first()->id,
                'user_id' => $user['id'],
                'dissatisfied_text' => NULL,
                'extra_filter' => NULL,
                'employers_sees' => 1,
                'since' => $user['since'],
                'until' => $user['until']
            ];

            array_push($licensesData, $data);
        }

        License::insert($licensesData);
        return 'ready';
    }
    public function hasAvailableDays($requestedDays)
    {
        $userId = $this->request->user_id;
        $licenseTypeId = $this->LicenseType->id;

        $licenseDaysUser = LicenseDaysUser::where('user_id', $userId)
            ->where('license_type_id', $licenseTypeId)
            ->first();

        if (!$licenseDaysUser) {
            // El usuario no tiene asignados días disponibles para esta licencia
            return false;
        }

        $availableDays = $licenseDaysUser->available - $licenseDaysUser->used;

        if ($availableDays >= $requestedDays) {
            // El usuario tiene suficientes días disponibles para la licencia solicitada
            $licenseDaysUser->used += $requestedDays;
            $licenseDaysUser->save();
            return true;
        } else {
            // El usuario no tiene suficientes días disponibles para la licencia solicitada
            return false;
        }
    }
}