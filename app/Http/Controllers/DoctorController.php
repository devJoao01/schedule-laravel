<?php


namespace App\Http\Controllers;

use App\Models\Doctor;

use App\Services\ServiceInterface;
use App\Http\Resources\DoctorResource;
use App\Services\DoctorService;
use Illuminate\Http\Response;

class DoctorController extends Controller
{
    protected $doctorService;
    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }
    // ----------------------------------------------------------------------INDEX----------------------------------------------------------------------


    public function index()
    {
        try {
            $doctor = $this->doctorService->all();
            return DoctorResource::collection($doctor);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error retrieving doctors",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    // ----------------------------------------------------------------------STORE----------------------------------------------------------------------

    public function store(DoctorResource $request)
    {
        $data = $request->validated();

        try {
            $doctor = $this->doctorService->create($data);
            return new DoctorResource($doctor);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error adding doctor",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // ----------------------------------------------------------------------SHOW----------------------------------------------------------------------

    public function show($id)
    {
        try {
            $doctor = $this->doctorService->find($id);
            return response()->json($doctor, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Doctor not found',
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // ----------------------------------------------------------------------UPDATE----------------------------------------------------------------------

    public function update(DoctorResource $request, $id)
    {
        $data = $request->validated();

        try {
            $doctor = $this->doctorService->update($id, $data);

            return response()->json([
                'message' => 'Doctor updated sucessfuly',
                'doctor' =>  $doctor,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'error in update a doctor',
                'message' => $e->getMessage()
            ], response::HTTP_BAD_REQUEST);
        };
    }

    // ----------------------------------------------------------------------DESTROY----------------------------------------------------------------------
    public function destroy($id)
    {
        try {
            $this->doctorService->delete($id);
            return response()->json([
                "message" => "Doctor removed successfully",
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error deleting doctor",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
