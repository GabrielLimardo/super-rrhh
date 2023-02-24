<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\DocumentStatus;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::paginate();

        return view('document-type.index', compact('documentTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $documentTypes->perPage());
    }
    public function create()
    {
        $documentType = new DocumentType();
        $states = Status::where('organization_id',Auth::user()->organization_id)->get();
        // return view('document-type.create', compact('documentType','states'));
        return view('document-type.create', compact('documentType','states'));

    }
    public function store(Request $request)
    {
        // dd($request->listField);
        request()->validate(DocumentType::$rules);

        $documentType = DocumentType::create($request->all());
        $statuses = $request->status;

        $array_status = collect($statuses)->map(function ($status) {
            return [
                'status_id' => $status,
            ];
        })->toArray();

        $documentType->DocumentStatus()->sync($array_status);

        return redirect()->route('document-types.index')
            ->with('success', 'DocumentType created successfully.');
    }
    public function show($id)
    {
        $documentType = DocumentType::find($id);

        return view('document-type.show', compact('documentType'));
    }
    public function edit($id)
    {
        $documentType = DocumentType::find($id);
        $states = Status::where('organization_id',Auth::user()->organization_id);

        return view('document-type.edit', compact('documentType','states'));
    }
    public function update(Request $request, DocumentType $documentType)
    {
        request()->validate(DocumentType::$rules);
        
        $documentType->update($request->all());

        // $array_listField = preg_split("/,/",$request->listField);
        $statuses = $request->status;
        $array_status = collect($statuses)->map(function ($status) {
            return [
                'status_id' => $status,
            ];
        })->toArray();

        $documentType->DocumentStatus()->sync($array_status);

        return redirect()->route('document-types.index')
            ->with('success', 'DocumentType updated successfully');
    }
    public function destroy($id)
    {
        $documentType = DocumentType::find($id)->delete();

        return redirect()->route('document-types.index')
            ->with('success', 'DocumentType deleted successfully');
    }
}
