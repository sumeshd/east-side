<?php

namespace App\Http\Controllers;

use App\Models\Presales;
use App\Models\Postsales;
use App\Models\Execution;
use App\Models\Settings;
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
        function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments )
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

        function menuTree($parent_id = 0)
        {
            $items = '';
            //$settings = DB::select("SELECT * FROM `settings` WHERE `parent_id`= $parent_id ORDER BY `id` ASC ");
            //$settings = Settings::orderBy('id','ASC')->get();
            $presales = DB::table('settings')->where('parent_id',$parent_id)->where('type','presales')->orderBy('id')->get();
            if(!empty($presales)){
                $items .= '<ol class="dd-list">';
                foreach($presales as $row){
                    
                    //dd($tfview);
                    $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment );
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
        function renderMenuItem($id, $label, $description, $check_id, $view, $upload, $download, $comments)
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
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label .'" data-description ="'. $description . '" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '" data-deleteitem="">' .
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
            $postsales = DB::table('settings')->where('parent_id',$parent_id)->where('type','postsales')->orderBy('id')->get();
            if(!empty($postsales)){
                $items .= '<ol class="dd-list">';
                foreach($postsales as $row){
                    $items .=renderMenuItem($row->id, $row->name, $row->description, $row->check_id, $row->can_view, $row->can_upload, $row->can_download, $row->can_comment);
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
            return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-description ="'.$description. '" data-checkid="'.$check_id. '" data-view="' . $view . '" data-upload="' . $upload . '" data-download="' . $download . '" data-comments="' . $comments . '">' .
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
            $execution = DB::table('settings')->where('parent_id',$parent_id)->where('type','execution')->orderBy('id')->get();
            if(!empty($execution)){
                $items .= '<ol class="dd-list">';
                foreach($execution as $row){
                    
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
    public function presalesStore(Request $request)
    {
       // $truncate = Settings::where('type','presales')->get();
       //  foreach($truncate as $row){
       //      $delete=Settings::find($row->id);
       //      $delete->delete();
       //  }
        //dd($request->menu);
        $menu=$request->menu;
        $array_menu = json_decode($menu, true);
        function updateMenu($menu,$parent = 0)
        {
            if (!empty($menu)) {
                foreach ($menu as $value) {
                    if( $value['checkid'] == 0){
                        $presales = Settings::Create([
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
                        $presales = Settings::where('id',$presales_id)->update(['check_id' => $presales_id ]);

                    }else{

                        if($value['deleteitem'] == 'delete'){
                            $presales = Settings::where('id',$value['id'])->delete();
                            $presales_id=$parent;

                        }else{
                            $presales = Settings::where('id',$value['id'])->update([
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
                    
                    //$presales_id=$presales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$presales_id);
                }
            }
        }
        updateMenu($array_menu);
        Settings::where('parent_id',0)->where('type','presales')->update([ 
            'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
        ]);
        return redirect('presales');
    }


    public function postsalesStore(Request $request)
    {
       //$truncate = Settings::truncate();

        // $truncate = Settings::where('type','postsales')->get();
        // foreach($truncate as $row){
        //     $delete=Settings::find($row->id);
        //     $delete->delete();
        // }
        $menu=$request->menu;
        $array_menu = json_decode($menu, true);
        function updateMenu($menu,$parent = 0)
        {
            if (!empty($menu)) {
                foreach ($menu as $value) {

                    if( $value['checkid'] == 0){
                        $postsales = Settings::Create([
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
                        $postsales = Settings::where('id',$postsales_id)->update(['check_id' => $postsales_id ]);

                    }else{
                        $postsales = Settings::where('id',$value['id'])->update([
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

                    // $postsales_id=$postsales->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$postsales_id);
                }
            }
        }
        updateMenu($array_menu);
        Settings::where('parent_id',0)->where('type','postsales')->update([ 
            'can_view' => 0,'can_upload' => 0,'can_download' => 0,'can_comment' => 0
        ]);
        return redirect('postsales');
    }





    public function executionStore(Request $request)
    {
        //$truncate = Execution::truncate();

        // $truncate = Settings::where('type','execution')->get();
        // foreach($truncate as $row){
        //     $delete=Settings::find($row->id);
        //     $delete->delete();
        // }
        $menu=$request->menu;
        $array_menu = json_decode($menu, true);
        dd($array_menu);
        function updateMenu($menu,$parent = 0)
        {
            if (!empty($menu)) {
                foreach ($menu as $value) {

                    if( $value['checkid'] == 0){
                        $execution = Settings::Create([
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
                        $execution = Settings::where('id',$execution_id)->update(['check_id' => $execution_id ]);

                    }else{
                        $execution = Settings::where('id',$value['id'])->update([
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

                    //$execution_id=$execution->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$execution_id);
                }
            }
        }
        updateMenu($array_menu);
        Settings::where('parent_id',0)->where('type','execution')->update([ 
            'can_view' => 0,'can_upload' => 0, 'can_download' => 0,'can_comment' => 0
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
        $settings_presales = Settings::where('parent_id',0)->where('type','presales')->get()->toArray();
        //dd($settings);
        $settings_postsales = Settings::where('parent_id',0)->where('type','postsales')->get()->toArray();
        $settings_execution = Settings::where('parent_id',0)->where('type','execution')->get()->toArray();
        return view('settings_master.view_settings',compact('settings_presales','settings_postsales','settings_execution'));
        
    }

    public function fetch(Request $request){
        $type = $request->stype;
        if( $type == "presales" ){
            $presales = Settings::where('parent_id',$request->id)->where('type',$type)->get()->toArray();
            //dd($presales);
            return response()->json( $presales);
        }else if ($type == "postsales") {
            $postsales = Settings::where('parent_id',$request->id)->where('type',$type)->get()->toArray();
            return response()->json( $postsales) ;
            
        }else if ($type == "execution") {
            $execution = Settings::where('parent_id',$request->id)->where('type',$type)->get()->toArray();
            return response()->json( $execution ) ;    
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
            $settings = Presales::where('id',$id)->first();
            return view('comment_master.comment',compact('settings'));

        }else if($settings == 'postsales'){
            $settings = Postsales::where('id',$id)->first();
            return view('comment_master.comment',compact('settings'));

        }else if($settings == 'execution'){
            $settings = Execution::where('id',$id)->first();
            return view('comment_master.comment',compact('settings'));
        }
        
    }


   


}
