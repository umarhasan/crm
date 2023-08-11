<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index(Department $department)
    {
        $data['departments'] = $department->all();
        return view('departments.index',$data);
    }
    
    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request,Department $department)
    {
        try
        {
            $this->validate(request(), [
                'departments' => 'required',
            ]);
            
            $department->create([
                'departments' => request()->get('departments'),
                'status' => 'Active'
            ]);
            
            return redirect()->to('/department')->with(['success'=>'Department Has Been Created']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }
    

    public function show(Request $request, Department $department)
    {
        try
        {            
            $department->status = $request->status;
            $department->save();
            
            return redirect()->to('/department')->with(['success'=>'Department Has Been Updated']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }
    

    public function edit(Department $department)
    {
        $data['departments'] = $department;
        return view('departments.edit',$data);
        
    }

    public function update(Request $request,Department $department)
    {
        try
        {
            $this->validate(request(), [
                'departments' => 'required',
            ]);
            
            $department->departments = $request->departments;
            $department->save();
            
            return redirect()->to('/department')->with(['success'=>'Department Has Been Updated']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }

    public function destroy(Department $department)
    {

        try
        {            
            $department->delete();
            
            return redirect()->to('/department')->with(['success'=>'Department Has Been Deleted']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }
}
