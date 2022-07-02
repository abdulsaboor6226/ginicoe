<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="main_tab" value="primary_info">
    <input type="hidden" name="sub_tab" value="secondary_info">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Phone <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="tel" class="form-control" placeholder="123456789" value="{{old('secondary_phone',$consumer->secondary_phone)}}"  required name="secondary_phone">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Secondary Email <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="abc@example.com" value="{{old('secondary_email',$consumer->secondary_email)}}"  required name="secondary_email">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Previous US Address 1 <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_address_1',$consumer->previous_us_address_1)}}" placeholder="15 A/W" required name="previous_us_address_1">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Previous US Address 2</label>
        <div class="col-sm-4">
            <div class="form-group">
                <textarea name="previous_us_address_2"  class="form-control">{{old('previous_us_address_2',$consumer->previous_us_address_2)}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Previous US State <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="California" value="{{old('previous_us_state',$consumer->previous_us_state)}}" required name="previous_us_state">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Previous US City <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_city',$consumer->previous_us_city)}}" placeholder="London" required name="previous_us_city">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Previous US Zip <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="63100" value="{{old('previous_us_zip',$consumer->previous_us_zip)}}" required name="previous_us_zip">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Previous US Area Code <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_area_code',$consumer->previous_us_area_code)}}" placeholder="abc.." required name="previous_us_area_code">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Previous US Urbanization Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_urbanization_name',$consumer->previous_us_urbanization_name)}}" placeholder="15 A/W" name="previous_us_urbanization_name">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Is US Citizen </label>
        <div class="col-sm-4">
            <div class="form-group"  style="margin: 13px 0 0 20px;">
                <input type="checkbox" {{$consumer->is_us_citizen == 1 ? "checked": " "}} name="is_us_citizen" value="{{old('is_us_citizen',$consumer->is_us_citizen)}}" class="form-check-input">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Submit & Next</button>
</form>

