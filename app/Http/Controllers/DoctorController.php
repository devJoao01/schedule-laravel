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

        $doctor = new Doctor;
        $doctor->name = $request('name');
        $doctor->specialty = $request('specialty');
        $doctor->work_schedule = $request('work_schedule');
        $doctor->contact = $request('contact');
        $doctor->save();
        return response()->json([
            "message" => "ADDED DOCTOR"
        ], 201);
    }
    // ----------------------------------------------------------------------SHOW----------------------------------------------------------------------

    public function show($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            if (!empty($doctor)) {
                return response()->json($doctor);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'error when looking for a doctor',
                'message' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'error' => 'doctor not found'
        ], 404);
    }

    // ----------------------------------------------------------------------UPDATE----------------------------------------------------------------------

    public function update(request $request, $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'specialty' => 'required|string|max:255',
                'work_schedule' => 'required|string|max:255',
                'contact' => 'required|string|max:20'
            ]);

            $doctor->fill($request->all());
            $doctor->save();
            return response()->json([
                'message' => 'Doctor updated sucessfuly',
                'doctor' =>  $doctor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'error in update a doctor',
                'message' => $e->getMessage()
            ]);
        };

        return response()->json([
            'error' => 'doctor not found'
        ], 404);
    }

    // ----------------------------------------------------------------------DESTROY----------------------------------------------------------------------
    public function destroy($id)
    {
        if (Doctor::where('id', $id)->exists()) {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();

            return response()->json([
                "message" => "Doctor removed sucessfuly",
            ], 200);
        } else {
            return response()->json([
                "message" => "doctor not found"
            ], 200);
        }
    }
}


// return redirect('/contacts')->with('error', 'That Is Not Your Contact');