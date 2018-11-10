<?php

namespace App\Http\Controllers;

use App\Track;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrackController extends Controller
{

    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return all tracks
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tracks = Track::all();

        return $this->successResponse($tracks);
    }

    /**
     * Create a new instance of tracks
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'duration' => 'required|numeric',
            'author_id' => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $track = Track::create($request->all());

        return $this->successResponse($track, Response::HTTP_CREATED);
    }

    /**
     * Return an instance of track
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $track = Track::findOrFail($id);

        return $this->successResponse($track);
    }

    /**
     * Update an instance of track
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit(Request $request, $id)
    {
        $rules = [
            'name' => 'max:255',
            'duration' => 'numeric',
            'author_id' => 'numeric',
        ];

        $this->validate($request, $rules);

        $track = Track::findOrFail($id);

        $track->fill($request->all());

        if ($track->isClean()) {

            return $this->errorResponse('At least one value must charge', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $track->save();

        return $this->successResponse($track);
    }

    /**
     * Delete an instance of track
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $track = Track::findOrFail($id);

        $track->delete();

        return $this->successResponse($track);
    }
}
