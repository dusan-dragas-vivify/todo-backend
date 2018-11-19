<?php

namespace App\Http\Controllers;

use App\Interfaces\ITaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private $taskRepo;

    public function __construct(ITaskRepository $ITaskRepository)
    {
        $this->taskRepo = $ITaskRepository;
    }

    /**
     * Display all tasks for authenticated user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tasks = $this->taskRepo->index();
        return response()->json($tasks);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $response = $this->taskRepo->store($request);
        if($response)
        {
            return response()->json([
                'status' => '201',
                'Message' => 'Created'
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
