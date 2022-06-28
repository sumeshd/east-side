<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project_settings;
use App\Models\Projectdoc;
use Auth;

class ProjectdocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($settingsID,$projectID,$type)
    {
        if( $type == 'presales' ){
            $documents = Projectdoc::where('project_id',$projectID)->where('project_settings_id',$settingsID)->orderBy('created_at','DESC')->paginate(12);
            $settings = Project_settings::where('project_id',$projectID)->where('type',$type)->where('id',$settingsID)->get()->toArray();
            //dd($settings);
            return view('project.projectdoc',compact('documents','settings'));
        }else if ($type == 'postsales') {
            $data['documents'] = Projectdoc::where('project_id',$projectID)->where('project_settings_id',$settingsID)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Project_settings::where('project_id',$projectID)->where('type',$type)->where('id',$settingsID)->get()->toArray();
            return view('project.projectdoc',$data);       
        }else if ($type == 'execution') {
            $data['documents'] = Projectdoc::where('project_id',$projectID)->where('project_settings_id',$settingsID)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Project_settings::where('project_id',$projectID)->where('type',$type)->where('id',$settingsID)->get()->toArray();
            return view('project.projectdoc',$data);       
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($settingsID,$projectID,$type)
    {
        if( $type == 'presales' ){
            $settings = Project_settings::where('id',$settingsID)->where('project_id',$projectID)->where('type',$type)->get()->toArray();
            //dd($settings);
            return view('project.adddocument',compact('settings'));
        }else if($type == 'postsales'){
            $settings = Project_settings::where('id',$settingsID)->where('project_id',$projectID)->where('type',$type)->get()->toArray();
            return view('project.adddocument',compact('settings'));
        }else if($type == 'postsales'){
            $settings = Project_settings::where('id',$settingsID)->where('project_id',$projectID)->where('type',$type)->get()->toArray();
            return view('project.adddocument',compact('settings'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // guessExtension();
        // getMimeType();
        // store();
        // asStore();
        // storePublicly();
        // move();
        // getClientOriginalName();
        // getClientMimeType();
        // guessClientExtension();
        // getSize();
        //getError();
        //isValid();
        // $test = $request->file('image')->guessClientExtension();

        $request->validate([
            'document' => 'required|mimes:doc,docx,pdf,jpg,png,ppt|max:9000',
        ]);

            $document = $request->document;
            $newDocumentName = time() . '-' . $request->document_name . '.' . $document->extension();
            $document->move(public_path('images'),$newDocumentName);
            $gallery = Projectdoc::create([
                'project_id' => $request->project_id,
                'project_settings_id' => $request->project_settings_id,
                'user_id' => Auth::user()->id,
                'document_name' => $newDocumentName,

            ]);

        return redirect()->action([ProjectdocController::class, 'index'], [ $request->project_settings_id ,$request->project_id, $request->type ]);
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
        //
    }
}
