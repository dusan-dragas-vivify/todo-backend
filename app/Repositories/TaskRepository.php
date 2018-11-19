<?php
/**
 * Created by PhpStorm.
 * User: Vivify
 * Date: 11/19/18
 * Time: 9:16 AM
 */

namespace App\Repositories;


use App\Interfaces\ITaskRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class TaskRepository implements ITaskRepository
{

    public function index()
    {
        $user = JWTAuth::toUser();
        return DB::table('tasks')->select()->where('user_id', $user->id)->get();
    }

    public function store(Request $request)
    {
        $user = JWTAuth::toUSer();
        return DB::table('tasks')->insert([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * Get currently authenticated user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

}