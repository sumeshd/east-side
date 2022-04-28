<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:project-list', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }







    public function index()
    {
        $project=Project::latest()->paginate(5);
        return view('project.show_project',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'projectname' => 'required',
            'status' => 'required',
            'budject' => 'required',
            'team' => 'required',
            'image' => 'required',
            'complecation' => 'required',
        ]);
        Project::create($request->all());
        return redirect()->route('Project.index')
        ->with('success','Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $id)
    {
        $projects = Project::find($id);
        //dd($project);
        return view('project.details_project',compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $id)
    {
        $projects=Project::find($id);
        return view('project.edit_project',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project=Project::find($id);

        $project->projectname=$request->projectname;
        $project->status=$request->status;
        $project->budject=$request->projectname;
        $project->team=$request->team;
        $project->image=$request->image;
        $project->complecation=$request->complecation;
        $project->update();

        return redirect()->route('Project.index')
        ->with('success','Project Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('Project.index')
                        ->with('success', 'Project Delete Successfully');
    }
}
