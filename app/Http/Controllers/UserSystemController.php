<?php


namespace App\Http\Controllers;

use App\Models\UserSystem;

use App\Services\ServiceInterface;
use App\Http\Resources\UserSystemResource;
use App\Services\UserSystemService;
use Illuminate\Http\Response;

class UserSystemController extends Controller
{
    protected $UserSystemService;
    public function __construct(UserSystemService $UserSystemService)
    {
        $this->UserSystemService = $UserSystemService;
    }

    public function index()
    {
        try {
            $user = $this->UserSystemService->all();
            return UserSystemResource::collection($user);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error retrieving user",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(UserSystemResource $request)
    {
        $data = $request->validated();

        try {
            $user = $this->UserSystemService->create($data);
            return new UserSystemResource($user);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error adding user",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function show($id)
    {
        try {
            $user = $this->UserSystemService->find($id);
            return response()->json($user, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'user not found',
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(UserSystemResource $request, $id)
    {
        $data = $request->validated();

        try {
            $user = $this->UserSystemService->update($id, $data);

            return response()->json([
                'message' => 'user updated sucessfuly',
                'user' =>  $user,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'error in update a user',
                'message' => $e->getMessage()
            ], response::HTTP_BAD_REQUEST);
        };
    }

    public function destroy($id)
    {
        try {
            $this->UserSystemService->delete($id);
            return response()->json([
                "message" => "user removed successfully",
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error deleting user",
                "message" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
