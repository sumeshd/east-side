<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project_settings;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($settingsID,$projectID,$type)
    {
        if( $type == 'presales'){
            $settings = Project_settings::where('id',$settingsID)->where('project_id',$projectID)->first();

            return view('comment_master.comment',compact('settings'));
        }elseif ($type == 'postsales') {
            $settings = Project_settings::where('id',$settingsID)->where('project_id',$projectID)->first();
            return view('comment_master.comment',compact('settings'));
        }elseif ($type == 'execution') {
            $settings = Project_settings::where('id',$settingsID)->where('project_id',$projectID)->first();
            return view('comment_master.comment',compact('settings'));
        }
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
        //dd($request);
        if (Auth::check()) {
            $request->validate([
                'comment_body' => 'required|string'
            ]);
            // if( $request->settings_name == 'presales'){
                $settings = Project_settings::where('id',$request->project_settings_id)->where('project_id',$request->project_id)->first();
                if($settings){
                    Comment::create([
                        'project_id' => $settings->project_id,
                        'project_settings_id' =>$settings->id, 
                        'user_id' => Auth::id(),
                        'comment_body' => $request->comment_body

                    ]);
                    return redirect()->back()->with('success','New Comment Created Successfully');

                }

            // }else if ($request->settings_name == 'postsales') {
            //     $settings = Project_settings::where('id',$request->settings_id)->first();
            //     if($settings){
            //         Comment::create([
            //             'postsales_id' => $settings->id,
            //             'user_id' => Auth::user()->id,
            //             'comment_body' => $request->comment_body

            //         ]);
            //         return redirect()->back()->with('success','New Comment Created Successfully');

            //     }
            // }else if ($request->settings_name == 'postsales') {
            //     $settings = Presales::where('id',$request->settings_id)->first();
            //     if($settings){
            //         Comment::create([
            //             'execution_id' => $settings->id,
            //             'user_id' => Auth::user()->id,
            //             'comment_body' => $request->comment_body

            //         ]);
            //         return redirect()->back()->with('success','New Comment Created Successfully');

            //     }
            // }


        }else{
             return redirect()->back()->with('success','login first to comment');
        }
        
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if( !empty($id) ){
            $procomment = Comment::find($id);
            if($procomment){
                $procomment->delete();
                return redirect()->back()->with('success','Comment Deleted Successfully...');
            }
        }else{
             return redirect()->back()->with('success','Oops..! Try Again Later ');
        }
    }
}
