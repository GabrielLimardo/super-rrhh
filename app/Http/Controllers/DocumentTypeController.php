<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\DocumentStatus;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = DocumentType::paginate();

        return view('document-type.index', compact('documentTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $documentTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentType = new DocumentType();
        $states = Status::where('organization_id',Auth::user()->organization_id)->get();
        // return view('document-type.create', compact('documentType','states'));
        return view('document-type.create', compact('documentType','states'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->listField);
        request()->validate(DocumentType::$rules);

        $documentType = DocumentType::create($request->all());
        $statuses = $request->status;

        $array_status = collect($statuses)->map(function ($status) {
            return [
                'organization_id' => Auth::user()->organization_id,
                'status_id' => $status,
            ];
        })->toArray();

        $documentType->DocumentStatus()->sync($array_status);

        return redirect()->route('document-types.index')
            ->with('success', 'DocumentType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documentType = DocumentType::find($id);

        return view('document-type.show', compact('documentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documentType = DocumentType::find($id);
        $states = Status::where('organization_id',Auth::user()->organization_id);

        return view('document-type.edit', compact('documentType','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DocumentType $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentType $documentType)
    {
        request()->validate(DocumentType::$rules);
        
        $documentType->update($request->all());

        // $array_listField = preg_split("/,/",$request->listField);
        $statuses = $request->status;
        $array_status = collect($statuses)->map(function ($status) {
            return [
                'organization_id' => Auth::user()->organization_id,
                'status_id' => $status,
            ];
        })->toArray();

        $documentType->DocumentStatus()->sync($array_status);

        return redirect()->route('document-types.index')
            ->with('success', 'DocumentType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documentType = DocumentType::find($id)->delete();

        return redirect()->route('document-types.index')
            ->with('success', 'DocumentType deleted successfully');
    }
}
