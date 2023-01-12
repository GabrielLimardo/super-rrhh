<?php

namespace App\Http\Controllers;

use App\Models\Organization;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\OrganizationConfig;
use App\Models\Status;

/**
 * Class OrganizationController
 * @package App\Http\Controllers
 */
class OrganizationController extends Controller
{

    public function index()
    {
        $organizations = Organization::where('id',Auth::user()->organization_id)->paginate();

        return view('organization.index', compact('organizations'))
            ->with('i', (request()->input('page', 1) - 1) * $organizations->perPage());
    }

    public function create()
    {
        $organization = new Organization();
        $organizationConfig = new OrganizationConfig();
        return view('organization.create', compact('organization','organizationConfig'));
    }

    public function store(Request $request)
    {
        // request()->validate(Organization::$rules);
    

        if (is_null(Auth::user()->organization_id)) {

            $organization = Organization::create($request->all());

            $organization = OrganizationConfig::create([
                'organization_id'=> $organization->id,
                'send_email'=> $request->send_email,
                'send_signature_email'=> $request->send_signature_email,
                'dissatisfied'=> $request->dissatisfied,
                'watch'=> $request->watch,
                'download'=> $request->download,
                'sign_first'=>$request->sign_first
            ]);

            $this->status_make_root($organization->id);

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
        $organizationConfig = OrganizationConfig::where('organization_id',$id)->first();

        return view('organization.show', compact('organization','organizationConfig'));
    }

    public function edit($id)
    {
        $organization = Organization::find($id);
        $organizationConfig = OrganizationConfig::where('organization_id',$id)->first();

        return view('organization.edit', compact('organization','organizationConfig'));
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


    public function status_make_root($id)
    {
        Status::create([
            'organization_id' => $id,
            'name' => 'uploaded',
        ]);
        Status::create([
            'organization_id' => $id,
            'name' => 'signed',
        ]);
        Status::create([
            'organization_id' => $id,
            'name' => 'dissatisfied',
        ]);
    }
  
}
