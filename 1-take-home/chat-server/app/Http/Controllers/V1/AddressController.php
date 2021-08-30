<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
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
        return response()->json(Address::create($request->all()), Response::HTTP_CREATED);
    }

    public function read(Request $request)
    {
        try {
            return response()->json(Address::filter($request->all())->get());
//            $limit = $request->input('limit');
//            $page = $request->input('page');
//            return response()->json(Address::limit($limit)->offset($limit * $page - 1)->get());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function readById($id)
    {
        try {
            return response()->json(Address::find($id));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $address = Address::findOrFail($id);
            $address->update($request->all());

            return response()->json($address, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid ID'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete($id)
    {
        try {
            Address::findOrFail($id)->delete();
            return response('Deleted Successfully', Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid ID'], Response::HTTP_BAD_REQUEST);
        }
    }
}
