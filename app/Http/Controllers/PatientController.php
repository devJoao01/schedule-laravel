<?php


namespace App\Http\Controllers;

use App\Models\Patient;

use App\Services\ServiceInterface;
use App\Http\Resources\PatientResource;
use App\Services\PatientService;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    protected $PatientService;
    public function __construct(PatientService $PatientService)
    {
        $this->PatientService = $PatientService;
    }


    public function index()
    {
        try {
            $Patient = $this->PatientService->all();
            return PatientResource::collection($Patient);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error retrieving Patients",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(PatientResource $request)
    {
        $data = $request->validated();

        try {
            $Patient = $this->PatientService->create($data);
            return new PatientResource($Patient);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error adding Patient",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function show($id)
    {
        try {
            $Patient = $this->PatientService->find($id);
            return response()->json($Patient, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Patient not found',
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(PatientResource $request, $id)
    {
        $data = $request->validated();

        try {
            $Patient = $this->PatientService->update($id, $data);

            return response()->json([
                'message' => 'Patient updated sucessfuly',
                'Patient' =>  $Patient,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'error in update a Patient',
                'message' => $e->getMessage()
            ], response::HTTP_BAD_REQUEST);
        };
    }

    public function destroy($id)
    {
        try {
            $this->PatientService->delete($id);
            return response()->json([
                "message" => "Patient removed successfully",
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error deleting Patient",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
