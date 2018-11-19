<?php
/**
 * Created by PhpStorm.
 * User: Vivify
 * Date: 11/19/18
 * Time: 9:16 AM
 */

namespace App\Repositories;


use App\Interfaces\ITaskRepository;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class TaskRepository implements ITaskRepository
{

    public function index()
    {
        $user = JWTAuth::toUser();
        return Task::where('user_id', $user->id)->get();
    }

    public function store(Request $request)
    {
        $user = JWTAuth::toUSer();
        return Task::create([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    public function show($id)
    {
        return Task::where('id', $id)->firstOrFail();
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request, $id)
    {
        return Task::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => Carbon::now()
        ]);
    }

    public function destroy($id)
    {
        return Task::destroy($id);
    }

}