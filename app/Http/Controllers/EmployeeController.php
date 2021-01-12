<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company', 'user', 'services.schedules', 'schedules')->get();
        
        if($employees)
            return response()->json($employees);

        return response()->json(['error' => 'Response not found.'], 401);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->user_id = $request->user_id;
        $employee->save();

        if($employee)
            return response()->json($employee);

        return response()->json(['error' => 'Resource not save.'], 401);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        
        if($employee)
            return response()->json($employee);

        return response()->json(['error' => 'Response not found.'], 401);
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
        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->user_id = $request->user_id;
        $employee->save();

        if($employee)
            return response()->json($employee);

        return response()->json(['error' => 'Resource not update.'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        
        if($employee){
            $employee->delete();
            return response()->json($employee);
        }
            

        return response()->json(['error' => 'Resource not destroy.'], 401);
    }
}
