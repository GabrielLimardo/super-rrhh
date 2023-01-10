<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\DocumentStatus;

use Illuminate\Http\Request;

/**
 * Class DocumentTypeController
 * @package App\Http\Controllers
 */
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
        return view('document-type.create', compact('documentType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DocumentType::$rules);

        $documentType = DocumentType::create($request->all());

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

        return view('document-type.edit', compact('documentType'));
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
