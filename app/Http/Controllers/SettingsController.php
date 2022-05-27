<?php

namespace App\Http\Controllers;

use App\Models\Settings;

use App\Models\Settings_presales;
use App\Models\Settings_postsales;
use App\Models\Settings_execution;
use Illuminate\Support\Facades\DB;

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
        function renderMenuItem($id, $label, $view, $upload, $download, $comments)
        {
            if($view == 0){
                $tfview = "";
            }else{
                      //$tfview = '<a href="#" class="btn btn-success"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';
                      //$tfviews = filter_var($tfview, FILTER_SANITIZE_STRING);
                $tfview ='<a href="#" class="btn btn-success"> View </a>';
            }

            if($upload == 0){
                $tfupload = "";
            }else{
                $tfupload ='<a href="#" class="btn btn-success"> Upload </a>';
            }

            if($download == 0){
                $tfdownload = "";
            }else{
                $tfdownload ='<a href="#" class="btn btn-success"> Download </a>';
            }
            if($comments == 0){
                $tfcomments = "";
            }else{
                $tfcomments ='<a href="#" class="btn btn-success"> Comments </a>';
            }
            
            
            //dd($tfviews);
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '">' .
                '<div class="dd-handle dd3-handle" > Drag</div>' .
                '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                '<div class="item-edit">Edit</div>' .
                '</div>' .
                '<div class="item-settings d-none">' .
                '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
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
                    $items .=renderMenuItem($row->id, $row->presales_name, $row->view, $row->upload, $row->download, $row->comments);
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
        function renderMenuItem($id, $label, $view, $upload, $download, $comments)
        {
            if($view == 0){
                $tfview = "";
            }else{
                      //$tfview = '<a href="#" class="btn btn-success"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';
                      //$tfviews = filter_var($tfview, FILTER_SANITIZE_STRING);
                $tfview ='<a href="#" class="btn btn-success"> View </a>';
            }

            if($upload == 0){
                $tfupload = "";
            }else{
                $tfupload ='<a href="#" class="btn btn-success"> Upload </a>';
            }

            if($download == 0){
                $tfdownload = "";
            }else{
                $tfdownload ='<a href="#" class="btn btn-success"> Download </a>';
            }
            if($comments == 0){
                $tfcomments = "";
            }else{
                $tfcomments ='<a href="#" class="btn btn-success"> Comments </a>';
            }
            
            
            //dd($tfviews);
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '">' .
                '<div class="dd-handle dd3-handle" > Drag</div>' .
                '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                '<div class="item-edit">Edit</div>' .
                '</div>' .
                '<div class="item-settings d-none">' .
                '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
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
                    $items .=renderMenuItem($row->id, $row->postsales_name, $row->view, $row->upload, $row->download, $row->comments);
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
        function renderMenuItem($id, $label, $view, $upload, $download, $comments)
        {
            if($view == 0){
                $tfview = "";
            }else{
                      //$tfview = '<a href="#" class="btn btn-success"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';
                      //$tfviews = filter_var($tfview, FILTER_SANITIZE_STRING);
                $tfview ='<a href="#" class="btn btn-success"> View </a>';
            }

            if($upload == 0){
                $tfupload = "";
            }else{
                $tfupload ='<a href="#" class="btn btn-success"> Upload </a>';
            }

            if($download == 0){
                $tfdownload = "";
            }else{
                $tfdownload ='<a href="#" class="btn btn-success"> Download </a>';
            }
            if($comments == 0){
                $tfcomments = "";
            }else{
                $tfcomments ='<a href="#" class="btn btn-success"> Comments </a>';
            }
            
            
            //dd($tfviews);
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '">' .
                '<div class="dd-handle dd3-handle" > Drag</div>' .
                '<div class="dd3-content"><span>' . $label .' ' . $tfview .' ' . $tfupload .' ' . $tfdownload .' ' . $tfcomments .' </span>' .
                '<div class="item-edit">Edit</div>' .
                '</div>' .
                '<div class="item-settings d-none">' .
                '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
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
            //dd($settings_postsales);
            if(!empty($settings_execution)){
                $items .= '<ol class="dd-list">';
                foreach($settings_execution as $row){
                    
                    //dd($tfview);
                    $items .=renderMenuItem($row->id, $row->execution_name, $row->view, $row->upload, $row->download, $row->comments);
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
                    $presales_name = $value['label'];
                    //$url = (empty($value['url'])) ? '#' : $value['url'];
                    $view = $value['view'];
                    $upload = $value['upload'];
                    $download = $value['download'];
                    $comments = $value['comments'];
                    $settings_presales = Settings_presales::Create([
                        'presales_name' => $presales_name,
                        'view'=> $view,
                        'upload'=> $upload,
                        'download'=> $download,
                        'comments'=> $comments,
                        'parent_id' => $parent,
                    ]);
                    //$settings->save();
                    $settings_presales_id=$settings_presales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$settings_presales_id);
                }
            }
        }
        updateMenu($array_menu);
        return redirect('presales');
    }





    public function postsalesstore(Request $request)
    {
       $truncate = Settings_postsales::truncate();

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
                    $postsales_name = $value['label'];
                    //$url = (empty($value['url'])) ? '#' : $value['url'];
                    $view = $value['view'];
                    $upload = $value['upload'];
                    $download = $value['download'];
                    $comments = $value['comments'];
                    $settings_presales = Settings_postsales::Create([
                        'postsales_name' => $postsales_name,
                        'view'=> $view,
                        'upload'=> $upload,
                        'download'=> $download,
                        'comments'=> $comments,
                        'parent_id' => $parent,
                    ]);
                    //$settings->save();
                    $settings_presales_id=$settings_presales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$settings_presales_id);
                }
            }
        }
        updateMenu($array_menu);
        return redirect('postsales');
    }





    public function executionstore(Request $request)
    {
       $truncate = Settings_execution::truncate();

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
                    $execution_name = $value['label'];
                    //$url = (empty($value['url'])) ? '#' : $value['url'];
                    $view = $value['view'];
                    $upload = $value['upload'];
                    $download = $value['download'];
                    $comments = $value['comments'];
                    $settings_presales = Settings_execution::Create([
                        'execution_name' => $execution_name,
                        'view'=> $view,
                        'upload'=> $upload,
                        'download'=> $download,
                        'comments'=> $comments,
                        'parent_id' => $parent,
                    ]);
                    //$settings->save();
                    $settings_presales_id=$settings_presales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$settings_presales_id);
                }
            }
        }
        updateMenu($array_menu);
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


                $settings_presales = Settings_presales::get();

                $menu = array();
                    foreach ($settings_presales as $m) {
                        if (empty($m->parent_id)) {
                            $menu[$m->id] = array();
                            $menu[$m->id]['id']      =   $m->id;
                            $menu[$m->id]['presales_name']       =   $m->presales_name;
                            $menu[$m->id]['children']    =   array();
                        }
                    }
                    $submenu = array();
                    foreach ($settings_presales as $m) {
                        if ($m->parent_id) {
                            $submenu[$m->id] = array();
                            $submenu[$m->id]['id'] = $m->id;
                            $submenu[$m->id]['presales_name'] = $m->presales_name;
                           $menu[$m->parent_id]['children'][$m->id] = $submenu[$m->id];
                        }
                        
                    }
                    //return $menu;
                    dd($menu);








         return view('settings_master.view_settings',compact('settings_presaless','settings_postsales','settings_execution','menu'));
        
    }

    public function fetch(Request $request){
        $table = $request->table;
        if( $table == "settings_presales" ){
            $settings_presales = Settings_presales::where('parent_id',$request->id)->get()->toArray();
            //dd($settings_presales);
            return response()->json( $settings_presales) ;
        }else if ($table == "settings_postsales") {
            $settings_postsales = Settings_postsales::where('parent_id',$request->id)->get()->toArray();
            return response()->json( $settings_postsales) ;
            
        }else if ($table == "settings_execution") {
            $settings_execution = Settings_execution::where('parent_id',$request->id)->get()->toArray();
            return response()->json( $settings_execution ) ;
            
        }

    }
}
