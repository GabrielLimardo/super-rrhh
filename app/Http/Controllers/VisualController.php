<?php

namespace App\Http\Controllers;

use App\Models\VisualDocument;
use App\Models\VisualStatistic;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class VisualController extends Controller
{
    public function index()
    {


        $roles = Role::where('organization_id',Auth::user()->organization_id)->paginate();

        return view('visual.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());

    }

    public function show($id)
    {
        $role = Role::find($id);
        $visualDocument = VisualDocument::where('rol_id',$id)->first();
        $visualStatistic = VisualStatistic::where('rol_id',$id)->first();

        return view('visual.show', compact('visualDocument','role','visualStatistic'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $visualDocument = VisualDocument::where('rol_id',$id)->first();
        $visualStatistic = VisualStatistic::where('rol_id',$id)->first();

        return view('visual.edit', compact('visualDocument','role','visualStatistic'));
    }


    public function update(Request $request, VisualDocument $visualDocument)
    {
        request()->validate(VisualDocument::$rules);

        $visualDocument->update($request->all());

        return redirect()->route('visual.index')
            ->with('success', 'VisualDocument updated successfully');
    }

}
