<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $management = Management::paginate();

        return view('management.index', compact('management'))
            ->with('i', (request()->input('page', 1) - 1) * $management->perPage());
    }
    public function create()
    {
        $management = new Management();
        return view('management.create', compact('management'));
    }
    public function store(Request $request)
    {
        request()->validate(Management::$rules);

        $management = Management::create($request->all());

        return redirect()->route('management.index')
            ->with('success', 'Management created successfully.');
    }
    public function show($id)
    {
        $management = Management::find($id);

        return view('management.show', compact('management'));
    }
    public function edit($id)
    {
        $management = Management::find($id);

        return view('management.edit', compact('management'));
    }
    public function update(Request $request, Management $management)
    {
        request()->validate(Management::$rules);

        $management->update($request->all());

        return redirect()->route('management.index')
            ->with('success', 'Management updated successfully');
    }
    public function destroy($id)
    {
        $management = Management::find($id)->delete();

        return redirect()->route('management.index')
            ->with('success', 'Management deleted successfully');
    }
}
