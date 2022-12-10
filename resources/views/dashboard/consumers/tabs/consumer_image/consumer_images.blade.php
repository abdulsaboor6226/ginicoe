<form action="{{route('consumers_images.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="main_tab" value="consumer_images">
    <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Front<span class="text-danger">*</span><br><span class="text-info">( Multiple images 10mb )</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" value="{{old('front')}}" placeholder="xyz..."  multiple name="front[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Right Side<span class="text-danger">*</span><br><span class="text-info">( Multiple images 10mb )</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" value="{{old('right_side')}}" placeholder="xyz"  multiple name="right_side[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Left Side<span class="text-danger">*</span><br><span class="text-info">( Multiple images 10mb )</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" value="{{old('left_side')}}" placeholder="15 A/W"  multiple name="left_side[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">With Glasses <br><span class="text-info">( Multiple images 10mb )</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" value="{{old('with_glasses')}}" placeholder="Gulfam Street" multiple name="with_glasses[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">With Mask <br><span class="text-info">( Multiple images 10mb )</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" placeholder="xyz.." value="{{old('with_mask')}}" multiple name="with_mask[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">With Face Tattoo  <br><span class="text-info">( Multiple images 10mb )</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" placeholder="xyz.." value="{{old('with_face_tattoo')}}" multiple name="with_face_tattoo[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">With Piercing <br><span class="text-info">( Multiple images 10mb )</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" value="{{old('with_piercing')}}" placeholder="63100" multiple name="with_piercing[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Video  <br><span class="text-info">( Multiple Video 8mb )</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="video/*" placeholder="xyz.." value="{{old('video')}}" multiple name="video[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Compress File <br><span class="text-info">( Multiple File 5mb )</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept=".zip,.rar" value="{{old('compress_file')}}" placeholder="63100" multiple name="compress_file[]">
            </div>
        </div>
    </div>
        <button class="col-sm-2 btn btn-primary">Save</button>
</form>
<br/>
<br/>
<hr>
@include('dashboard.consumers.tabs.consumer_image.url')

