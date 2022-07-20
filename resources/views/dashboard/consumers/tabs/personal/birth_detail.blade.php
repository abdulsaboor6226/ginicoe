<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="main_tab" value="primary_info">
    <input type="hidden" name="sub_tab" value="birth_detail">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth Country <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <select class="form-control" required  name="birth_country_id_fk">
                    <option value="">Select Option</option>
                    @foreach($countries as $country)
                        <option {{ $country->id ==  $consumer->birth_country_id_fk ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Birth State <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_state',$consumer->birth_state)}}" placeholder="xyz.." required name="birth_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth City <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_city',$consumer->birth_city)}}" placeholder="xyz..." required name="birth_city">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Birth Hospital <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_hospital',$consumer->birth_hospital)}}" placeholder="xyz" required name="birth_hospital">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth House Number  </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_house_number',$consumer->birth_house_number)}}" placeholder="15 A/W" name="birth_house_number">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Birth Street Name</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_street_name',$consumer->birth_street_name)}}" placeholder="Gulfam Street" required name="birth_street_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth Urbanization Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('birth_urbanization_name',$consumer->birth_urbanization_name)}}" name="birth_urbanization_name">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Birth Zip <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('birth_zip',$consumer->birth_zip)}}" required name="birth_zip">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Birth Area Code <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('birth_area_code',$consumer->birth_area_code)}}" placeholder="63100" required name="birth_area_code">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Date Of Birth <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="date" class="form-control" value="{{old('date_of_birth',$consumer->date_of_birth)}}"  required name="date_of_birth">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Mid Wife First Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('mid_wife_first_name',$consumer->mid_wife_first_name)}}"  name="mid_wife_first_name">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Mid Wife Last Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('mid_wife_last_name',$consumer->mid_wife_last_name)}}" placeholder="xyz" name="mid_wife_last_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">First Responder Highway Name</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('first_responder_highway_name',$consumer->first_responder_highway_name)}}" placeholder="xyz.." name="first_responder_highway_name">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">First Responder Street Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('first_responder_street_name',$consumer->first_responder_street_name)}}"  name="first_responder_street_name">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Closest Bus Stop </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('closest_bus_stop',$consumer->closest_bus_stop)}}" placeholder="abc" name="closest_bus_stop">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Closest Intersection</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('closest_intersection',$consumer->closest_intersection)}}" placeholder="xyz.." name="closest_intersection">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Closest Parking Lot Name </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('closest_parking_lot_name',$consumer->closest_parking_lot_name)}}" placeholder="abc" name="closest_parking_lot_name">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Closest Train Station </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('closest_train_station',$consumer->closest_train_station)}}" placeholder="abc" name="closest_train_station">
            </div>
        </div>
    </div>

    <button  class="btn btn-primary">Submit & Next</button>
</form>

