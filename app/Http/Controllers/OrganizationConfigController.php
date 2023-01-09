<?php

namespace App\Http\Controllers;

use App\OrganizationConfig;
use Illuminate\Http\Request;

/**
 * Class OrganizationConfigController
 * @package App\Http\Controllers
 */
class OrganizationConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizationConfigs = OrganizationConfig::paginate();

        return view('organization-config.index', compact('organizationConfigs'))
            ->with('i', (request()->input('page', 1) - 1) * $organizationConfigs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizationConfig = new OrganizationConfig();
        return view('organization-config.create', compact('organizationConfig'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OrganizationConfig::$rules);

        $organizationConfig = OrganizationConfig::create($request->all());

        return redirect()->route('organization-configs.index')
            ->with('success', 'OrganizationConfig created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organizationConfig = OrganizationConfig::find($id);

        return view('organization-config.show', compact('organizationConfig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organizationConfig = OrganizationConfig::find($id);

        return view('organization-config.edit', compact('organizationConfig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrganizationConfig $organizationConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationConfig $organizationConfig)
    {
        request()->validate(OrganizationConfig::$rules);

        $organizationConfig->update($request->all());

        return redirect()->route('organization-configs.index')
            ->with('success', 'OrganizationConfig updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $organizationConfig = OrganizationConfig::find($id)->delete();

        return redirect()->route('organization-configs.index')
            ->with('success', 'OrganizationConfig deleted successfully');
    }
}
