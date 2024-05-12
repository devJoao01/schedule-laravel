<?php


namespace App\Http\Controllers;

use App\Models\WaitingList;

use App\Services\ServiceInterface;
use App\Http\Resources\WaitingListResource;
use App\Services\WaitingListService;
use Illuminate\Http\Response;

class WaitingListController extends Controller
{
    protected $WaitingListService;
    public function __construct(ServiceInterface $WaitingListService)
    {
        $this->WaitingListService = $WaitingListService;
    }
    // ----------------------------------------------------------------------INDEX----------------------------------------------------------------------


    public function index()
    {
        try {
            $Patient = $this->WaitingListService->all();
            return WaitingListResource::collection($Patient);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error retrieving Patients",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    // ----------------------------------------------------------------------STORE----------------------------------------------------------------------

    public function store(WaitingListResource $request)
    {
        $data = $request->validated();

        try {
            $Patient = $this->WaitingListService->create($data);
            return new WaitingListResource($Patient);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error adding Patient",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // ----------------------------------------------------------------------SHOW----------------------------------------------------------------------

    public function show($id)
    {
        try {
            $Patient = $this->WaitingListService->find($id);
            return response()->json($Patient, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Patient not found',
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // ----------------------------------------------------------------------UPDATE----------------------------------------------------------------------

    public function update(WaitingListResource $request, $id)
    {
        $data = $request->validated();

        try {
            $Patient = $this->WaitingListService->update($id, $data);

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

    // ----------------------------------------------------------------------DESTROY----------------------------------------------------------------------
    public function destroy($id)
    {
        try {
            $this->WaitingListService->delete($id);
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
