<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\companies_x_users;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate();

        return view('company.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * $companies->perPage());
    }
    public function create()
    {
        $company = new Company();
        return view('company.create', compact('company'));
    }
    public function store(Request $request)
    {
        // request()->validate(Company::$rules);

            $company = Company::create($request->all());

            $user = User::find(Auth::user()->id);
            $user->company_id =  $company->id;
            $user->save();

            companies_x_users::create([
                'company_id'=> $company->id,
                'user_id'=>Auth::user()->id
            ]);

            return redirect()->route('companies.index')
                ->with('success', 'Company created successfully.');
    }
    public function show($id)
    {
        $company = Company::find($id);

        return view('company.show', compact('company'));
    }
    public function edit($id)
    {
        $company = Company::find($id);

        return view('company.edit', compact('company'));
    }
    public function update(Request $request, Company $company)
    {
        request()->validate(Company::$rules);

        $company->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }
    public function destroy($id)
    {
        $company = Company::find($id)->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
