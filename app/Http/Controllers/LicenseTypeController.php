<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LicenseType;
use App\Models\User;
use App\Models\LicenseDaysUser;

class LicenseController extends Controller
{
    public function index()
    {
        $LicenseTypes = LicenseType::paginate();

        return view('license-type.index', compact('LicenseTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $LicenseTypes->perPage());
    }
    public function create()
    {
        $LicenseType = new LicenseType();
        $states = Status::where('organization_id',Auth::user()->organization_id)->get();
        // return view('license-type.create', compact('LicenseType','states'));
        return view('license-type.create', compact('LicenseType','states'));

    }
    public function store(Request $request)
    {
        $licenseType = new LicenseType();
        $licenseType->name =  $request->input('name');
        $licenseType->has_photo = $request->input('has_photo', false);
        $licenseType->save();

        $statuses = $request->status;

        $array_status = collect($statuses)->map(function ($status) {
            return [
                'state_id' => $status,
            ];
        })->toArray();

        $licenseType->licenseFlows()->sync($array_status);

        $licenseTypeId = $licenseType->id;
        $type = $request->input('type');

        if ($type === 'specific') {
            // Get the uploaded file
            $file = $request->file('file');

            // Process the file
            $rows = array_map('str_getcsv', file($file));
            foreach ($rows as $row) {
                $laborProfileId = $row[0];
                $days = $row[1];

                // Save the license days for this labor profile and license type
                $licenseDaysUser = new LicenseDaysUser();
                $licenseDaysUser->license_type_id = $licenseTypeId;
                $licenseDaysUser->labor_profile_id = $laborProfileId;
                $licenseDaysUser->available = $days;
                $licenseDaysUser->used = 0;
                $licenseDaysUser->save();
            }
        } else {
            // Get the number of available days
            $days = $request->input('days');

            // Save the license days for all labor profiles and this license type
            //TODO cambiar  1 por Auth::user()->organization_id 
            $Users = User::where('organization_id', Auth::user()->organization_id)->get();
            foreach ($Users as $user) {

                $licenseDaysUser = new LicenseDaysUser();
                $licenseDaysUser->license_type_id = $licenseTypeId;
                $licenseDaysUser->user_id = $user->id;
                $licenseDaysUser->available = $days;
                $licenseDaysUser->used = 0;
                $licenseDaysUser->save();
                
            }
          
        }

        return redirect()->route('license-types.index')
            ->with('success', 'LicenseType created successfully.');
    }
    public function show($id)
    {
        $LicenseType = LicenseType::find($id);

        return view('license-type.show', compact('LicenseType'));
    }
    public function edit($id)
    {
        $LicenseType = LicenseType::find($id);
        $states = Status::where('organization_id',Auth::user()->organization_id)->orwhere('organization_id',NULL);

        return view('license-type.edit', compact('LicenseType','states'));
    }
    public function update(Request $request, LicenseType $LicenseType)
    {
        $licenseType = LicenseType::findOrFail($id);

        $licenseType->name = $request->input('name');
        $licenseType->has_photo = $request->input('has_photo', false);
        $licenseType->save();
    
        $statuses = $request->status;
        $array_status = collect($statuses)->map(function ($status) {
            return [
                'state_id' => $status,
            ];
        })->toArray();
    
        $licenseType->licenseFlows()->sync($array_status);
    
        $licenseTypeId = $licenseType->id;
        $type = $request->input('type');
    
        if ($type === 'specific') {
            // Get the uploaded file
            $file = $request->file('file');
    
            // Process the file
            $rows = array_map('str_getcsv', file($file));
            foreach ($rows as $row) {
                $laborProfileId = $row[0];
                $days = $row[1];
    
                // Update or create the license days for this labor profile and license type
                LicenseDaysUser::updateOrCreate([
                    'license_type_id' => $licenseTypeId,
                    'labor_profile_id' => $laborProfileId,
                ], [
                    'available' => $days,
                    'used' => 0,
                ]);
            }
        } else {
            // Get the number of available days
            $days = $request->input('days');
    
            // Update or create the license days for all labor profiles and this license type
            $users = User::where('organization_id', Auth::user()->organization_id)->get();
            foreach ($users as $user) {
                LicenseDaysUser::updateOrCreate([
                    'license_type_id' => $licenseTypeId,
                    'user_id' => $user->id,
                ], [
                    'available' => $days,
                    'used' => 0,
                ]);
            }
        }

        return redirect()->route('license-types.index')
            ->with('success', 'LicenseType updated successfully');
    }
    public function destroy($id)
    {
        $LicenseType = LicenseType::find($id)->delete();

        return redirect()->route('license-types.index')
            ->with('success', 'LicenseType deleted successfully');
    }

}
