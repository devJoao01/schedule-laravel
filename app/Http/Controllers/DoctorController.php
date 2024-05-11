<?php


namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Resources\StoreDoctorController;

class DoctorController extends Controller

// ----------------------------------------------------------------------INDEX----------------------------------------------------------------------

{
    public function index()
    {
        $doctors = Doctor::all();
        return StoreDoctorController::collection($doctors);
    }
    // ----------------------------------------------------------------------STORE----------------------------------------------------------------------

    public function store(StoreDoctorController $request)
    {
        $doctor = Doctor::create($request->all());
        return response()->json([
            "message" => "ADDED DOCTOR",
            "doctor" => $doctor,
        ], 201);
    }

    // ----------------------------------------------------------------------SHOW----------------------------------------------------------------------

    public function show($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            return response()->json($doctor);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Doctor not found',
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    // ----------------------------------------------------------------------UPDATE----------------------------------------------------------------------

    public function update(StoreDoctorController $request, $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->update($request->all());

            return response()->json([
                'message' => 'Doctor updated sucessfuly',
                'doctor' =>  $doctor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'error in update a doctor',
                'message' => $e->getMessage()
            ], 404);
        };
    }

    // ----------------------------------------------------------------------DESTROY----------------------------------------------------------------------
    public function destroy($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();

            return response()->json([
                "message" => "Doctor removed successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error deleting doctor",
                "message" => $e->getMessage()
            ], 404);
        }
    }
}
