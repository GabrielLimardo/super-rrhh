<?php

namespace App\Http\Controllers;

use App\DocumentStatus;
use Illuminate\Http\Request;

/**
 * Class DocumentStatusController
 * @package App\Http\Controllers
 */
class DocumentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentStatuses = DocumentStatus::paginate();

        return view('document-status.index', compact('documentStatuses'))
            ->with('i', (request()->input('page', 1) - 1) * $documentStatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentStatus = new DocumentStatus();
        return view('document-status.create', compact('documentStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DocumentStatus::$rules);

        $documentStatus = DocumentStatus::create($request->all());

        return redirect()->route('document-statuses.index')
            ->with('success', 'DocumentStatus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documentStatus = DocumentStatus::find($id);

        return view('document-status.show', compact('documentStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documentStatus = DocumentStatus::find($id);

        return view('document-status.edit', compact('documentStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DocumentStatus $documentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentStatus $documentStatus)
    {
        request()->validate(DocumentStatus::$rules);

        $documentStatus->update($request->all());

        return redirect()->route('document-statuses.index')
            ->with('success', 'DocumentStatus updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documentStatus = DocumentStatus::find($id)->delete();

        return redirect()->route('document-statuses.index')
            ->with('success', 'DocumentStatus deleted successfully');
    }
}
