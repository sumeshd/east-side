<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presales;
use App\Models\Postsales;
use App\Models\Execution;
use App\Models\Image;
// use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $settings = Presales::where('presales_name',$taskname)->get()->toArray();
            //dd($data['settings']);
            return view('settings_master.gallery',compact('images','settings'));
        }else if ($settings == 'postsales') {
            $data['images'] = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Postsales::where('postsales_name',$taskname)->get()->toArray();
            return view('settings_master.gallery',$data);       
        }else if ($settings == 'execution') {
            $data['images'] = Image::where('settings_name',$settings)->where('task_name',$taskname)->orderBy('created_at','DESC')->paginate(12);
            $data['settings'] = Postsales::where('execution_name',$taskname)->get()->toArray();
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
            $settings = Presales::where('presales_name',$taskname)->get()->toArray();
            return view('settings_master.image_settings',compact('settings'));
        }else if($settings == 'postsales'){
            $settings = Postsales::where('postsales_name',$taskname)->get()->toArray();
            return view('settings_master.image_settings',compact('settings'));
        }else if($settings == 'postsales'){
            $settings = Postsales::where('execution_name',$taskname)->get()->toArray();
            return view('settings_master.image_settings',compact('settings'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // $this->validate($request , [
    //     //     'image' => 'required|mimes:pdf,jpeg,jpg,doc,docx|max:9000',
            
    //     // ]);

    //     $request->validate([
    //         'image' => 'required|mimes:doc,docx,pdf,txt',
    //     ]);

    //     $images = $request->image;
    //     foreach($images as $image){
    //         $newImageName = "";
    //         $newImageName = time() . '-' . $request->image_name . $image->getClientOriginalName();
    //         $image->move(public_path('images'),$newImageName);
    //         $galary = Image::create([
    //             'user_id' => Auth::user()->id,
    //             'image' => $newImageName,
    //             'settings_name' => $request->settings_name,
    //             'task_name'=> $request->task_name,

    //         ]);

    //     }    
    //     return redirect()->action(
    //                             [GalleryController::class, 'index'], [ $request->task_name ,$request->settings_name ]
    //                         );
    
    // }





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
            'image' => 'required|mimes:doc,docx,pdf,jpg,png,ppt|max:9000',
        ]);

            $images = $request->image;
            $newImageName = time() . '-' . $request->image_name . '.' . $images->extension();
            $images->move(public_path('images'),$newImageName);
            $gallery = Image::create([
                'user_id' => Auth::user()->id,
                'image' => $newImageName,
                'settings_name' => $request->settings_name,
                'task_name'=> $request->task_name,

            ]);

        return redirect()->action([GalleryController::class, 'index'], [ $request->task_name ,$request->settings_name ]);
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
        return redirect()->action(
                                [GalleryController::class, 'index'], [ $taskname ,$settings ]
                            );
    }

    // public function download($id)
    // {
    //     if( !empty($id)){
    //         $image = Image::find($id);
    //         //return Storage::download(public_path('images/'.$image->image)); For Image Download
    //         return response()->download(public_path('/images/'.$image->image));
    //     }
    // }
}
