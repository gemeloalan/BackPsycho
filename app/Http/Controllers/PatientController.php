<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $patiens = Patient::all();
        return $this->successResponse('data', $patiens,201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        $data = Patient::create($request->all());
        return $this->successResponse('data', $data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return $this->successResponse('Patient retrieved successfully', $patient,201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
    $patient->delete();
    return $this->successResponse('Patient deleted successfully', null,201);    
    }
}
