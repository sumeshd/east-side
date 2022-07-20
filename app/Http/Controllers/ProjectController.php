<?php

namespace App\Http\Controllers;
// use App\Models\Presales;
// use App\Models\Postsales;
// use App\Models\Execution;

use App\Models\Project_settings;
use App\Models\Settings;
use App\Models\Team;
use App\Models\Project;
use App\Models\Team_project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $project = Project::orderBy('id','DESC')->get();
        return view('project.show_project',compact('project'));

        // foreach( $project as $pro){
        //     echo $pro->name;
        //     echo $pro->getTeam;
        // }
         // $project = Project::find(1)->getProjectCustomer;
         //        return $project;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    



    public function create()
    {
        $customers = Customer::orderBy('id','DESC')->get();
        $teams = Team::orderBy('id','DESC')->get();
        return view('project.create_project',compact('customers','teams'));
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

        $request->validate([
            'project_type' => 'required',
            'settings_name' => 'required', 
            'name' => 'required',
            'projectname' => 'required',
            'projectnumber' => 'required',
            'address_1' => 'required',
            'pin' => 'required',
            'customer' => 'required',
            'team' => 'required',
        ]);

        

        $customer = Customer::where('id',$request->customer)->first();
        //dd($customer);

        $project = new project();
        $project_type = implode(',', $request->input('project_type'));
        $project->project_type = $project_type;
        $settings_name = implode(',', $request->input('settings_name'));
        $project->settings_name = $settings_name;
        $project->name = $request->name;
        $project->projectnumber = $request->projectnumber;
        $project->projectname = $request->projectname;
        $project->address_1 = $request->address_1;
        $project->address_2 = $request->address_2;
        $project->address_3 = $request->address_3;
        $project->pin = $request->pin;
        $customer->projects()->save($project);

        $team=$request->team;
        $project->getTeam()->attach($team);


        // $project=$request->all();
        // $project_type = implode(',', $request->input('project_type'));
        // $project['project_type']= $project_type;

        // $settings_name = implode(',', $request->input('settings_name'));
        // $project['settings_name']= $settings_name;
        // $project['customer_id']= $request->customer;

        // // $project['slug'] = Str::slug($request->slug);
        // $projects=Project::create($project);

        //$projects->customers()->sync($request->customer);
        // $project_id = $project->id;
       
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
    public function edit($id)
    {
        //dd($id);
        //$projects=Project::find($id);
        $projects=Project::where('id',$id)->get();
        //dd($projects);
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
        $project_type = implode(',', $request->input('project_type'));
        $project->project_type = $project_type;
        $settings_name = implode(',', $request->input('settings_name'));
        $project['settings_name']= $settings_name;

        $project->name=$request->name;
        $project->projectname=$request->projectname;
        $project->projectnumber=$request->projectnumber;
        $project->address_1=$request->address_1;
        $project->address_2=$request->address_2;
        $project->address_3=$request->address_3;
        $project->pin=$request->pin;
        $project->customer_id=$request->customer;
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
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('Project.index')
                        ->with('success', 'Project Delete Successfully');
    }
    


    // public function projectSettingsView($id)
    // {
    //     $project = Project::where('id',$id)->first();
    //     $settings_name = explode(",",$project->settings_name);
    //     in_array('Presales',$settings_name)? $presales='presales':$presales='';
    //     in_array('Postsales',$settings_name)? $postsales='postsales':$postsales='';
    //     in_array('Execution',$settings_name)? $execution='execution':$execution='';

    //     $settings_presales=[];
    //     $settings_postsales=[];
    //     $settings_execution=[];
    //     if(!empty($presales)){
    //         $settings_presales = Presales::where('parent_id',0)->get()->toArray();
    //     }
    //     if(!empty($postsales)){
    //         $settings_postsales = Postsales::where('parent_id',0)->get()->toArray();
    //     }
    //     if(!empty($execution)){
    //         $settings_execution = Execution::where('parent_id',0)->get()->toArray();
    //     }        
    //     return view('project.project_viewsettings',compact('settings_presales','settings_postsales','settings_execution','project'));
    // }




    public function projectsettings($settings, $id)
    {
        $project = Project::where('id',$id)->first();
        $projectId=$id;
        // $settings_name = explode(",",$project->settings_name);
        // in_array('Presales',$settings_name)? $presales='presales':$presales='';
        // in_array('Postsales',$settings_name)? $postsales='postsales':$postsales='';
        // in_array('Execution',$settings_name)? $execution='execution':$execution='';
        if($settings == 'presales'){
            $project_settings = Project_settings::where('project_id',$id)->where('type','presales')->get()->toArray();
            if(!empty($project_settings)){

                function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments)
                {
                    if($view == 0){
                        $tfview = "";
                    }else{
                        $tfview ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/view-svgrepo-com.svg" alt="View" style="width:17px;">  </a>';
                    }
                    if($upload == 0){
                        $tfupload = "";
                    }else{
                        $tfupload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/upload-svgrepo-com.svg" alt="Upload" style="width:17px;"> </a>';
                    }
                    if($download == 0){
                        $tfdownload = "";
                    }else{
                        $tfdownload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/download-svgrepo-com.svg" alt="Download" style="width:17px;"> </a>';
                    }
                    if($comments == 0){
                        $tfcomments = "";
                    }else{
                        $tfcomments ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/comment-svgrepo-com.svg" alt="Comments" style="width:17px;">  </a>';
                    }
                    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description.'" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '" data-deleteitem="">' .
                        '<div class="dd-handle dd3-handle" > Drag</div>' .
                        '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                        '<div class="item-edit">Edit</div>' .
                        '</div>' .
                        '<div class="item-settings d-none">' .
                        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
                        '<p><label for="">Navigation Description<br><textarea name="navigation_description" rows="4">'. $description .'</textarea></label></p>' .
                        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
                        '<a class="item-close" href="javascript:;">Close</a></p>' .
                        '</div>';
                }
                function menuTree($projectId,$parent_id = 0)
                {
                    $items = '';
                    $presales = DB::table('project_settings')->where('parent_id',$parent_id)->where('type','presales')->where('project_id',$projectId)->orderBy('id')->get();
                    if(!empty($presales)){
                        $items .= '<ol class="dd-list">';
                        foreach($presales as $row){

                            $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment);
                            $items .= menuTree($projectId,$row->id);
                            $items .= '</li>';   
                        }
                        $items .= '</ol>';
                    }
                    return $items;   
                }
                $html=menuTree($projectId);
                return view('project.project_presales',compact('html','project'));
            }else{

                function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments)
                {
                    if($view == 0){
                        $tfview = "";
                    }else{
                        $tfview ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/view-svgrepo-com.svg" alt="View" style="width:17px;">  </a>';
                    }
                    if($upload == 0){
                        $tfupload = "";
                    }else{
                        $tfupload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/upload-svgrepo-com.svg" alt="Upload" style="width:17px;"> </a>';
                    }
                    if($download == 0){
                        $tfdownload = "";
                    }else{
                        $tfdownload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/download-svgrepo-com.svg" alt="Download" style="width:17px;"> </a>';
                    }
                    if($comments == 0){
                        $tfcomments = "";
                    }else{
                        $tfcomments ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/comment-svgrepo-com.svg" alt="Comments" style="width:17px;">  </a>';
                    }
                    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description. '" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '" data-deleteitem="">' .
                        '<div class="dd-handle dd3-handle" > Drag</div>' .
                        '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                        '<div class="item-edit">Edit</div>' .
                        '</div>' .
                        '<div class="item-settings d-none">' .
                        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
                        '<p><label for="">Navigation Description<br><textarea name="navigation_description" rows="4">'. $description .'</textarea></label></p>' .
                        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
                        '<a class="item-close" href="javascript:;">Close</a></p>' .
                        '</div>';
                }

                function menuTree($parent_id = 0)
                {
                    $items = '';
                    $presales = DB::table('settings')->where('parent_id',$parent_id)->where('type','presales')->orderBy('id')->get();
                    if(!empty($presales)){
                        $items .= '<ol class="dd-list">';
                        foreach($presales as $row){
                            
                            //dd($tfview);
                            $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment);
                            $items .= menuTree($row->id);
                            $items .= '</li>';   
                        }
                        $items .= '</ol>';
                    }
                    return $items;   
                }
                $html=menuTree();
                return view('project.project_presales',compact('html','project'));
            }
        }else if($settings == 'postsales'){
            $project_settings = Project_settings::where('project_id',$id)->where('type','postsales')->get()->toArray();
            if(!empty($project_settings))
            {
                function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments)
                {
                    if($view == 0){
                        $tfview = "";
                    }else{
                        $tfview ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/view-svgrepo-com.svg" alt="View" style="width:17px;">  </a>';
                    }
                    if($upload == 0){
                        $tfupload = "";
                    }else{
                        $tfupload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/upload-svgrepo-com.svg" alt="Upload" style="width:17px;"> </a>';
                    }
                    if($download == 0){
                        $tfdownload = "";
                    }else{
                        $tfdownload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/download-svgrepo-com.svg" alt="Download" style="width:17px;"> </a>';
                    }
                    if($comments == 0){
                        $tfcomments = "";
                    }else{
                        $tfcomments ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/comment-svgrepo-com.svg" alt="Comments" style="width:17px;">  </a>';
                    }
                    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description.'" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '" data-deleteitem="">' .
                        '<div class="dd-handle dd3-handle" > Drag</div>' .
                        '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                        '<div class="item-edit">Edit</div>' .
                        '</div>' .
                        '<div class="item-settings d-none">' .
                        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
                        '<p><label for="">Navigation Description<br><textarea name="navigation_description" rows="4">'. $description .'</textarea></label></p>' .
                        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
                        '<a class="item-close" href="javascript:;">Close</a></p>' .
                        '</div>';
                }
                function menuTree($projectId,$parent_id = 0)
                {
                    $items = '';
                    $presales = DB::table('project_settings')->where('parent_id',$parent_id)->where('type','postsales')->where('project_id',$projectId)->orderBy('id')->get();
                    if(!empty($presales)){
                        $items .= '<ol class="dd-list">';
                        foreach($presales as $row){

                            $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment);
                            $items .= menuTree($projectId,$row->id);
                            $items .= '</li>';   
                        }
                        $items .= '</ol>';
                    }
                    return $items;   
                }
                $html=menuTree($projectId);
                return view('project.project_postsales',compact('html','project'));
            }else{

                function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments)
                {
                    if($view == 0){
                        $tfview = "";
                    }else{
                        $tfview ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/view-svgrepo-com.svg" alt="View" style="width:17px;">  </a>';
                    }
                    if($upload == 0){
                        $tfupload = "";
                    }else{
                        $tfupload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/upload-svgrepo-com.svg" alt="Upload" style="width:17px;"> </a>';
                    }
                    if($download == 0){
                        $tfdownload = "";
                    }else{
                        $tfdownload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/download-svgrepo-com.svg" alt="Download" style="width:17px;"> </a>';
                    }
                    if($comments == 0){
                        $tfcomments = "";
                    }else{
                        $tfcomments ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/comment-svgrepo-com.svg" alt="Comments" style="width:17px;">  </a>';
                    }
                    //dd($tfviews);
                    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description. '" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '" data-deleteitem="">' .
                        '<div class="dd-handle dd3-handle" > Drag</div>' .
                        '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                        '<div class="item-edit">Edit</div>' .
                        '</div>' .
                        '<div class="item-settings d-none">' .
                        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
                        '<p><label for="">Navigation Description<br><textarea name="navigation_description" rows="4">'. $description .'</textarea></label></p>' .
                        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
                        '<a class="item-close" href="javascript:;">Close</a></p>' .
                        '</div>';
                }

                function menuTree($parent_id = 0)
                {
                    $items = '';
                    $presales = DB::table('settings')->where('parent_id',$parent_id)->where('type','postsales')->orderBy('id')->get();
                    if(!empty($presales)){
                        $items .= '<ol class="dd-list">';
                        foreach($presales as $row){
                            
                            //dd($tfview);
                            $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment);
                            $items .= menuTree($row->id);
                            $items .= '</li>';   
                        }
                        $items .= '</ol>';
                    }
                    return $items;   
                }
                $html=menuTree();
                return view('project.project_postsales',compact('html','project'));
            }

        }else if($settings == 'execution') {
            $project_settings = Project_settings::where('project_id',$id)->where('type','execution')->get()->toArray();
            if(!empty($project_settings))
            {

                function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments)
                {
                    if($view == 0){
                        $tfview = "";
                    }else{
                        $tfview ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/view-svgrepo-com.svg" alt="View" style="width:17px;">  </a>';
                    }
                    if($upload == 0){
                        $tfupload = "";
                    }else{
                        $tfupload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/upload-svgrepo-com.svg" alt="Upload" style="width:17px;"> </a>';
                    }
                    if($download == 0){
                        $tfdownload = "";
                    }else{
                        $tfdownload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/download-svgrepo-com.svg" alt="Download" style="width:17px;"> </a>';
                    }
                    if($comments == 0){
                        $tfcomments = "";
                    }else{
                        $tfcomments ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/comment-svgrepo-com.svg" alt="Comments" style="width:17px;">  </a>';
                    }
                    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description.'" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '" data-deleteitem="">' .
                        '<div class="dd-handle dd3-handle" > Drag</div>' .
                        '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                        '<div class="item-edit">Edit</div>' .
                        '</div>' .
                        '<div class="item-settings d-none">' .
                        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
                        '<p><label for="">Navigation Description<br><textarea name="navigation_description" rows="4">'. $description .'</textarea></label></p>' .
                        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
                        '<a class="item-close" href="javascript:;">Close</a></p>' .
                        '</div>';
                }
                function menuTree($projectId,$parent_id = 0)
                {
                    $items = '';
                    $presales = DB::table('project_settings')->where('parent_id',$parent_id)->where('type','execution')->where('project_id',$projectId)->orderBy('id')->get();
                    if(!empty($presales)){
                        $items .= '<ol class="dd-list">';
                        foreach($presales as $row){

                            $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment);
                            $items .= menuTree($projectId,$row->id);
                            $items .= '</li>';   
                        }
                        $items .= '</ol>';
                    }
                    return $items;   
                }
                $html=menuTree($projectId);
                return view('project.project_execution',compact('html','project'));
            }else{

                function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments)
                {
                    if($view == 0){
                        $tfview = "";
                    }else{
                        $tfview ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/view-svgrepo-com.svg" alt="View" style="width:17px;">  </a>';
                    }
                    if($upload == 0){
                        $tfupload = "";
                    }else{
                        $tfupload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/upload-svgrepo-com.svg" alt="Upload" style="width:17px;"> </a>';
                    }
                    if($download == 0){
                        $tfdownload = "";
                    }else{
                        $tfdownload ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/download-svgrepo-com.svg" alt="Download" style="width:17px;"> </a>';
                    }
                    if($comments == 0){
                        $tfcomments = "";
                    }else{
                        $tfcomments ='<a href="#" class="btn btn-success"> <img src=" http://localhost:8000/assets/images/icon/comment-svgrepo-com.svg" alt="Comments" style="width:17px;">  </a>';
                    }
                    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description. '" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '" data-deleteitem="">' .
                        '<div class="dd-handle dd3-handle" > Drag</div>' .
                        '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                        '<div class="item-edit">Edit</div>' .
                        '</div>' .
                        '<div class="item-settings d-none">' .
                        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
                        '<p><label for="">Navigation Description<br><textarea name="navigation_description" rows="4">'. $description .'</textarea></label></p>' .
                        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
                        '<a class="item-close" href="javascript:;">Close</a></p>' .
                        '</div>';
                }

                function menuTree($parent_id = 0)
                {
                    $items = '';
                    $presales = DB::table('settings')->where('parent_id',$parent_id)->where('type','execution')->orderBy('id')->get();
                    if(!empty($presales)){
                        $items .= '<ol class="dd-list">';
                        foreach($presales as $row){
                            

                            $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment);
                            $items .= menuTree($row->id);
                            $items .= '</li>';   
                        }
                        $items .= '</ol>';
                    }
                    return $items;   
                }
                $html=menuTree();
                return view('project.project_execution',compact('html','project'));
            }    
        }

    }




    public function presalesstore(Request $request)
    {
        $projectId = $request->projectId;

       //$truncate = Settings::truncate();
        // $truncate = Project_settings::where('type','presales')->where('project_id',$projectId)->get();
        // foreach($truncate as $row){
        //     $delete=Project_settings::find($row->id);
        //     $delete->delete();
        // }
        $emptyOrNot = Project_settings::where('project_id',$projectId)->where('type', 'presales')->get()->toArray();

        $menu=$request->menu;
        $array_menu = json_decode($menu, true);

        if(!empty($emptyOrNot)){
            function updateMenu($projectId,$menu,$parent = 0)
            {
                if (!empty($menu)) {
                    foreach ($menu as $value) {
                        //dd($value['id']);

                        if( $value['checkid'] == 0){
                            $presales = Project_settings::Create([
                            'project_id' => $projectId,
                            'type' => 'presales',
                            'name' => $value['label'],
                            'description'=> $value['description'],
                            'can_view'=> $value['view'],
                            'can_upload'=> $value['upload'],
                            'can_download'=> $value['download'],
                            'can_comment'=> $value['comments'],
                            'parent_id' => $parent   
                            ]);
                            $presales_id=$presales->id;
                            $presales = Project_settings::where('id',$presales_id)->update(['check_id' => $presales_id ]);

                        }else{

                            if($value['deleteitem'] == 'delete'){
                                $presales = Project_settings::where('id',$value['id'])->delete();
                                $presales_id=$parent;
                            }else{
                                $presales = Project_settings::where('id',$value['id'])->update([
                                'type' => 'presales',
                                'name' => $value['label'],
                                'description'=> $value['description'],
                                'can_view'=> $value['view'],
                                'can_upload'=> $value['upload'],
                                'can_download'=> $value['download'],
                                'can_comment'=> $value['comments'],
                                'parent_id' => $parent   
                                ]);
                                $presales_id=$value['id'];
                            }
                        }

                        if (array_key_exists('children', $value))
                        updateMenu($projectId,$value['children'],$presales_id);
                    }
                }
            }
            updateMenu($projectId, $array_menu);
            Project_settings::where('parent_id',0)->where('type','presales')->where('project_id',$projectId)->update([ 
                'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
            ]);
        }else{
            //dd('check');
            function updateFirst($projectId, $menu,$parent = 0)
            {
                if (!empty($menu)) {
                    foreach ($menu as $value) {
                        $presales = Project_settings::Create([
                            'project_id' => $projectId,
                            'type' => 'presales',
                            'name' => $value['label'],
                            'description'=>  $value['description'],
                            'can_view'=> $value['view'],
                            'can_upload'=> $value['upload'],
                            'can_download'=> $value['download'],
                            'can_comment'=> $value['comments'],
                            'parent_id' => $parent
                        ]);
                        $presales_id=$presales->id;
                        Project_settings::where('id',$presales_id)->update(['check_id' => $presales_id ]);
                        if (array_key_exists('children', $value))
                        updateFirst($projectId,$value['children'],$presales_id);
                    }
                }
            }
            updateFirst($projectId, $array_menu);
            Project_settings::where('parent_id',0)->where('type','presales')->where('project_id',$projectId)->update([ 
                'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
            ]);
        }
        return redirect()->action([ProjectController::class, 'projectsettings'], ['presales', $projectId ]);
    }


    public function postsalesstore(Request $request)
    {
        $projectId = $request->projectId;
        $emptyOrNot = Project_settings::where('project_id',$projectId)->where('type','postsales')->get()->toArray();

        $menu=$request->menu;
        $array_menu = json_decode($menu, true);

        if(!empty($emptyOrNot)){
          
            function updateMenu($projectId,$menu,$parent = 0)
            {
                if (!empty($menu)) {
                    foreach ($menu as $value) {
                        //dd($value['id']);
                        if( $value['checkid'] == 0){
                            $postsales = Project_settings::Create([
                            'project_id' => $projectId,
                            'type' => 'postsales',
                            'name' => $value['label'],
                            'description'=> $value['description'],
                            'can_view'=> $value['view'],
                            'can_upload'=> $value['upload'],
                            'can_download'=> $value['download'],
                            'can_comment'=> $value['comments'],
                            'parent_id' => $parent   
                            ]);
                            $postsales_id=$postsales->id;
                            $postsales = Project_settings::where('id',$postsales_id)->update(['check_id' => $postsales_id ]);

                        }else{

                            if($value['deleteitem'] == 'delete'){
                                $postsales = Project_settings::where('id',$value['id'])->delete();
                                $postsales_id=$parent;
                            }else{
                                $postsales = Project_settings::where('id',$value['id'])->update([
                                'type' => 'postsales',
                                'name' => $value['label'],
                                'description'=> $value['description'],
                                'can_view'=> $value['view'],
                                'can_upload'=> $value['upload'],
                                'can_download'=> $value['download'],
                                'can_comment'=> $value['comments'],
                                'parent_id' => $parent   
                                ]);
                                $postsales_id=$value['id'];
                            }  
                        }
                        if (array_key_exists('children', $value))
                        updateMenu($projectId,$value['children'],$postsales_id);
                    }
                }
            }
            updateMenu($projectId, $array_menu);
            Project_settings::where('parent_id',0)->where('type','postsales')->where('project_id',$projectId)->update([ 
                'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
            ]);
        }else{
          
            function updateFirst($projectId, $menu,$parent = 0)
            {
                if (!empty($menu)){
                    foreach ($menu as $value) {
                        $postsales = Project_settings::Create([
                            'project_id' => $projectId,
                            'type' => 'postsales',
                            'name' => $value['label'],
                            'description'=>  $value['description'],
                            'can_view'=> $value['view'],
                            'can_upload'=> $value['upload'],
                            'can_download'=> $value['download'],
                            'can_comment'=> $value['comments'],
                            'parent_id' => $parent
                        ]);
                        $postsales_id=$postsales->id;
                        Project_settings::where('id',$postsales_id)->update(['check_id' => $postsales_id ]);
                        if (array_key_exists('children', $value))
                        updateFirst($projectId,$value['children'],$postsales_id);
                    }
                }
            }
            updateFirst($projectId, $array_menu);
            Project_settings::where('parent_id',0)->where('type','postsales')->where('project_id',$projectId)->update([ 
                'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
            ]);
        }
        return redirect()->action([ProjectController::class, 'projectsettings'], ['postsales', $projectId ]);
    }


    public function executionstore(Request $request)
    {
        $projectId = $request->projectId;
        $emptyOrNot = Project_settings::where('project_id',$projectId)->where('type', 'execution')->get()->toArray();

        $menu=$request->menu;
        $array_menu = json_decode($menu, true);

        if(!empty($emptyOrNot)){
            function updateMenu($projectId,$menu,$parent = 0)
            {
                if (!empty($menu)) {
                    foreach ($menu as $value) {
                        if( $value['checkid'] == 0){
                            $execution = Project_settings::Create([
                            'project_id' => $projectId,
                            'type' => 'execution',
                            'name' => $value['label'],
                            'description'=> $value['description'],
                            'can_view'=> $value['view'],
                            'can_upload'=> $value['upload'],
                            'can_download'=> $value['download'],
                            'can_comment'=> $value['comments'],
                            'parent_id' => $parent   
                            ]);
                            $execution_id=$execution->id;
                            $execution = Project_settings::where('id',$execution_id)->update(['check_id' => $execution_id ]);

                        }else{

                            if($value['deleteitem'] == 'delete'){
                                $execution = Project_settings::where('id',$value['id'])->delete();
                                $execution_id=$parent;
                            }else{
                                $execution = Project_settings::where('id',$value['id'])->update([
                                'type' => 'execution',
                                'name' => $value['label'],
                                'description'=> $value['description'],
                                'can_view'=> $value['view'],
                                'can_upload'=> $value['upload'],
                                'can_download'=> $value['download'],
                                'can_comment'=> $value['comments'],
                                'parent_id' => $parent   
                                ]);
                                $execution_id=$value['id'];
                            }                           
                        }
                        if (array_key_exists('children', $value))
                        updateMenu($projectId,$value['children'],$execution_id);
                    }
                }
            }
            updateMenu($projectId, $array_menu);
            Project_settings::where('parent_id',0)->where('type','execution')->where('project_id',$projectId)->update([ 
                'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
            ]);
        }else{
            function updateFirst($projectId, $menu,$parent = 0)
            {
                if (!empty($menu)){
                    foreach ($menu as $value) {
                        $execution = Project_settings::Create([
                            'project_id' => $projectId,
                            'type' => 'execution',
                            'name' => $value['label'],
                            'description'=>  $value['description'],
                            'can_view'=> $value['view'],
                            'can_upload'=> $value['upload'],
                            'can_download'=> $value['download'],
                            'can_comment'=> $value['comments'],
                            'parent_id' => $parent
                        ]);
                        $execution_id=$execution->id;
                        Project_settings::where('id',$execution_id)->update(['check_id' => $execution_id ]);
                        if (array_key_exists('children', $value))
                        updateFirst($projectId,$value['children'],$execution_id);
                    }
                }
            }
            updateFirst($projectId, $array_menu);
            Project_settings::where('parent_id',0)->where('type','execution')->where('project_id',$projectId)->update([ 
                'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
            ]);
        }
        return redirect()->action([ProjectController::class, 'projectsettings'], ['execution', $projectId ]);
    }


    public function projectVS($id)
    {
        $check = Project_settings::where('project_id',$id)->get()->toArray();

        if( !empty($check)){
            $settings_presales = Project_settings::where('project_id',$id)->where('type','presales')->where('parent_id',0)->get()->toArray();
            $settings_postsales = Project_settings::where('project_id',$id)->where('type','postsales')->where('parent_id',0)->get()->toArray();
            $settings_execution = Project_settings::where('project_id',$id)->where('type','execution')->where('parent_id',0)->get()->toArray();
            return view('project.project_view_settings',compact('settings_presales','settings_postsales','settings_execution'));
        }else{
            return redirect()->route('Project.index')
                        ->with('error', 'At First Save Settings');
        }
        
    }


    public function fetch(Request $request){
        $type = $request->stype;
        if( $type == "presales" ){
            $presales = Project_settings::where('parent_id',$request->id)->where('type',$type)->get()->toArray();
            //dd($presales);
            return response()->json( $presales);
        }else if ($type == "postsales") {
            $postsales = Project_settings::where('parent_id',$request->id)->where('type',$type)->get()->toArray();
            return response()->json( $postsales) ;
            
        }else if ($type == "execution") {
            $execution = Project_settings::where('parent_id',$request->id)->where('type',$type)->get()->toArray();
            return response()->json( $execution ) ;    
        }

    }   




        

}
