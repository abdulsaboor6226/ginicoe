<form action="{{route($consumer->image == null ? 'consumers_images.store': 'consumers_images.update',@$consumer->image['id'])}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{$consumer->image == null ? "": method_field('put')}}
    <input type="hidden" name="main_tab" value="consumer_images">
    <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Front<span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage(@$consumer->image['front']) }}" value="{{old('front')}}" placeholder="xyz..."  multiple name="front[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Right Side<span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage(@$consumer->image['right_side']) }}" value="{{old('right_side')}}" placeholder="xyz"  multiple name="right_side[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Left Side<span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage(@$consumer->image['left_side']) }}" value="{{old('left_side')}}" placeholder="15 A/W"  multiple name="left_side[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">With Glasses</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage(@$consumer->image['with_glasses']) }}" value="{{old('with_glasses')}}" placeholder="Gulfam Street" multiple name="with_glasses[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">With Mask</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage(@$consumer->image['with_mask']) }}" placeholder="xyz.." value="{{old('with_mask')}}" multiple name="with_mask[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">With Face Tattoo </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage(@$consumer->image['with_face_tattoo']) }}" placeholder="xyz.." value="{{old('with_face_tattoo')}}" multiple name="with_face_tattoo[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">With Piercing</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="image/*" data-default-file="{{ Helper::getImage(@$consumer->image['with_piercing']) }}" value="{{old('with_piercing')}}" placeholder="63100" multiple name="with_piercing[]">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Video </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept="video/*" data-default-file="{{ Helper::getImage(@$consumer->image['video']) }}" placeholder="xyz.." value="{{old('video')}}" multiple name="video[]">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Compress File</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="file" class="form-control dropify" accept=".zip,.rar" data-default-file="{{ Helper::getImage(@$consumer->image['compress_file']) }}" value="{{old('compress_file')}}" placeholder="63100" multiple name="compress_file[]">
            </div>
        </div>
    </div>
    @if($consumer->image == null)
        <button class="btn btn-primary">Save</button>
    @endif
</form>

