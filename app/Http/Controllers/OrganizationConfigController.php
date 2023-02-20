<?php

namespace App\Http\Controllers;

use App\OrganizationConfig;
use Illuminate\Http\Request;


class OrganizationConfigController extends Controller
{
    public function index()
    {
        $organizationConfigs = OrganizationConfig::paginate();

        return view('organization-config.index', compact('organizationConfigs'))
            ->with('i', (request()->input('page', 1) - 1) * $organizationConfigs->perPage());
    }
    public function create()
    {
        $organizationConfig = new OrganizationConfig();
        return view('organization-config.create', compact('organizationConfig'));
    }
    public function store(Request $request)
    {
        request()->validate(OrganizationConfig::$rules);

        $organizationConfig = OrganizationConfig::create($request->all());

        return redirect()->route('organization-configs.index')
            ->with('success', 'OrganizationConfig created successfully.');
    }
    public function show($id)
    {
        $organizationConfig = OrganizationConfig::find($id);

        return view('organization-config.show', compact('organizationConfig'));
    }
    public function edit($id)
    {
        $organizationConfig = OrganizationConfig::find($id);

        return view('organization-config.edit', compact('organizationConfig'));
    }
    public function update(Request $request, OrganizationConfig $organizationConfig)
    {
        request()->validate(OrganizationConfig::$rules);

        $organizationConfig->update($request->all());

        return redirect()->route('organization-configs.index')
            ->with('success', 'OrganizationConfig updated successfully');
    }
    public function destroy($id)
    {
        $organizationConfig = OrganizationConfig::find($id)->delete();

        return redirect()->route('organization-configs.index')
            ->with('success', 'OrganizationConfig deleted successfully');
    }
}
