<form action="{{route('consumers_images.update',$consumer->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="main_tab" value="consumer_images">
    <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
    @foreach($consumer->image->groupBy('image_content_type') as $key => $image_contents)
        <div class="form-group row">
            @foreach($image_contents as $value)
                <label class="col-sm-1 form-control-label">{{ucfirst(str_replace('_',' ',$value->image_content_type))}}<span class="text-danger">*</span></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage($value->url) }}" value="{{old($value->image_content_type)}}" placeholder="xyz..."  multiple name="{{$value->image_content_type}}[{{$value->id}}]">
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
    @endforeach
    <button class="btn btn-primary">Save</button>
</form>
<br/>
<br/>
<hr>
@include('dashboard.consumers.tabs.consumer_image.url')
