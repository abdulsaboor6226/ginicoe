<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="tab" value="additional_info">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Country Of Passport</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Meezan bank limited" value="{{old('country_of_passport',$consumer->country_of_passport)}}" name="country_of_passport">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Passport Number</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('passport_number',$consumer->passport_number)}}" placeholder=" Debit etc.." name="passport_number">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Passport Issuance Date</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('passport_issuance_date',$consumer->passport_issuance_date)}}" placeholder="12345678912345" name="passport_issuance_date">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Passport Expiration Date</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('passport_expiration_date',$consumer->passport_expiration_date)}}" placeholder="xyz" name="passport_expiration_date">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Driving License Country</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('driving_license_country',$consumer->driving_license_country)}}" placeholder="" name="driving_license_country">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Driving Licensing State</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('driving_licensing_state',$consumer->driving_licensing_state)}}" placeholder="sister,brother end etc..." name="driving_licensing_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Driving License Number</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('driving_license_number',$consumer->driving_license_number)}}" placeholder="xyz" name="driving_license_number">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth Country</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_country',$consumer->birth_country)}}" placeholder="xyz" name="birth_country">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth State</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_state',$consumer->birth_state)}}" placeholder="sister,brother end etc..." name="birth_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth City</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_city',$consumer->birth_city)}}" placeholder="xyz" name="birth_city">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth Hospital</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_hospital',$consumer->birth_hospital)}}" placeholder="xyz" name="birth_hospital">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Submit</button>
</form>
