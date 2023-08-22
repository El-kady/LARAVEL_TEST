<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::orderBy('id','desc')->paginate(5);
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Task::create($request->post());

        return redirect()->route('tasks.index')->with('success','Task has been created successfully.');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Task::findOrFail($id)->fill($request->post())->save();

        return redirect()->route('index')->with('success','Task Has Been updated successfully');
    }


    public function destroy($id)
    {
        $task = Task::findOrFail($id)->delete();
        return redirect()->route('index')->with('success','Task has been deleted successfully');
    }
}
