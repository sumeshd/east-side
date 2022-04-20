<?php

namespace App\Http\Controllers;


use App\Models\Settings_tablist;
use App\Models\Settings_tasklist;
use App\Models\Settings_subtasklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$executiondata=Execution::latest()->paginate(5);
        //$tablists=Tablist::all();
        
         $data=array(
             'settings_tablists' => Settings_tablist::all(),
             'settings_tasklists' => Settings_tasklist::all(),
             'settings_subtasklists' => Settings_subtasklist::all(),
         );
             //return view('execution.show_execution',compact('tablists'));
             return view('execution.show_execution',$data);




    //     $data=DB::table('tablists')
    //     ->join('tasklists','tasklists.tablist_id','=','tablists.id')
    //    // ->join('subtasklists','subtasklists.tasklist_id','=','tasklists.id')
    //    //->where('tablists.id','tablists.id')
    //     ->get();
    //     return view('execution.show_execution',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('execution.create_execution');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       


    }




    public function tablist(Request $request)
    {
        //================Two Way Insert==============
        //                  1
        // $tablist = new Tablist();
        // $tablist->tablist = $request->get('tablist');
        //                  2
        $tablist = new Settings_tablist([
            'tablist'=>$request->tablist,
        ]);
        $tablist->save();
        $tablist_id=$tablist->id;
        return response()->json( $tablist_id) ;

    }


    public function tasklist(Request $request)
    {  
        $tasklist = new Settings_tasklist();
        $tasklist->tasklist = $request->get('tasklist');
        $tasklist->tablist_id = $request->get('tablist_id');
        $tasklist->save();
        $tasklist_id=$tasklist->id;
        return response()->json( $tasklist_id) ;

    }


    public function subtasklist(Request $request)
    {  
        $subtasklist = new Settings_subtasklist();
        $subtasklist->subtasklist = $request->get('subtasklist');
        $subtasklist->tasklist_id = $request->get('tasklist_id');
        $subtasklist->save();
        $subtasklist_id=$subtasklist->id;
        return response()->json( $subtasklist_id) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Execution  $execution
     * @return \Illuminate\Http\Response
     */
    public function show(Settings_tablist $execution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Execution  $execution
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings_tablist $execution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Execution  $execution
     * @return \Illuminate\Http\Response
     */

    










    public function update(Request $request,  $execution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Execution  $execution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings_tablist $execution)
    {
        //
    }
}
