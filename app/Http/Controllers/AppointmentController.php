<?php


namespace App\Http\Controllers;

use App\Models\Appointment;

use App\Services\ServiceInterface;
use App\Http\Resources\AppointmentResource;
use App\Services\AppointmentService;
use Illuminate\Http\Response;

class AppointmentController extends Controller
{
    protected $AppointmentService;
    public function __construct(AppointmentService $AppointmentService)
    {
        $this->AppointmentService = $AppointmentService;
    }
    // ----------------------------------------------------------------------INDEX----------------------------------------------------------------------


    public function index()
    {
        try {
            $Appointment = $this->AppointmentService->all();
            return AppointmentResource::collection($Appointment);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error retrieving Appointments",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    // ----------------------------------------------------------------------STORE----------------------------------------------------------------------

    public function store(AppointmentResource $request)
    {
        $data = $request->validated();

        try {
            $Appointment = $this->AppointmentService->create($data);
            return new AppointmentResource($Appointment);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error adding Appointment",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // ----------------------------------------------------------------------SHOW----------------------------------------------------------------------

    public function show($id)
    {
        try {
            $Appointment = $this->AppointmentService->find($id);
            return response()->json($Appointment, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Appointment not found',
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // ----------------------------------------------------------------------UPDATE----------------------------------------------------------------------

    public function update(AppointmentResource $request, $id)
    {
        $data = $request->validated();

        try {
            $Appointment = $this->AppointmentService->update($id, $data);

            return response()->json([
                'message' => 'Appointment updated sucessfuly',
                'Appointment' =>  $Appointment,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'error in update a Appointment',
                'message' => $e->getMessage()
            ], response::HTTP_BAD_REQUEST);
        };
    }

    // ----------------------------------------------------------------------DESTROY----------------------------------------------------------------------
    public function destroy($id)
    {
        try {
            $this->AppointmentService->delete($id);
            return response()->json([
                "message" => "Appointment removed successfully",
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error deleting Appointment",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
