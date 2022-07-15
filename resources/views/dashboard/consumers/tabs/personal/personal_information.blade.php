<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="main_tab" value="primary_info">
    <input type="hidden" name="sub_tab" value="personal_info">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Salutation <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <select class="form-control" required name="salutation">
                    <option value="">Select Option</option>
                    <option {{ $consumer->salutation ==  'Mr' ? 'selected' : ""}} value="Mr">Mr</option>
                    <option {{ $consumer->salutation ==  'Mrs' ? 'selected' : ""}} value="Mrs">Mrs</option>
                    <option {{ $consumer->salutation ==  'Jr' ? 'selected' : ""}} value="Jr">Jr</option>
                    <option {{ $consumer->salutation ==  'Sr' ? 'selected' : ""}} value="Sr">Sr</option>
                </select>
            </div>
        </div>
        <label class="col-sm-2 form-control-label">First Name <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('first_name',$consumer->first_name)}}" placeholder="xyz.." required name="first_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Middle Name</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('middle_name',$consumer->middle_name)}}" placeholder="xyz..." name="middle_name">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Last Name <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('last_name',$consumer->last_name)}}" placeholder="xyz" required name="last_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birthday <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="date" class="form-control" placeholder="xyz" value="{{old('birthday',$consumer->birthday)}}"  required name="birthday">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Primary Email <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" class="form-control" value="{{old('primary_email',$consumer->primary_email)}}" placeholder="xyz@example.com" required name="primary_email">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Primary Phone <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="tel" class="form-control" value="{{old('primary_phone',$consumer->primary_phone)}}" placeholder="123456789" required name="primary_phone">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Current US Urbanization Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('current_us_urbanization_name',$consumer->current_us_urbanization_name)}}" placeholder="xyz.." name="current_us_urbanization_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Address 1 <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Address" value="{{old('current_us_address_1',$consumer->current_us_address_1)}}" required name="current_us_address_1">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Address 2 </label>
        <div class="col-sm-4">
            <div class="form-group">
                <textarea name="current_us_address_2" class="form-control">{{old('current_us_address_2')}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Current US City <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('current_us_city',$consumer->current_us_city)}}" placeholder="London" required name="current_us_city">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Current US State <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('current_us_state',$consumer->current_us_state)}}"  required name="current_us_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Current US Zip <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('current_us_zip',$consumer->current_us_zip)}}" placeholder="12345" required name="current_us_zip">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Current US Area Code <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('current_us_area_code',$consumer->current_us_area_code)}}" placeholder="12345" required name="current_us_area_code">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Social Security </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('social_security',$consumer->social_security)}}"  name="social_security">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Credit Privacy </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('credit_privacy',$consumer->credit_privacy)}}" name="credit_privacy">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Mask </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('mask',$consumer->mask)}}"  name="mask">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Current US Lived For More Than Two Years</label>
        <div class="col-sm-4">
            <div class="form-group" style="margin: 13px 0 0 20px;">
                <input type="checkbox" {{$consumer->current_us_lived_for_more_than_two_years == 1 ? "checked": " "}} name="current_us_lived_for_more_than_two_years" value="{{old('current_us_lived_for_more_than_two_years',$consumer->current_us_lived_for_more_than_two_years)}}" class="form-check-input">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Submit & Next</button>
</form>

