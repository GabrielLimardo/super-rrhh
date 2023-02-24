<?php

namespace App\Imports;

use App\Models\PaymentHistory;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PaymentHistoryImport implements ToModel, WithHeadingRow, WithValidation,  WithBatchInserts, WithChunkReading, ShouldQueue, SkipsOnFailure, SkipsEmptyRows
{
    use Importable, SkipsFailures;


    public function model(array $row)
    {
        //TODO cambiar 1 por Auth::user()->organization_id
        $user = User::where('labor_profile',$row['Profile Labor'])->where('organization_id', 1);
        if ($user) {

            //TODO fijarse si se van a dejar guardar varios paymenthistoric
            // $paymentHistory = PaymentHistory::where('user_id', $user->id)->latest()->get();
            // if ($paymentHistory->count() >= 5) {
            //     $paymentHistory[0]->delete();
            // }
            
            PaymentHistory::updateOrCreate([
                'user_id' => $user->id,
                'amount' =>$row['Salary'],
            ]);
        }
       
    }
    public function rules(): array
    {
        return [
            ];


    }
    public function batchSize(): int
    {
        return 600;
    }
    public function chunkSize(): int
    {
        return 1000;
    }

}
