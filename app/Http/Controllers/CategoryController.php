<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     function renderMenuItem($id, $label)
    //     {
    //         return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" >' .
    //             '<div class="dd-handle dd3-handle" > Drag</div>' .
    //             '<div class="dd3-content"><span>' . $label . '</span>' .
    //             '<div class="item-edit">Edit</div>' .
    //             '</div>' .
    //             '<div class="item-settings d-none">' .
    //             '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
    //             '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
    //             '<a class="item-close" href="javascript:;">Close</a></p>' .
    //             '</div>';
    //     }

    //     function menuTree($parent_id = 0)
    //     {
    //         $items = '';
    //         //$settings = DB::select("SELECT * FROM `settings` WHERE `parent_id`= $parent_id ORDER BY `id` ASC ");
    //         //$settings = Settings::orderBy('id','ASC')->get();
    //         $settings = DB::table('settings')->where('parent_id',$parent_id)->orderBy('id')->get();
    //         if(!empty($settings)){
    //             $items .= '<ol class="dd-list">';
    //             foreach($settings as $row){
    //                 $items .=renderMenuItem($row->id, $row->label_menu);
    //                 $items .= menuTree($row->id);
    //                 $items .= '</li>';   
    //             }
    //             $items .= '</ol>';
    //         }
    //         return $items;   
    //     }

    //     $html=menuTree();
    //     return view('settings_master.category',compact('html'));
    // }



    public function index()
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
            $settings = DB::table('settings')->where('parent_id',$parent_id)->orderBy('id')->get();
            if(!empty($settings)){
                $items .= '<ol class="dd-list">';
                foreach($settings as $row){
                    
                    //dd($tfview);
                    $items .=renderMenuItem($row->id, $row->label_menu, $row->view, $row->upload, $row->download, $row->comments);
                    $items .= menuTree($row->id);
                    $items .= '</li>';   
                }
                $items .= '</ol>';
            }
            return $items;   
        }

        $html=menuTree();
        return view('settings_master.category',compact('html'));
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
        $truncate = Settings::truncate();
        
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
                    $label = $value['label'];
                    //$url = (empty($value['url'])) ? '#' : $value['url'];
                    $view = $value['view'];
                    $upload = $value['upload'];
                    $download = $value['download'];
                    $comments = $value['comments'];
                    $settings = Settings::Create([
                        'label_menu' => $label,
                        'view'=> $view,
                        'upload'=> $upload,
                        'download'=> $download,
                        'comments'=> $comments,
                        'parent_id' => $parent,
                    ]);
                    //$settings->save();
                    $settings_id=$settings->id;
                    if (array_key_exists('children', $value))
                    updateMenu($value['children'],$settings_id);
                }
            }
        }
        updateMenu($array_menu);
        return redirect()->route('Category.index');
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


    
   
    // public function fetchAll()
    // {
    //     $params = array();
    //     $meta = $this->query->result_metadata();
    //     while ($field = $meta->fetch_field()) {
    //         $params[] = &$row[$field->name];
    //     }
    //     call_user_func_array(array($this->query, 'bind_result'), $params);
    //     $result = array();
    //     while ($this->query->fetch()) {
    //         $r = array();
    //         foreach ($row as $key => $val) {
    //             $r[$key] = $val;
    //         }
    //         $result[] = $r;
    //     }
    //     $this->query->close();
    //     return $result;
    // }
}
