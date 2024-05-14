<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

use App\Services\ServiceInterface;
use App\Http\Resources\ScheduleResource;
use App\Services\ScheduleService;
use Illuminate\Http\Response;


class SchedulesController extends Controller
{
    protected $ScheduleService;
    public function __construct(ScheduleService $ScheduleService)
    {
        $this->ScheduleService = $ScheduleService;
    }


    public function index()
    {
        try {
            $Patient = $this->ScheduleService->all();
            return ScheduleResource::collection($Patient);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error retrieving Patients",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(ScheduleResource $request)
    {
        $data = $request->validated();

        try {
            $Patient = $this->ScheduleService->create($data);
            return new ScheduleResource($Patient);
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
            $Patient = $this->ScheduleService->find($id);
            return response()->json($Patient, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Patient not found',
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(ScheduleResource $request, $id)
    {
        $data = $request->validated();

        try {
            $Patient = $this->ScheduleService->update($id, $data);

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
            $this->ScheduleService->delete($id);
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