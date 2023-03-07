<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\FromArray;

class LicenseImport implements FromArray
{
    public function array(array $array)
    {

        return $array;
    }
}