<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;


class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::paginate();

        return view('branch.index', compact('branches'))
            ->with('i', (request()->input('page', 1) - 1) * $branches->perPage());
    }

    public function create()
    {
        $branch = new Branch();
        return view('branch.create', compact('branch'));
    }
    public function store(Request $request)
    {
        request()->validate(Branch::$rules);

        $branch = Branch::create($request->all());

        return redirect()->route('branches.index')
            ->with('success', 'Branch created successfully.');
    }
    public function show($id)
    {
        $branch = Branch::find($id);

        return view('branch.show', compact('branch'));
    }
    public function edit($id)
    {
        $branch = Branch::find($id);

        return view('branch.edit', compact('branch'));
    }
    public function update(Request $request, Branch $branch)
    {
        request()->validate(Branch::$rules);

        $branch->update($request->all());

        return redirect()->route('branches.index')
            ->with('success', 'Branch updated successfully');
    }
    public function destroy($id)
    {
        $branch = Branch::find($id)->delete();

        return redirect()->route('branches.index')
            ->with('success', 'Branch deleted successfully');
    }
}
