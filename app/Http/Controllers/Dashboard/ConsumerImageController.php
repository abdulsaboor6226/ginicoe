<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerImage;
use DB;
use File;
use Illuminate\Http\Request;

class ConsumerImageController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'front.*'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'right_side.*'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'left_side.*'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'with_glasses.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'with_mask.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'with_face_tattoo.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'with_piercing.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'video.*'=>'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm|max:8192',
            'compress_file.*'=>'nullable|file|mimes:zip,rar|max:5120',
        ]);

        DB::beginTransaction();
        $path = public_path('storage/Consumer-images/'.$request->consumer_id_fk);
        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
            File::makeDirectory($path."/video" , 0777, true, true);
            File::makeDirectory($path."/compress_file",0777, true, true);
        }
        $storePath ='public/Consumer-images/'.$request->consumer_id_fk;
        foreach ($request->except('_token','main_tab','consumer_id_fk') as $key => $value ){
            foreach ($value as $item){
                $data['consumer_id_fk'] = $request->consumer_id_fk;
                $data['file_type'] =$item->getMimeType();
                $data['image_content_type'] = $key;
                $data['extension'] = $item->extension();
                if ($key == 'video'||$key == 'compress_file'){
                    $data['url'] = $item->store($storePath.'/'.$key);
                }else{
                    $data['url'] = $item->store($storePath);
                }
                $consumerImage = ConsumerImage::create($data);
            }
        }
        DB::commit();
        if (!$consumerImage)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$request->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>""])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerImage  $consumerImage
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerImage $consumerImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerImage  $consumerImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerImage $consumerImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerImage $consumerImage
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
        $image = ConsumerImage::findOrfail($id);
        $this->validate($request,[
            'front.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'right_side.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'left_side.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'with_glasses.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'with_mask.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:201024048',
            'with_face_tattoo.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'with_piercing.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'video.*'=>'nullable|video|mimes:mp4,ogx,oga,ogv,ogg,webm|max:8192',
            'compress_file.*'=>'nullable|file|mimes:zip,rar|max:5120',
        ]);
        $path = public_path('storage/Consumer-images/'.$request->consumer_id_fk);
        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
            File::makeDirectory($path."/video" , 0777, true, true);
            File::makeDirectory($path."/compress_file",0777, true, true);
        }
        $storePath ='public/Consumer-images/'.$request->consumer_id_fk;
        $request['front_image_url'] = $request->front ==null ? $image->front_image_url :$request->front->store($storePath) ;
        $request['right_side_image_url'] = $request->right_side ==null ? $image->right_side_image_url : $request->right_side->store($storePath) ;
        $request['left_side_image_url'] = $request->left_side ==null ? $image->left_side_image_url : $request->left_side->store($storePath) ;
        $request['with_glasses_image_url'] = $request->with_glasses == null ? $image->with_glasses_image_url:  $request->with_glasses->store($storePath);
        $request['with_mask_image_url'] = $request->with_mask == null ? $image->with_mask_image_url:  $request->with_mask->store($storePath);
        $request['with_face_tattoo_image_url'] = $request->with_face_tattoo == null ? $image->with_face_tattoo_image_url:  $request->with_face_tattoo->store($storePath);
        $request['with_piercing_image_url'] = $request->with_piercing == null ? $image->with_piercing_image_url:  $request->with_piercing->store($storePath);
        $request['video_url'] = $request->video == null ? $image->video_url:  $request->video->store($storePath);
        $request['compress_file_url'] = $request->compress_file == null ? $image->compress_file_url:  $request->with_piercing->store($storePath);
        $consumerImage = $image->update($request->except('_token','front','right_side','left_side','with_glasses','with_mask','with_face_tattoo','with_piercing','video','compress_file'));
        if (!$consumerImage)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$request->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>""])->with('doneMessage',"Successfully record Save");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerImage  $consumerImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerImage $consumerImage)
    {
        //
    }
}
