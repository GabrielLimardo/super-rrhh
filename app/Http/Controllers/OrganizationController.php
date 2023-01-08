<?php

namespace App\Http\Controllers;

use App\Models\Organization;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/**
 * Class OrganizationController
 * @package App\Http\Controllers
 */
class OrganizationController extends Controller
{

    public function index()
    {
        $organizations = Organization::paginate();

        return view('organization.index', compact('organizations'))
            ->with('i', (request()->input('page', 1) - 1) * $organizations->perPage());
    }

    public function create()
    {
        $organization = new Organization();
        return view('organization.create', compact('organization'));
    }

    public function store(Request $request)
    {
        // request()->validate(Organization::$rules);
    

        if (is_null(Auth::user()->organization_id)) {

            $organization = Organization::create($request->all());

            $user = User::find(Auth::user()->id);
            $user->organization_id =  $organization->id;
            $user->save();


            return redirect()->route('organization.index')
                ->with('success', 'Organization created successfully.');
        }else {
            return redirect()->route('organization.index')
            ->with('error', 'Already an organization was created.');
        }
      
    }

    public function show($id)
    {
        $organization = Organization::find($id);

        return view('organization.show', compact('organization'));
    }

    public function edit($id)
    {
        $organization = Organization::find($id);

        return view('organization.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        // request()->validate(Organization::$rules);

        $organization->update($request->all());

        return redirect()->route('organization.index')
            ->with('success', 'Organization updated successfully');
    }

    public function destroy($id)
    {
        $organization = Organization::find($id)->delete();

        return redirect()->route('organization.index')
            ->with('success', 'Organization deleted successfully');
    }
}
