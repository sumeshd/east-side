<?php

namespace App\Http\Controllers;

use App\Models\Settings_presales;
use App\Models\Settings_postsales;
use App\Models\Settings_execution;
//use App\Models\Image;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class SettingsController extends Controller
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
    public function presales()
    {
        function renderMenuItem($id, $label, $description, $view, $upload, $download, $comments)
        {
            if($view == 0){
                $tfview = "";
            }else{
                      //$tfview = '<a href="#" class="btn btn-success"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';
                      //$tfviews = filter_var($tfview, FILTER_SANITIZE_STRING);
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
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '">' .
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
            //$settings = DB::select("SELECT * FROM `settings` WHERE `parent_id`= $parent_id ORDER BY `id` ASC ");
            //$settings = Settings::orderBy('id','ASC')->get();
            $settings_presales = DB::table('settings_presales')->where('parent_id',$parent_id)->orderBy('id')->get();
            if(!empty($settings_presales)){
                $items .= '<ol class="dd-list">';
                foreach($settings_presales as $row){
                    
                    //dd($tfview);
                    $items .=renderMenuItem($row->id, $row->presales_name, $row->description, $row->view, $row->upload, $row->download, $row->comments);
                    $items .= menuTree($row->id);
                    $items .= '</li>';   
                }
                $items .= '</ol>';
            }
            return $items;   
        }

        $html=menuTree();
        return view('settings_master.presales',compact('html'));
    }



    public function postsales()
    {
        function renderMenuItem($id, $label, $description, $view, $upload, $download, $comments)
        {
            if($view == 0){
                $tfview = "";
            }else{
                      //$tfview = '<a href="#" class="btn btn-success"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';
                      //$tfviews = filter_var($tfview, FILTER_SANITIZE_STRING);
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
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label .'" data-description ="'. $description . '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '">' .
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
            //$settings = DB::select("SELECT * FROM `settings` WHERE `parent_id`= $parent_id ORDER BY `id` ASC ");
            //$settings = Settings::orderBy('id','ASC')->get();
            $settings_postsales = DB::table('settings_postsales')->where('parent_id',$parent_id)->orderBy('id')->get();
            if(!empty($settings_postsales)){
                $items .= '<ol class="dd-list">';
                foreach($settings_postsales as $row){
                    
                    //dd($tfview);
                    $items .=renderMenuItem($row->id, $row->postsales_name, $row->description, $row->view, $row->upload, $row->download, $row->comments);
                    $items .= menuTree($row->id);
                    $items .= '</li>';   
                }
                $items .= '</ol>';
            }
            return $items;   
        }

        $html=menuTree();
        return view('settings_master.postsales',compact('html'));
    }



    public function execution()
    {
        function renderMenuItem($id, $label, $description, $view, $upload, $download, $comments)
        {
            if($view == 0){
                $tfview = "";
            }else{
                      //$tfview = '<a href="#" class="btn btn-success"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';
                      //$tfviews = filter_var($tfview, FILTER_SANITIZE_STRING);
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
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description.'" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '">' .
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
            //$settings = DB::select("SELECT * FROM `settings` WHERE `parent_id`= $parent_id ORDER BY `id` ASC ");
            //$settings = Settings::orderBy('id','ASC')->get();
            $settings_execution = DB::table('settings_executions')->where('parent_id',$parent_id)->orderBy('id')->get();
            if(!empty($settings_execution)){
                $items .= '<ol class="dd-list">';
                foreach($settings_execution as $row){
                    
                    //dd($tfview);
                    $items .=renderMenuItem($row->id, $row->execution_name, $row->description, $row->view, $row->upload, $row->download, $row->comments);
                    $items .= menuTree($row->id);
                    $items .= '</li>';   
                }
                $items .= '</ol>';
            }
            return $items;   
        }

        $html=menuTree();
        return view('settings_master.execution',compact('html'));
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
    public function presalesstore(Request $request)
    {
       $truncate = Settings_presales::truncate();

        // foreach($truncate as $row){
        //     $delete=Settings::find($row->id);
        //     $delete->truncate();
        // }
        $menu=$request->menu;
        $array_menu = json_decode($menu, true);
        function updateMenu($menu,$parent = 0)
        {
            if (!empty($menu)) {
                foreach ($menu as $value) {
                    $settings_presales = Settings_presales::Create([
                        'presales_name' => $value['label'],
                        'description'=> $value['description'],
                        'view'=> $value['view'],
                        'upload'=> $value['upload'],
                        'download'=> $value['download'],
                        'comments'=> $value['comments'],
                        'parent_id' => $parent,
                        'settings_name' => 'presales'
                    ]);
                    //$settings->save();
                    $settings_presales_id=$settings_presales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$settings_presales_id);
                }
            }
        }
        updateMenu($array_menu);
        Settings_presales::where('parent_id',0)->update([ 
            'view' => 0,'upload' => 0,'download' => 0,'comments' => 0
        ]);
        return redirect('presales');
    }





    public function postsalesstore(Request $request)
    {
       $truncate = Settings_postsales::truncate();
        $menu=$request->menu;
        $array_menu = json_decode($menu, true);
        function updateMenu($menu,$parent = 0)
        {
            if (!empty($menu)) {
                foreach ($menu as $value) {
                    $settings_presales = Settings_postsales::Create([
                        'postsales_name' => $value['label'],
                        'description'=>  $value['description'],
                        'view'=> $value['view'],
                        'upload'=> $value['upload'],
                        'download'=> $value['download'],
                        'comments'=> $value['comments'],
                        'parent_id' => $parent,
                        'settings_name' => 'postsales'
                    ]);
                    $settings_presales_id=$settings_presales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$settings_presales_id);
                }
            }
        }
        updateMenu($array_menu);
        Settings_postsales::where('parent_id',0)->update([ 
            'view' => 0,'upload' => 0,'download' => 0,'comments' => 0
        ]);
        return redirect('postsales');
    }





    public function executionstore(Request $request)
    {
       $truncate = Settings_execution::truncate();
        $menu=$request->menu;
        $array_menu = json_decode($menu, true);
        dd($array_menu);
        function updateMenu($menu,$parent = 0)
        {
            if (!empty($menu)) {
                foreach ($menu as $value) {

                    //$newiconname  = time(). '.'.$value['icon']->getClientOriginalName();
                    //$value['icon']->move(public_path('settingsicon'),$newiconname);

                    $settings_presales = Settings_execution::Create([
                        'execution_name' => $value['label'],
                        'description'=> $value['description'],
                        //'execution_image' => $value['icon'], 
                        'view'=> $value['view'],
                        'upload'=> $value['upload'],
                        'download'=> $value['download'],
                        'comments'=> $value['comments'],
                        'parent_id' => $parent,
                        'settings_name' => 'execution'
                    ]);
                    $settings_presales_id=$settings_presales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$settings_presales_id);
                }
            }
        }
        updateMenu($array_menu);
        Settings_execution::where('parent_id',0)->update([ 
            'view' => 0,'upload' => 0, 'download' => 0,'comments' => 0
        ]);
        return redirect('execution');
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



    public function settingsview()
    {
        $settings_presaless = Settings_presales::where('parent_id',0)->get()->toArray();
        //dd($settings);
        $settings_postsales = Settings_postsales::where('parent_id',0)->get()->toArray();
        $settings_execution = Settings_execution::where('parent_id',0)->get()->toArray();
        return view('settings_master.view_settings',compact('settings_presaless','settings_postsales','settings_execution'));
        
    }

    public function fetch(Request $request){
        $table = $request->table;
        if( $table == "settings_presales" ){
            $settings_presales = Settings_presales::where('parent_id',$request->id)->get()->toArray();
            //dd($settings_presales);
            return response()->json( $settings_presales);
        }else if ($table == "settings_postsales") {
            $settings_postsales = Settings_postsales::where('parent_id',$request->id)->get()->toArray();
            return response()->json( $settings_postsales) ;
            
        }else if ($table == "settings_execution") {
            $settings_execution = Settings_execution::where('parent_id',$request->id)->get()->toArray();
            return response()->json( $settings_execution ) ;    
        }

    }


    public function gallery(Request $request)
    {
        $images = Image::orderBy('created_at','DESC')->paginate(30);
        return view('settings_master.gallery',compact('images'));
    }


   
    

    public function imagedownload($id){
        $image = Image::find($id);

        return Storage::download($image->image);
        //->with('success','Image Download successfully...');
    }

    public function commentssettings($id,$settings)
    {
        if($settings == 'presales'){
            $presales = Settings_presales::where('id',$id)->first();
            //dd($settings_presales->comments);
            // foreach($settings_presales->comments as $comment){
            //     dd($comment);
            // }
            
            return view('comment_master.comment',compact('presales'));

        }else if($settings == 'postsales'){
            $settings = Settings_postsales::where('id',$id)->first();
            return view('comment_master.comment',compact('settings'));

        }else if($settings == 'execution'){
            $settings = Settings_execution::where('id',$id)->first();
            return view('comment_master.comment',compact('settings'));
        }
        
    }


   


}
