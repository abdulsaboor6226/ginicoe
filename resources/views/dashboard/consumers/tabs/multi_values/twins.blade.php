<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="main_tab" value="primary_info">
    <input type="hidden" name="sub_tab" value="emergency_info">

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Emergency Salutation <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <select class="form-control" required name="emergency_salutation">
                    <option value="">Select Option</option>
                    <option {{ $consumer->emergency_salutation ==  'Mr' ? 'selected' : ""}} value="Mr">Mr</option>
                    <option {{ $consumer->emergency_salutation ==  'Mrs' ? 'selected' : ""}} value="Mrs">Mrs</option>
                    <option {{ $consumer->emergency_salutation ==  'Jr' ? 'selected' : ""}} value="Jr">Jr</option>
                    <option {{ $consumer->emergency_salutation ==  'Sr' ? 'selected' : ""}} value="Sr">Sr</option>
                </select>
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Emergency Phone <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="tel" class="form-control" value="{{old('emergency_phone',$consumer->emergency_phone)}}" placeholder="15 A/W" required name="emergency_phone">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Emergency Email <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" class="form-control" value="{{old('emergency_email',$consumer->emergency_email)}}" placeholder="abc" required name="emergency_email">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Emergency First Name <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_first_name',$consumer->emergency_first_name)}}" placeholder="15 A/W" required name="emergency_first_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Emergency Middle Name</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('emergency_middle_name',$consumer->emergency_middle_name)}}" name="emergency_middle_name">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Emergency Last Name <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_last_name',$consumer->emergency_last_name)}}" placeholder="Gulfam Street" required name="emergency_last_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Emergency US Address 1 <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('emergency_us_address_1',$consumer->emergency_us_address_1)}}" required name="emergency_us_address_1">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Emergency US Address 2 <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <textarea name="emergency_us_address_2"  class="form-control">{{old('emergency_us_address_2',$consumer->emergency_us_address_2)}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Emergency US City <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('emergency_us_city',$consumer->emergency_us_city)}}"  required name="emergency_us_city">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Emergency US State <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_state',$consumer->emergency_us_state)}}" placeholder="xyz" required name="emergency_us_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Emergency US Zip <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_zip',$consumer->emergency_us_zip)}}" placeholder="xyz.." required name="emergency_us_zip">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Emergency US Area Code <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('emergency_us_area_code',$consumer->emergency_us_area_code)}}"  required name="emergency_us_area_code">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Emergency US Urbanization Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_urbanization_name',$consumer->emergency_us_urbanization_name)}}" placeholder="xyz.." name="emergency_us_urbanization_name">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Submit & Next</button>
</form>

