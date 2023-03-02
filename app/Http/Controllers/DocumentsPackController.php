<?php

namespace App\Http\Controllers;

use App\DocumentsPack;
use Illuminate\Http\Request;

/**
 * Class DocumentsPackController
 * @package App\Http\Controllers
 */
class DocumentsPackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentsPacks = DocumentsPack::paginate();

        return view('documents-pack.index', compact('documentsPacks'))
            ->with('i', (request()->input('page', 1) - 1) * $documentsPacks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentsPack = new DocumentsPack();
        return view('documents-pack.create', compact('documentsPack'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DocumentsPack::$rules);

        $documentsPack = DocumentsPack::create($request->all());

        return redirect()->route('documents-packs.index')
            ->with('success', 'DocumentsPack created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documentsPack = DocumentsPack::find($id);

        return view('documents-pack.show', compact('documentsPack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documentsPack = DocumentsPack::find($id);

        return view('documents-pack.edit', compact('documentsPack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DocumentsPack $documentsPack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentsPack $documentsPack)
    {
        request()->validate(DocumentsPack::$rules);

        $documentsPack->update($request->all());

        return redirect()->route('documents-packs.index')
            ->with('success', 'DocumentsPack updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documentsPack = DocumentsPack::find($id)->delete();

        return redirect()->route('documents-packs.index')
            ->with('success', 'DocumentsPack deleted successfully');
    }
}
