<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings_presales;
use App\Models\Settings_postsales;
use App\Models\Settings_execution;
use App\Models\Image;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($taskname, $settings)
    {
        if( $settings == 'presales' ){
            $images = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $settings = Settings_presales::where('presales_name',$taskname)->get()->toArray();
            //dd($data['settings']);
            return view('settings_master.gallery',compact('images','settings'));
        }else if ($settings == 'postsales') {
            $data['images'] = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Settings_postsales::where('presales_name',$taskname)->get()->toArray();
            return view('settings_master.gallery',$data);       
        }else if ($settings == 'execution') {
            $data['images'] = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Settings_execution::where('presales_name',$taskname)->get()->toArray();
            return view('settings_master.gallery',$data);       
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($taskname,$settings)
    {
        if( $settings == 'presales' ){
            $settings = Settings_presales::where('presales_name',$taskname)->get()->toArray();
            return view('settings_master.image_settings',compact('settings'));
        }else if($settings == 'postsales'){
            $settings = Settings_postsales::where('postsales_name',$taskname)->get()->toArray();
            return view('settings_master.image_settings',compact('settings'));
        }else if($settings == 'postsales'){
            $settings = Settings_execution::where('execution_name',$taskname)->get()->toArray();
            return view('settings_master.image_settings',compact('settings'));
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
        $this->validate($request , [
            'image' => 'required',
            
        ]);

        $images = $request->image;
        foreach($images as $image){
            $newImageName = "";
            $newImageName = time() . '-' . $request->image_name . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'),$newImageName);
            $galary = Image::create([
                'user_id' => Auth::user()->id,
                'image' => $newImageName,
                'settings_name' => $request->settings_name,
                'task_name'=> $request->task_name,

            ]);

        }
        if( $request->settings_name == 'presales' ){
            $images = Image::where('settings_name',$request->settings_name)->where('task_name',$request->task_name)->orderBy('created_at','DESC')->paginate(12);
            $settings = Settings_presales::where('presales_name',$request->task_name)->get()->toArray();
            //dd($data['settings']);
            return view('settings_master.gallery',compact('images','settings'))->with('success','New Image Added successfully.');  
        }else if ($request->settings_name == 'postsales') {
            $data['images'] = Image::where('settings_name',$request->settings_name)->where('task_name',$request->task_name)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Settings_postsales::where('presales_name',$request->task_name)->get()->toArray();
            return view('settings_master.gallery',$data)
            ->with('success','New Image Added successfully.');       
        }else if ($request->settings_name == 'execution') {
            $data['images'] = Image::where('settings_name',$request->settings_name)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Settings_execution::where('presales_name',$request->task_name)->get()->toArray();
            return view('settings_master.gallery',$data)
            ->with('success','New Image Added successfully.');       
        }
        //;
        //return redirect()->route('gallery/$request->task_name/$request->settings_name')
    
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
    public function destroy($id, $taskname, $settings)
    {
        if($id != ''){
            $image = Image::find($id);
            $image->delete();
            
        }
        if( $settings == 'presales' ){
            $images = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $settings = Settings_presales::where('presales_name',$taskname)->get()->toArray();
            //dd($taskname);
            //return redirect()->route('gallery',[$taskname,$settings]);
            return view('settings_master.gallery',compact('images','settings'))
                    ->with('success','Image Deleted successfully...');
        }else if ($settings == 'postsales') {
            $data['images'] = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Settings_postsales::where('presales_name',$taskname)->get()->toArray();
            return view('settings_master.gallery',$data);       
        }else if ($settings == 'execution') {
            $data['images'] = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Settings_execution::where('presales_name',$taskname)->get()->toArray();
            return view('settings_master.gallery',$data);       
        }
    }

    public function download($id)
    {
        $path = 'public/images';
        $image = Image::find($id);
        return Storage::download($path,$image->image);
    }
}
