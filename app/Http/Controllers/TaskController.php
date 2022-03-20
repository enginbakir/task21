<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController
{
    const HTTP_NOT_FOUND = 404;
    const HTPP_OK = 200;
    const HTPP_CREATED = 201;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    public function getOne(Request $request, $id)
    {
        $task = Task::find($id);
        if(!tasks)
        return new JsonResponse(["data" => $task], $task ? self::HTPP_OK : self::HTTP_NOT_FOUND);
    }

    public function getAll()
    {
        $tasks = Task::all();
        return new JsonResponse(["data" => $tasks], $tasks ? self::HTPP_OK : self::HTTP_NOT_FOUND);
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate(['title' => ["required"]]);
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "user_id" => $request->user_id
        ];

        $result = Task::create($data);
        return new JsonResponse(["data" => $data], $result ? self::HTPP_CREATED : self::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function remove(Request $request, $id)
    {
        $task = Task::find($id);
        $result = $task ? $task->delete() : false;
        return new JsonResponse(["data" => $task], $result ? self::HTPP_OK : self::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['title' => ["required", "max:255"]]);
        $task = Task::find($id);
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "user_id" => $request->user_id
        ];

        $status = $task ? ($task->update($data) ? self::HTPP_OK : self::HTTP_INTERNAL_SERVER_ERROR) : self::HTTP_NOT_FOUND;
        return new JsonResponse(["data" => $task], $status);
    }
}
