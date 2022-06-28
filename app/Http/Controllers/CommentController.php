<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Presales;
use App\Models\Comment;

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
        if (Auth::check()) {
            $request->validate([
                'comment_body' => 'required|string'
            ]);
            if( $request->settings_name == 'presales'){
                $settings = Presales::where('id',$request->settings_id)->first();
                if($settings){
                    Comment::create([
                        'presales_id' => $settings->id,
                        'user_id' => Auth::user()->id,
                        'comment_body' => $request->comment_body

                    ]);
                    return redirect()->back()->with('success','New Comment Created Successfully');

                }

            }else if ($request->settings_name == 'postsales') {
                $settings = Presales::where('id',$request->settings_id)->first();
                if($settings){
                    Comment::create([
                        'postsales_id' => $settings->id,
                        'user_id' => Auth::user()->id,
                        'comment_body' => $request->comment_body

                    ]);
                    return redirect()->back()->with('success','New Comment Created Successfully');

                }
            }else if ($request->settings_name == 'postsales') {
                $settings = Presales::where('id',$request->settings_id)->first();
                if($settings){
                    Comment::create([
                        'execution_id' => $settings->id,
                        'user_id' => Auth::user()->id,
                        'comment_body' => $request->comment_body

                    ]);
                    return redirect()->back()->with('success','New Comment Created Successfully');

                }
            }


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
