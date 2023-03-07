<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Classes\license\UploadLicense;

class LicenseController extends Controller
{

    public function index()
    {
        $licenses = License::paginate();

        return view('license.index', compact('licenses'))
            ->with('i', (request()->input('page', 1) - 1) * $licenses->perPage());
    }

    public function create()
    {
        $license = new License();
        return view('license.create', compact('license'));
    }

    public function store(Request $request)
    {
        request()->validate(License::$rules);

        $license = License::create($request->all());

        return redirect()->route('licenses.index')
            ->with('success', 'License created successfully.');
    }

    public function show($id)
    {
        $license = License::find($id);

        return view('license.show', compact('license'));
    }

    public function edit($id)
    {
        $license = License::find($id);

        return view('license.edit', compact('license'));
    }

    public function update(Request $request, License $license)
    {
        request()->validate(License::$rules);

        $license->update($request->all());

        return redirect()->route('licenses.index')
            ->with('success', 'License updated successfully');
    }
    public function destroy($id)
    {
        $license = License::find($id)->delete();

        return redirect()->route('licenses.index')
            ->with('success', 'License deleted successfully');
    }

    public function createLicense(Request $request)
    {
        $data = [
            'request' => $request,
        ];
        $uploadDocument = new UploadLicense($data);

        $result = $uploadDocument->process();

        return $result;

        // return $pdfContent;
    }
}
