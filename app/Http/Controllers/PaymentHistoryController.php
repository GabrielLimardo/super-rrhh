<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use App\Exports\PaymentHistoryExport;
use App\Models\PaymentTypes;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use PDF;


class PaymentHistoryController extends Controller
{
    public function index()
    {
        $paymentHistories = PaymentHistory::paginate();

        return view('payment-history.index', compact('paymentHistories'))
            ->with('i', (request()->input('page', 1) - 1) * $paymentHistories->perPage());
    }
    public function create()
    {
        $paymentHistory = new PaymentHistory();
        return view('payment-history.create', compact('paymentHistory'));
    }

    public function store(Request $request)
    {
        request()->validate(PaymentHistory::$rules);

        $paymentHistory = PaymentHistory::create($request->all());

        return redirect()->route('payment-histories.index')
            ->with('success', 'PaymentHistory created successfully.');
    }
    public function show($id)
    {
        $paymentHistory = PaymentHistory::find($id);

        return view('payment-history.show', compact('paymentHistory'));
    }
    public function edit($id)
    {
        $paymentHistory = PaymentHistory::find($id);

        return view('payment-history.edit', compact('paymentHistory'));
    }
    public function update(Request $request, PaymentHistory $paymentHistory)
    {
        request()->validate(PaymentHistory::$rules);

        $paymentHistory->update($request->all());

        return redirect()->route('payment-histories.index')
            ->with('success', 'PaymentHistory updated successfully');
    }
    public function destroy($id)
    {
        $paymentHistory = PaymentHistory::find($id)->delete();

        return redirect()->route('payment-histories.index')
            ->with('success', 'PaymentHistory deleted successfully');
    }
    public function export()
    {
        $export = new PaymentHistoryExport();
        return Excel::download( $export ,'ExportFile.xlsx');

    }
    public function import(Request $request)
    {

        $file = $request->file('file');

        Excel::import(new UserImport, $file);

        return redirect()->back()->with('success', 'Archivo importado exitosamente.');

    }
    function updatePaymentHistory(Request $request)
    {
        $lastHistories = PaymentHistory::whereIn('user_id', $request->users)
                                        ->selectRaw('user_id, MAX(id) AS max_id')
                                        ->groupBy('user_id')
                                        ->get();

        $lastHistoryData = PaymentHistory::whereIn('id', $lastHistories->pluck('max_id'))
                                            ->get()
                                            ->keyBy('user_id');
                                            
        $newAmounts = collect();
        foreach ($request->users as $userId) {
            $lastAmount = $lastHistoryData->get($userId)->amount ?? 0;
            $newAmount = $lastAmount * (1 + $request->percentage / 100);
            $newAmounts->push([
                'user_id' => $userId,
                'amount' => $newAmount,
            ]);
        }

        foreach ($newAmounts as $newAmount) {
            $historyCount = PaymentHistory::where('user_id', $newAmount['user_id'])->count();
            if ($historyCount >= 5) {
                PaymentHistory::where('user_id', $newAmount['user_id'])
                    ->orderBy('id', 'asc')
                    ->limit($historyCount - 4)
                    ->delete();
            }
            PaymentHistory::create([
                'user_id' => $newAmount['user_id'],
                'amount' => $newAmount['amount'],
            ]);
        }
        return redirect()->back()->with('success', 'Update masivo exitoso.');
    }
    public function masive($paymentType_id, $users_id)
    {
        //TODO tiene que guardarse en la carpeta de cada usuario y levantarse ccomo documento
        foreach ($users_id as $user_id) {
            $this->PDFgenerate($paymentType_id, $users_id);
        }
    }
    public function PDFgenerate($paymentType_id,$user_id)
    {
        $selectedPaymentType = PaymentTypes::find($paymentType_id);
        $selectedUser = User::find($user_id);
        $discounts = $selectedPaymentType->paymentDiscounts;


        $lastPaymentHistory = $selectedUser->paymentHistories()->latest()->first();
        $salary = $lastPaymentHistory->salary;

        $discountsArray = array();
        foreach($discounts as $discount) {
            $name = $discount->name;
            $percentage = $discount->percentage;
            $totalDiscounted = ($salary * $percentage) / 100;
            $discountsArray[] = array('name' => $name, 'percentage' => $percentage, 'total_discounted' => $totalDiscounted);
        }

        $data = array(
            'user' => $selectedUser,
            'paymentType' => $selectedPaymentType,
            'discounts' => $discountsArray,
            'salary' => $salary
        );

        $pdf = PDF::loadView('salary_pdf', $data);

        return $pdf->download('salary.pdf');
    }

}
