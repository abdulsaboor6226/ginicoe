<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="tab" value="secondary_info">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Bank</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Meezan bank limited" value="{{old('social_security_number',$consumer->social_security_number)}}" name="social_security_number">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Type</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('credit_privacy',$consumer->credit_privacy)}}" placeholder=" Debit etc.." name="credit_privacy">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Number</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('mask',$consumer->mask)}}" placeholder="12345678912345" name="mask">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_address_1',$consumer->previous_us_address_1)}}" placeholder="xyz" name="previous_us_address_1">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Holder Last Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('previous_us_address_2',$consumer->previous_us_address_2)}}" placeholder="" name="previous_us_address_2">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder Relationship</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_urbanization_name',$consumer->previous_us_urbanization_name)}}" placeholder="sister,brother end etc..." name="previous_us_urbanization_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_city',$consumer->previous_us_city)}}" placeholder="xyz" name="previous_us_city">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_state',$consumer->previous_us_state)}}" placeholder="xyz" name="previous_us_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Bank</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Meezan bank limited" value="{{old('previous_us_zip',$consumer->previous_us_zip)}}" name="previous_us_zip">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Type</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('previous_us_area_code',$consumer->previous_us_area_code)}}" placeholder=" Debit etc.." name="previous_us_area_code">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Number</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('secondary_email',$consumer->secondary_email)}}" placeholder="12345678912345" name="secondary_email">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('secondary_phone',$consumer->secondary_phone)}}" placeholder="xyz" name="secondary_phone">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Holder Last Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('emergency_salutation',$consumer->emergency_salutation)}}" placeholder="" name="emergency_salutation">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder Relationship</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_first_name',$consumer->emergency_first_name)}}" placeholder="sister,brother end etc..." name="emergency_first_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_last_name',$consumer->emergency_last_name)}}" placeholder="xyz" name="emergency_last_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_middle_name',$consumer->emergency_middle_name)}}" placeholder="xyz" name="emergency_middle_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Bank</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Meezan bank limited" value="{{old('emergency_us_address_1',$consumer->emergency_us_address_1)}}" name="emergency_us_address_1">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Type</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_address_2',$consumer->emergency_us_address_2)}}" placeholder=" Debit etc.." name="emergency_us_address_2">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Number</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_urbanization_name',$consumer->emergency_us_urbanization_name)}}" placeholder="12345678912345" name="emergency_us_urbanization_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_city',$consumer->emergency_us_city)}}" placeholder="xyz" name="emergency_us_city">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Card Holder Last Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('emergency_us_state',$consumer->emergency_us_state)}}" placeholder="" name="emergency_us_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder Relationship</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_zip',$consumer->emergency_us_zip)}}" placeholder="sister,brother end etc..." name="emergency_us_zip">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_us_area_code',$consumer->emergency_us_area_code)}}" placeholder="xyz" name="emergency_us_area_code">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('emergency_email',$consumer->emergency_email)}}" placeholder="xyz" name="emergency_email">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Current Us Lived For More Than Two Years</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('is_us_citizen',$consumer->is_us_citizen)}}" placeholder="" name="is_us_citizen">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Save And Next</button>
</form>
