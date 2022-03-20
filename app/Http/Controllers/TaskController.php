<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController
{
    const HTTP_NOT_FOUND = 404;
    const HTPP_OK = 200;
    const HTPP_CREATED = 201;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    public function getOne()
    {
        echo "hello getOne";
        exit;
    }

    public function getAll()
    {
        echo "hello getAll";
        exit;
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

        Task::create($data);
        return new JsonResponse(["data" => $data], self::HTPP_CREATED);
    }

    public function remove()
    {
        echo "hello remove";
        exit;
    }

    public function update()
    {
        echo "hello update";
        exit;
    }
}
