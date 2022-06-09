<?php

namespace App\Http\Controllers;


use App\Models\Settings_presales;
use App\Models\Settings_postsales;
use App\Models\Settings_execution;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($id,$settings)
    // {
    //     if($settings == 'presales'){
    //         $settings_presales = Settings_presales::where('id',$id)->first();
    //         //dd($settings_presales->comments);
    //         // foreach($settings_presales->comments as $comment){
    //         //     dd($comment);
    //         // }
    //         return view('comment_master.comment',compact('settings_presales'));

    //     }else if($settings == 'postsales'){
    //         $settings = Settings_postsales::where('id',$id)->first();
    //         return view('comment_master.comment',compact('settings'));

    //     }else if($settings == 'execution'){
    //         $settings = Settings_execution::where('id',$id)->first();
    //         return view('comment_master.comment',compact('settings'));
    //     }
        
    // }

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
        if(Auth::check()){
            $request->validate([
                'comment_body' => 'required|string'
            ]);
            //$project = Project::where('slug',$request->project_slug)->where('status',0)->first();
            if( $request->settings_name == 'presales'){
                $settings = Settings_presales::where('id',$request->settings_id)->first();
                if($settings){
                    Comment::create([ 
                            'presalesid' => $settings->id,
                            'user_id' => Auth::user()->id,
                            'comment_body' => $request->comment_body ]);
                    return redirect()->back()->with('success','New Comment Created Successfully');
                }else{
                    return redirect()->back()->with('success','No Such Post Found');

                }

            }else if ($request->settings_name == 'postsales') {
                $settings = Settings_postsales::where('id',$request->settings_id)->first();
                if($settings){
                    Comment::create([ 
                            'postsalesid' => $settings->id,
                            'user_id' => Auth::user()->id,
                            'comment_body' => $request->comment_body ]);
                    return redirect()->back()->with('success','No Such Post Found');
                }else{
                    return redirect()->back()->with('success','No Such Post Found');

                }
            }
            
            

        }else{
            return redirect()->back()->with('success','login first to comment');
        }
        // $comment = new Comment;

        // $comment->comment = $request->comment;
        // $comment->user()->associate($request->user());
        // $project = Project::find($request->project_id);
        // $project->comments()->save($comment);
        // return back();
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
    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $project = Project::find($request->get('project_id'));

        $project->comments()->save($reply);

        return back();

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
