<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('users')->latest()->get();

        return $tasks;

        // return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        $task = new Task;

        $task->body = $request->input('body');
        $task->user_id = 2;

        $task->save();

        Task::find($task->id)->users()->attach($request->input('user_id'));


        return $task->id;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id, Task $task)
    {
        $task = $task::find($id);
        $user_id = $task::find($id)->users;

        return ['task' => $task, 'user_id' => $user_id];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Task $task)
    {
        $task = $task::find($id);

        $task->body = $request->input('body');
        $task->user_id = rand(1, 5);

        $task->save();

        $task->users()->detach();

        $task->users()->attach($request->input('user_id'));

        return $request->input('user_id');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Task $task)
    {
        return $task::destroy($id);
    }
}
