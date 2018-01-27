<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new employee;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:employees|max:50',    
            'address' => 'required',
            'phone' => 'required|unique:employees',
        ]);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->save();
        session()->flash('message', 'Created Successfully');

        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $item = Employee::find($employee->id);
        return view('employee.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee = employee::find($employee->id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',    
            'address' => 'required',
            'phone' => 'required',
        ]);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->save();
        session()->flash('message', 'Updated Sucessfuly');

        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $delete = employee::find($employee->id);
        $delete->delete();
        session()->flash('message', 'Successfully Deleted');
        return redirect('/employee');
    }

    public function pdf()
    {
        $serial = 1;
        $data = Employee::all();
        $pdf = PDF::loadView('employee.employeeList', compact('data', 'serial'));
        return $pdf->download('employeeList.pdf');
    }
}
