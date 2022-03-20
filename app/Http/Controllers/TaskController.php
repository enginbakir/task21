<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use phpseclib3\Exception\FileNotFoundException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class TaskController
{
    const HTTP_NOT_FOUND = 404;
    const HTPP_OK = 200;
    const HTPP_CREATED = 201;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    public function getOne(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            throw new ModelNotFoundException("Task not found");
        }
        return new JsonResponse(["data" => $task], self::HTPP_OK);
    }

    public function getAll()
    {
        $tasks = Task::all();

        if (count($tasks) === 0) {
            throw new ModelNotFoundException("No task found");
        }
        return new JsonResponse(["data" => $tasks], self::HTPP_OK);
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate(['title' => ["required"]]);
        $data = [
            "titlae" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "user_id" => $request->user_id
        ];

        $result = Task::create($data);
        if(!$result){
            throw new \PDOException("Task not saved");
        }
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
        if (!$task) {
            throw new ModelNotFoundException("No record found");
        }
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "user_id" => $request->user_id
        ];

        $status = ($task->update($data) ? self::HTPP_OK : self::HTTP_INTERNAL_SERVER_ERROR);
        return new JsonResponse(["data" => $task], $status);
    }
}
