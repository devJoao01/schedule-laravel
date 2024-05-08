<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller

// ----------------------------------------------------------------------INDEX----------------------------------------------------------------------

{
    public function index()
    {
        $doctor = Doctor::all();
        return response()->json($doctor);
    }
    // ----------------------------------------------------------------------STORE----------------------------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'work_schedule' => 'required|string|max:255',
            'contact' => 'required|string|max:20'
        ]);

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

    public function update(Request $request, $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'specialty' => 'required|string|max:255',
                'work_schedule' => 'required|string|max:255',
                'contact' => 'required|string|max:20'
            ]);

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
