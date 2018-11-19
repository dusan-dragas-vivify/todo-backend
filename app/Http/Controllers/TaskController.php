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
        return $this->taskRepo->index();
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->taskRepo->store($request);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return $this->taskRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->taskRepo->destroy($id);

    }
}
