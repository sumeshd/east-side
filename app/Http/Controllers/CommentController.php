<?php

namespace App\Http\Controllers;


use App\Models\Project;
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
    public function index()
    {
        //
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
        if(Auth::check()){
            $request->validate([
                'comment_body' => 'required|string'
            ]);
            //$project = Project::where('slug',$request->project_slug)->where('status',0)->first();
            $project = Project::where('id',$request->project_id)->first();
            if($project){
                Comment::create([ 
                        'project_id' => $project->id,
                        'user_id' => Auth::user()->id,
                        'comment_body' => $request->comment_body ]);
                return redirect()->back();
            }else{
                return redirect()->back()->with('message','No Such Post Found');

            }

        }else{
            return redirect()->back()->with('message','login first to comment');
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
