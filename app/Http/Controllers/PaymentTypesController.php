<?php

namespace App\Http\Controllers;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaymentTypesController extends Controller
{
    public function index()
    {
        $PaymentTypes = PaymentTypes::paginate();

        return view('payment-types.index', compact('PaymentTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $PaymentTypes->perPage());
    }
    public function create()
    {
        $PaymentTypes = new PaymentTypes();
        return view('payment-types.create', compact('PaymentTypes'));
    }
    public function store(Request $request)
    {
        request()->validate(PaymentTypes::$rules);

        $PaymentType = PaymentTypes::create($request->all());

        $discounts = $request->input('discounts');
        $taxes = $request->input('taxes');
    
       // Asociar discounts y taxes impositivas al tipo de pago
        if (!empty($discounts)) {
            foreach ($discounts as $discount) {
                $PaymentType->descuentoSueldo()->create([
                    'name' => $discount['name'],
                    'percentage' => $discount['percentage']
                ]);
            }
        }
        
        if (!empty($taxes)) {
            foreach ($taxes as $tax) {
                $PaymentType->cargaImpositiva()->create([
                    'name' => $tax['name'],
                    'percentage' => $tax['percentage']
                ]);
            }
        }


        return redirect()->route('payment-types.index')
            ->with('success', 'PaymentTypes created successfully.');
    }
    public function show($id)
    {
        $PaymentTypes = PaymentTypes::find($id);

        return view('payment-types.show', compact('PaymentTypes'));
    }

    public function edit($id)
    {
        $PaymentTypes = PaymentTypes::find($id);

        return view('payment-types.edit', compact('PaymentTypes'));
    }
    public function update(Request $request, PaymentTypes $PaymentTypes)
    {
        request()->validate(PaymentTypes::$rules);

        $PaymentTypes->update($request->all());

        $discounts = $request->input('discounts');
        $taxes = $request->input('taxes');

        // Eliminar descuentos y cargas impositivas previas del tipo de pago
        $PaymentTypes->descuentoSueldo()->delete();
        $PaymentTypes->cargaImpositiva()->delete();

        // Asociar descuentos y cargas impositivas actualizados al tipo de pago
        if (!empty($discounts)) {
            foreach ($discounts as $discount) {
                $PaymentTypes->descuentoSueldo()->create([
                    'name' => $discount['name'],
                    'percentage' => $discount['percentage']
                ]);
            }
        }
        
        if (!empty($taxes)) {
            foreach ($taxes as $tax) {
                $PaymentTypes->cargaImpositiva()->create([
                    'name' => $tax['name'],
                    'percentage' => $tax['percentage']
                ]);
            }
        }

        return redirect()->route('payment-types.index')
            ->with('success', 'PaymentTypes updated successfully.');
    }
    public function destroy($id)
    {

        $PaymentTypes = PaymentTypes::find($id)->delete();
        $PaymentTypes->descuentoSueldo()->delete();
        $PaymentTypes->cargaImpositiva()->delete();

        return redirect()->route('payment-types.index')
            ->with('success', 'PaymentTypes deleted successfully');
    }
}
