<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user' => 'required|string|max:255',
            'timestamp' => 'required|date',
            'message' => 'required|string|max:255',
        ]);

        try {
            return response()->json(Chat::create($request->all()), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function read(Request $request)
    {
        try {
            return response()->json(Chat::all());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function readById($id)
    {
        try {
            return response()->json(Chat::find($id));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function readByUserUpToTimestamp($user, $timestamp, Request $request)
    {
        try {
            return response()->json(Chat::where('user', $user)->where('timestamp', '<=', $timestamp)->get());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $address = Chat::findOrFail($id);
            $address->update($request->all());

            return response()->json($address, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid username'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete($id)
    {
        try {
            Chat::findOrFail($id)->delete();
            return response('Deleted Successfully', Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid ID'], Response::HTTP_BAD_REQUEST);
        }
    }
}
