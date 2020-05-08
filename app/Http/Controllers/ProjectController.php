<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects->all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Auth::user()->projects()->create($request->all());
        alert()->success('Project Added');
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if ($project->user_id != \auth()->id())
            abort(401);
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->user_id != \auth()->id())
            abort(401);
        $project->delete();
        alert()->success('Deleted Successfully');
        return redirect()->back();
    }

    public function add_task_get(Project $project)
    {
        return view('project.addProjectTask', compact('project'));
    }

    public function add_task_post(Request $request, Project $project)
    {
        $lowest = $project->tasks()->max('priority');
        if ($lowest == null)
            $lowest = 0;
        $request->validate(['name' => 'required']);
        $project->tasks()->create([
            'name' => $request['name'],
            'priority' => $lowest + 1
        ]);
        alert()->success('Task Added');
        return redirect()->route('projects.show', $project);
    }

    public function updatePriority(Request $request, Project $project)
    {
        foreach ($request['tasks'] as $requestTask) {
            foreach ($project->tasks as $projectTask) {
                if ($requestTask['id'] == $projectTask['id']) {
                    $projectTask['priority'] = $requestTask['priority'];
                    $projectTask->save();
                }
            }
        }
        return $project->tasks;
    }


    public function deleteTask(Task $task)
    {
        if ($task->project->user->id != auth()->id())
            abort(401);
        $task->delete();
        return 'success';
    }
}
