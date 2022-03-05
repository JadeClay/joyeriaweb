<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Shop;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::simplePaginate(5); // Retrieve all users, using pagination method.
        return view('employee.index',["employees"=>$employee,"jobs" => Job::all(),"shops" => Shop::all(),"users"=> User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->except('_token'));

        if(!empty($request->user_id)){
            $user = User::findOrFail($request->user_id);
            $user->employee_id = $employee->id;
            $user->save();
        }
        
        return redirect(route('employee.index'))->with('success', "El empleado ha sido creado con exito.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit', ['employee' => Employee::find($id), "jobs" => Job::all(),"shops" => Shop::all(),"users"=> User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id); // If finds it, proceed the execution. If doesn't finds it, it fails.

        $employee->update($request->except('_token'));
        return redirect(route('employee.index'))->with('success', "El empleado ha sido modificado con exito.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = Employee::destroy($id);
        return redirect(route('employee.index'))->with('success', "El empleado ha sido eliminado con exito.");
    }
}
