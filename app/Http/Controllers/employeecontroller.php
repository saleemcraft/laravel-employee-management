<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class employeecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = employee::orderBy('id','desc')->paginate(2)->withQueryString();
        return view ('index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:employees,email',
        'joining_date' => 'required|date',
        'joining_salary' => 'required|numeric',
        'is_active' => 'required|boolean',  
    ]);
    
    
    $data = $request->only([
                               'name',
                               'email',
                               'joining_date',
                              'joining_salary',
                              'is_active']);
        employee::create($data);
        return Redirect()
        ->route('employee.index')
        ->withsuccess('Employee has been Created Successfully..!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
    $employee = employee::find($id);
    return view ('show', compact('employee'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = employee::find($id);
        return view('edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$id,
            'joining_date' => 'required|date',
            'joining_salary' => 'required|numeric',
            'is_active' => 'required|boolean',  
        ]);
        $data=$request->all();
        $employee=employee::find($id);
        $employee->update($data);
        return Redirect()
        ->route('employee.edit', $employee->id)
        ->withsuccess('Employee has been Updated Successfully..!');
       // return Redirect()
        //->route('employee.index')
        //->withsuccess('Employee has been Updated Successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return Redirect()
        ->route('employee.index')
        ->withsuccess('Employee has been Deleted Successfully..!');
    }
}
