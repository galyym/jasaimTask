<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Worker::all();
        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        $data = Worker::create($request->all());

        return response([
            'status' => 'success',
            'message' => 'Worker added successfully',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Worker::find($id);

        return response([
            'status' => 'success',
            'message' => 'Worker founded in our system',
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkerRequest $request, $id)
    {
        $worker = Worker::find($id);
        $data = $worker->update($request->all());

        return response([
            'status' => 'success',
            'message' => 'Worker successfully updated',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $data = $worker->delete();

        return response([
           'status' => 'success',
           'message' => 'Worker succesfully deleted',
           'data' => $data
        ]);
    }
}
