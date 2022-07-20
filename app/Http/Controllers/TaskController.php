<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Team;
use App\Models\Task;
use App\Models\Tasklog;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Project_settings;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$project = Project::find($request->project_id)->getTeam;
        // $tasksarray=[];
        // $user_id = Auth::id();
        // $tasks = Task::where('user_id',$user_id)->get();
        // foreach( $tasks as $task ){
        //     $project_settings_id = $task->project_settings_id;
        //     $project_settings = Project_settings::where('id',$project_settings_id)->first();
        //     $project_id = $project_settings->project_id;
        //     $project = Project::where('id',$project_id)->first();
        //     $project_name = $project->name;
        //     $tasksfields['project_name'] = $project_name;
        //     $tasksfields['project_settings_id'] = $task->project_settings_id;
        //     $tasksfields['task_name'] = $task->task_name;
        //     $tasksfields['task_assing_on'] = $task->task_assing_on;
        //     $tasksfields['task_duedate'] = $task->task_duedate;
        //     $tasksfields['status'] = $task->status;
        //     $tasksfields['completed_on'] = $task->completed_on;
        //     $tasksarray[]=$tasksfields;

        // }
        //dd($tasksarray);
        $user_id = Auth::id();
        $tasks = DB::table('tasks')
        ->join('project_settings','tasks.project_settings_id', '=', 'project_settings.id')
        ->join('projects','project_settings.project_id', '=', 'projects.id')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.*', 'users.name', 'projects.projectname')
        ->where('tasks.user_id', $user_id)
        ->get();


        return view('project.task',compact('tasks'));

    }


    public function taskassignbyme(){
        $user_id = Auth::id();
        $tasks = DB::table('tasks')
        ->join('project_settings','tasks.project_settings_id', '=', 'project_settings.id')
        ->join('projects','project_settings.project_id', '=', 'projects.id')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.*', 'users.name', 'projects.projectname')
        ->where('tasks.assigned_by', $user_id)
        ->get();
        return view('project.task_assignbyme',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function addmember(Request $request){
        $taskfetch = Task::where('project_settings_id', $request->psettings_id )->first();
        
        //return response()->json( $task_id ) ;

        if( !empty($taskfetch) ){
            $task_id = $taskfetch->id;
            $project_settings_id = $taskfetch->project_settings_id;
            $task = Task::where('project_settings_id',$request->psettings_id)->update([
                'user_id' => $request->user
            ]);

            $tasklog = Tasklog::create([
               'user_id' => Auth::id(),
               'task_id' => $task_id,
               'field_name' => 'Member',
               'field_data' => 'Updated'
            ]);
            $data['task_id'] = $task_id;
            $data['project_settings_id'] = $project_settings_id;
            $data['message'] = 'Task Successfully Assigned By User';

            return response()->json( $data ) ;
        }else{
            $task = Task::create([
                'user_id' => $request->user,
                'project_settings_id' => $request->psettings_id,
                'assigned_by' => Auth::id(),
                'task_name' => $request->task_name,
                'task_assing_on' => Carbon::today(),
                'status' => 'Assigned'
            ]);
            $task_id = $task->id;
            $project_settings_id = $task->project_settings_id;
            $tasklog = Tasklog::create([
               'user_id' => Auth::id(),
               'task_id' => $task_id,
               'field_name' => 'Member',
               'field_data' => 'Created'
            ]);
            //$tasklog_id = $tasklog->id;
            $data['task_id'] = $task_id;
            $data['project_settings_id'] = $project_settings_id;            
            $data['message'] = 'Task Successfully Assigned By User';
            return response()->json( $data ) ;
        }
    }



    public function description(Request $request){
        $taskfetch = Task::where('project_settings_id', $request->psettings_id )->first();
        
        if( !empty($taskfetch) ){
            $task_id=$taskfetch->id;
            $project_settings_id = $taskfetch->project_settings_id;
            $task = Task::where('project_settings_id',$request->psettings_id)->update([
                'task_description' => $request->description
            ]);
            $tasklog = Tasklog::create([
               'user_id' => Auth::id(),
               'task_id' => $task_id,
               'field_name' => 'Description',
               'field_data' => $request->description
            ]);
            //$tasklog_id = $tasklog->id;
            $data['task_id'] = $task_id;
            $data['project_settings_id'] = $project_settings_id;
            $data['message'] = 'Task Description Successfully Updated';
            return response()->json( $data ) ;
        }else{
            $task = Task::create([
                'task_description' => $request->description,
                'project_settings_id' => $request->psettings_id,
                'assigned_by' => Auth::id(),
                'task_name' => $request->task_name,
                'task_assing_on' => Carbon::today(),
                'status' => 'Assigned'
            ]);

            $task_id=$task->id;
            $project_settings_id = $task->project_settings_id;
            $tasklog = Tasklog::create([
               'user_id' => Auth::id(),
               'task_id' => $task_id,
               'field_name' => 'Description',
               'field_data' => $request->description
            ]);
            $data['task_id'] = $task_id;
            $data['project_settings_id'] = $project_settings_id;
            $data['message'] = 'Task Successfully Assigned By User';
            return response()->json( $data ) ;
        }


    }


    public function comment(Request $request){

        $comment = comment:: create([
            'task_id'=> $request->task_id,
            'user_id'=> Auth::id(),
            'task_comment' => $request->task_comment
        ]);


        $task = DB::table('tasks')
                ->join('comments', 'tasks.id', '=', 'comments.task_id')
                ->join('users', 'tasks.user_id', '=', 'users.id')
                ->select('comments.*', 'users.name')
                ->where('comments.task_id', $request->task_id)
                ->get();


        return response()->json( $task );
    }




    public function date(Request $request){
        $dateString = $request->task_duedate;
        $dateObject = Carbon::createFromFormat('d/m/Y', $dateString);

        $taskfetch = Task::where('project_settings_id', $request->psettings_id )->first();
        if( !empty($taskfetch) ){
            $task_id=$taskfetch->id;
            $project_settings_id = $taskfetch->project_settings_id;
            $task = Task::where('project_settings_id',$request->psettings_id)->update([
                'task_duedate' => $dateObject
            ]);

            $tasklog = Tasklog::create([
               'user_id' => Auth::id(),
               'task_id' => $task_id,
               'field_name' => 'Due Date',
               'field_data' => $dateObject
            ]);
            $data['task_id'] = $task_id;
            $data['project_settings_id'] = $project_settings_id;
            $data['message'] = 'Task Due Date Successfully Updated';
            return response()->json( $data ) ;
        }else{
            $task = Task::create([
                'task_duedate' => $dateObject,
                'project_settings_id' => $request->psettings_id,
                'assigned_by' => Auth::id(),
                'task_name' => $request->task_name,
                'task_assing_on' => Carbon::today(),
                'status' => 'Assigned'
            ]);

            $task_id=$task->id;
            $project_settings_id = $task->project_settings_id;
            $tasklog = Tasklog::create([
               'user_id' => Auth::id(),
               'task_id' => $task_id,
               'field_name' => 'Due Date',
               'field_data' => $dateObject
            ]);
            $data['task_id'] = $task_id;
            $data['project_settings_id'] = $project_settings_id;
            $data['message'] = 'Task Due Dtae Created';
            return response()->json( $data ) ;
        }


    }

    public function tasklog(Request $request){
        //$logsarray=[];

        $task = DB::table('tasks')
        ->join('tasklogs', 'tasks.id', '=', 'tasklogs.task_id')
        ->join('users', 'tasklogs.user_id', '=', 'users.id')
        ->select('users.name', 'tasklogs.*')
        ->where('tasks.project_settings_id', $request->project_settings_id )
        ->get();

        // $task = Task::where('project_settings_id',$request->project_settings_id)->first();
        // if( !empty($task) ){

        //     $task_id = $task->id;
        //     $tasklogs = Tasklog::where('task_id', $task_id )->orderBy('id','DESC')->get();
        //     foreach($tasklogs as $tasklog){
        //         $userid = $tasklog->user_id;
        //         $user = User::where('id',$userid)->get()->first();
        //         $logs['user_name'] = $user->name;
        //         $logs['field_name'] = $tasklog->field_name;
        //         $logs['field_data'] = $tasklog->field_data;
        //         $logs['created_at'] = $tasklog->created_at;
        //         $logsarray[] = $logs;
        //     }
        // }
        return response()->json( $task ) ;
    }



    public function status(Request $request){
        if( $request->completed == 'Completed'){
            $task = Task::where('project_settings_id',$request->project_settings_id)->update([
                'status' => $request->completed,
                'completed_on' => Carbon::today()
            ]);
            $message = " Task Complete Successfully ";
            return response()->json( $message ) ;
        }else{
            $task = Task::where('project_settings_id',$request->project_settings_id)->update([
                'status' => 'Assigned',
                'completed_on' => null
            ]);
            $message = " Task Not Complete Successfully ";
            return response()->json( $message ) ;
        }
    }



    public function statusdate(Request $request){
        $task = Task::where('project_settings_id',$request->project_settings_id)->first();
        //$date = $task->task_duedate;
        return response()->json( $task ) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $team_id=[];
        $username=[];
        $userarray=[];
        // $user = DB::table('projects')
        // ->join('team_projects','projects.id', '=','team_projects.' )



        $projects = Project::where('id',$request->project_id)->get();
        foreach( $projects as $project){
            foreach( $project->getTeam as $team){
                $team_id[]= $team->id;
            }
            for( $i=0; $i< count($team_id); $i++){
                $teams = Team::where('id',$team_id[$i])->get();
                foreach($teams as $team ){
                    foreach( $team->users as $user){
                        $username['name']=$user->name;
                        $username['id']=$user->id;
                        $userarray[]=$username;
                    }
                }
            }

        }
        return response()->json( $userarray ) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
