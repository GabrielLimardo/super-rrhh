<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\VisualDocument;
use App\Models\VisualStatistic;
use App\Models\Status;

// use App\Models\Roles;

use Session;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('organization_id',Auth::user()->organization_id)->paginate();

        return view('role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::all();
        return view('role.create', compact('role','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->guard_name= 'web';
        $role->save();
   
        $permissions = $request['permissions'];

        if (!is_null($permissions)) {
            $this->permission($permissions,$role);
        }
        
        $this->create_visual( $role->id);

        Status::create([
            'organization_id' => Auth::user()->organization_id,
            'rol_id' => $role->id,
            'name' => 'sign_'. $role->name,
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('role.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // request()->validate(Role::$rules);

        // $role->update($request->all());
     
        $role = Role::findOrFail($role->id);//Get role with the given id
        //Validate name and permission fields
        $rules = [
          'name'=>'required|unique:roles,name,'.$role->id,
          'permissions' =>'required',
        ];
        $messages = [
          'name.unique' => 'The role ' . $request->name . ' is already in our database. ' . 'Please choose another.',
          'permissions.required' => 'You must select at least one (1) permission.',
        ];

        // $validator = Validator::make($request->all(), $rules, $messages);
      	// if ($validator->fails()) {
      	// 	$flash_message = [
      	// 		'title' => 'Oops!',
      	// 		'status' => 'danger',
      	// 		'message' => 'Please correct all the errors below.',
      	// 	];
      	// 	Session::flash('update_fail', $flash_message);
      	// 	return redirect()->back()
      	// 					 ->withErrors($validator)
      	// 					 ->withInput();
      	// }

        $input = $request->except(['permissions', 'savebtn']);
        $permissions = $request['permissions'];

        $role->fill($input)->save();

        $p_all = Permission::all();//Get all permissions

        $permiss_new = array();
        $prueba = 0;
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); 
            //Get corresponding form //permission in db
            $permiss_new[] = $p->name;
            $prueba ++ ; 
            //Assign permission to role
        }

        $role->syncPermissions($permiss_new);  

        $flash_message = [
          'title' => 'Well done!',
          'status' => 'success',
          'message' => 'Existing role has been successfully updated.',
        ];

        // Session::flash('update_success', $flash_message);
        return redirect()->route('roles.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

    public function permission($permissions,$role)
    {
        $permiss_new = array();
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
            $permiss_new[] = $p->name;
        }
        $role->syncPermissions( $permiss_new);  
    }

    public function create_visual($id)
    {
        VisualDocument::create([
            'rol_id'=>$id,
        ]);
        VisualStatistic::create([
            'rol_id'=>$id,
        ]);
    }
    
}
