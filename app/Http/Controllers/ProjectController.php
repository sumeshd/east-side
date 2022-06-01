<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        //$customers = Customer::all();
        //$project=Project::with('customers')->get();
        // $project->customers()->attach($customers);
        // $project=Project::with('customers')->get();
        //dd($project->toArray());

        $project = Project::all();
        //dd($project);
        return view('project.show_project',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('id','DESC')->get();
        return view('project.create_project',compact('customers'));
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
            'name' => 'required',
            'projectname' => 'required',
            'projectnumber' => 'required',
            'address_1' => 'required',
            'pin' => 'required',
            'customer' => 'required',
        ]);
        $project=$request->all();
        $project_type = implode(',', $request->input('project_type'));
        $project['slug'] = Str::slug($request->slug);
        $project['project_type']= $project_type;
        $projects=Project::create($project);
        $projects->customers()->sync($request->customer);

        // $project_id = $project->id;
        // //dd($project_id);
        // Customer::where('id',$request->customer_id)->update(['project_id'=>$project_id,'project_name'=>$request->projectname]);
        return redirect()->route('Project.index')
        ->with('success','Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('id',$id)->first();
        //dd($projects);
        return view('project.details_project',compact('project'));
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
        $customers = Customer::orderBy('id','DESC')->get();
        return view('project.edit_project',compact('projects','customers'));
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
        $request->validate([
            'name' => 'required',
            'projectname' => 'required',
            'projectnumber' => 'required',
            'address_1' => 'required',
            'pin' => 'required',
            'customer' => 'required',
        ]);
        $project=Project::find($id);

        $project->name=$request->name;
        $project->projectname=$request->projectname;
        $project->projectnumber=$request->projectnumber;
        $project->address_1=$request->address_1;
        $project->address_2=$request->address_2;
        $project->address_3=$request->address_3;
        $project->pin=$request->pin;
        //$project->customer_id=$request->customer_id;
        $project->update();
        $project->customers()->sync($request->customer);

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
