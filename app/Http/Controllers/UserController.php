<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;

class UserController extends AdminBaseController
{
    public function index(Request $request)
    {
        if (Auth::user()->is_admin) {
            // If admin, get all users
            $data = User::orderBy('id', 'DESC')->orderBy('id','DESC')->get();
        } else {
            // If regular user, get only their data
            $data = User::where('created_by', Auth::id())->orderBy('id','DESC')->get();
        }
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
         $roles = Role::select(['id','name'])->get();
         $departments = Department::get();
        return view('users.create',compact('roles','departments'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['created_by'] = Auth::user()->id;

        // Create the user
        $user = User::create($input);

        // Get the selected role
        $selectedRole = Role::where('name',$request->input('roles'))->first();
        
        // Assign all permissions associated with the role to the user
        $user->syncPermissions($selectedRole->permissions);
        $user->assignRole($request->input('roles'));

        // $user->assignRole($selectedRole);
        return redirect()->route('users.index')
                        ->with('success', 'User created successfully');
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function assign_user(Request $request)
    {
        $user = User::get();
        return response()->json(['success'=>'success','users'=>$user]);
    }
    public function edit($id)
    {
        $data['departments'] = Department::all();
        $data['user'] = User::find($id);
        $data['roles'] = Role::select('id','name')->get();
        $data['userRole'] = $data['user']->roles->pluck('name','name')->all();
    
        return view('users.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'department_id' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $selectedRole = Role::where('name',$request->input('roles'))->first();
        
        // Assign all permissions associated with the role to the user
        $user->syncPermissions($selectedRole->permissions);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
