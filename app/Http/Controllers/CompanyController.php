<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $companies = Company::with('services.employees')->get();

        if($companies)
            return response()->json($companies);

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
        $company = new Company();
        $company->name = $request->name;
		$company->latitude = $request->latitude;
		$company->longitude = $request->longitude;
		$company->phone = $request->phone;
        $company->social_link = $request->social_link;
        $company->save();

        if($company)
            return response()->json($company);

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
        $company = Company::find($id);
        
        if($company)
            return response()->json($company);

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
        $company = Company::find($id);
        $company->name = $request->name;
		$company->latitude = $request->latitude;
		$company->longitude = $request->longitude;
		$company->phone = $request->phone;
        $company->social_link = $request->social_link;
        $company->save();

        if($company)
            return response()->json($company);

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
        $company = Company::find($id);
        
        if($company){
            $company->delete();
            return response()->json($company);
        }
            

        return response()->json(['error' => 'Resource not destroy.'], 401);
    }
}
