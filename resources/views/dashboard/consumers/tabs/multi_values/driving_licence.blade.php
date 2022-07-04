<form action="{{route('driving-licence.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="main_tab" value="multi_values_form_data">
    <input type="hidden" name="sub_tab" value="driving_licence">
    <input type="hidden" name="consumer_id" value="{{$consumer->id}}">

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Driving License Country<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <select class="form-control" required  name="driving_license_country_id_fk">
                    <option value="">Select Option</option>
                    @foreach($countries as $country)
                        <option {{ $country->id ==  $consumer->driving_license_country_id_fk ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Driving Licensing State <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('driving_licensing_state',$consumer->driving_licensing_state)}}" placeholder="London" required name="driving_licensing_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Driving License ID <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('driving_license_id',$consumer->driving_license_id)}}" placeholder="XX-12-1234" required name="driving_license_id">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Submit & Next</button>
</form>

