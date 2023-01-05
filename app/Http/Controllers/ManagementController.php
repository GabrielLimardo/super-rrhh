<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;

/**
 * Class ManagementController
 * @package App\Http\Controllers
 */
class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $management = Management::paginate();

        return view('management.index', compact('management'))
            ->with('i', (request()->input('page', 1) - 1) * $management->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $management = new Management();
        return view('management.create', compact('management'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Management::$rules);

        $management = Management::create($request->all());

        return redirect()->route('management.index')
            ->with('success', 'Management created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $management = Management::find($id);

        return view('management.show', compact('management'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $management = Management::find($id);

        return view('management.edit', compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Management $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        request()->validate(Management::$rules);

        $management->update($request->all());

        return redirect()->route('management.index')
            ->with('success', 'Management updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $management = Management::find($id)->delete();

        return redirect()->route('management.index')
            ->with('success', 'Management deleted successfully');
    }
}
