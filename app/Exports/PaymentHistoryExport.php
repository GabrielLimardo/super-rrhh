<?php

namespace App\Exports;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PaymentHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PaymentHistoryResource;

class PaymentHistoryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        //TODO cambiar 1 por Auth::user()->organization_id
       return PaymentHistoryResource::collection(User::select(['users.*', 'payment_history.amount'])
        ->where('organization_id', 1)
        ->leftJoin('payment_history', function ($join) {
            $join->on('users.id', '=', 'payment_history.user_id')
                ->whereRaw('payment_history.id = (select max(id) from payment_history where user_id = users.id)');
        })
        ->select('name', 'last_name', 'labor_profile', 'amount') // Agregar labor_profile aquí
        ->get());

    }
    public function headings(): array
    {
        return [
            'Name',
            'Last Name',
            'Profile Labor',
            'Salary',
        ];
    }


}
