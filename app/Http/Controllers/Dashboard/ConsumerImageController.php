<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\ConsumerImage;
use App\Models\Dictionary;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

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
//        dd($request->all(),url('/core'.Storage::url('app/'.$request->consumer_id_fk)));
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
        foreach ($request->except('_token','_method','main_tab','consumer_id_fk') as $key => $value ){
            foreach ($value as $ItemKey => $item){
                $data['consumer_id_fk'] = $request->consumer_id_fk;
                $data['file_type'] =$item->getMimeType();
                $data['image_content_type'] = $key;
                $data['extension'] = $item->extension();
                if ($key == 'video'||$key == 'compress_file'){
                    $data['url'] = $item->store($storePath.'/'.$key);
                }else{
                    $data['url'] = $item->store($storePath);
                }
                $consumerImage = ConsumerImage::findOrFail($ItemKey)->update($data);
            }
        }
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
    public function serviceUrlSave(Request $request,$id){
            $consumer = Consumer::findOrFail($request->consumer_id_fk)->with('Image')->first();
            $this->validate($request,[
                'url'=>'required'
            ]);
            $data = Dictionary::find($id)->update([
                'entity' => 'GENERAL',
                'key' => 'URL',
                'value' => $request->url,
            ]);
            $multipart = [];
            if(count($consumer->Image)>0) {
                foreach ($consumer->Image as $key => $image) {
                    $multipart[] = [
                        'name' => 'image',
                        'imageTitle' => $image->image_content_type,
                        'extension' => $image->extension,
                        'contents' => fopen(url('/core'.Storage::url('app/'.$image->url)), 'rb'),
                    ];
                }
            }
        $response = Http::post(env('APP_URL'),[], [
            'multipart' => $multipart,
        ]);
//            $client = new Client();
//            $response = $client->request('POST', env('APP_URL'), [
//                'multipart' => $multipart,
//            ]);
            $res_json = $response->getBody()->getContents();
            $res = json_decode($res_json, true);
            if(!$response->getStatusCode() == 200)
            {
                return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
            }
            else{
                return redirect()->back()->with('doneMessage',"Successfully Service Call");
            }


    }
    public function upload(Request $request)
    {
        dd(1);
        $data = $request->only([
            'name',
            'description',
        ]);

        $multipart = [];
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $k => $image) {
                $multipart[] = [
                    'name' => 'file',
                    'contents' => fopen($image->getRealPath(), 'r'),
                    // ... some additional fields
                ];
            }
        }

        // adding some text-oriented data if need
        $multipart[] =  [
            'name' => 'data',
            'contents' => json_encode($data, true),
        ];

        $client = new Client();
        $url = "http://external.site/link/images";
        $response = $client->request('POST', $url, [
            'multipart' => $multipart
        ]);

        $res_json = $response->getBody()->getContents();
        $res = json_decode($res_json, true);

        return redirect()->back()->with([
            'success' => $res['success'],
            'flash_message' => $res['message'],
        ]);
    }
}
