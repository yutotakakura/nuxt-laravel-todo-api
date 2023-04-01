<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return response()->json([
            "message" => "created successfully",
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        if ($task) {
            return $task;
        } else {
            return response()->json([
                "message" => "Task not found",
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->title = is_null($request->title) ? $task->title : $request->title;
            $task->content = is_null($request->content) ? $task->content : $request->content;
            $task->person_in_charge = is_null($request->person_in_charge) ? $task->person_in_charge : $request->person_in_charge;
            $task->save();
            return response()->json([
                "message" => "updated successfully",
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "message" => "Task not found",
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json([
                "message" => "deleted successfully",
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "message" => "Task not found",
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
