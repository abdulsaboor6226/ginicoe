<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="main_tab" value="primary_info">
    <input type="hidden" name="sub_tab" value="professional_info">

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Net Worth <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('net_worth',$consumer->net_worth)}}" placeholder="15 A/W" required name="net_worth">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Occupation</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('occupation',$consumer->occupation)}}" placeholder="Gulfam Street" required name="occupation">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">State ID<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('state_id',$consumer->state_id)}}" placeholder="15 A/W" required name="state_id">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">US Military Branch</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('us_military_branch',$consumer->us_military_branch)}}" placeholder="Gulfam Street" required name="us_military_branch">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">US Military<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('us_military',$consumer->us_military)}}" required name="us_military">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">US Employee Badge</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('us_employee_badge',$consumer->us_employee_badge)}}" required name="us_employee_badge">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">US Govt Badge Country <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <select id="us_govt_badge_country" class="form-control" required  name="us_govt_badge_country_id_fk">
                    <option value="">Select Option</option>
                    @foreach($countries as $country)
                        <option {{$country->id== $consumer->us_govt_badge_country_id_fk ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->iso3}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label class="col-sm-2 form-control-label">US Govt Badge State <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <select id="us_govt_badge_state" name="us_govt_badge_state_id_fk" class="form-control"></select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">US Govt Badge Country <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('us_govt_badge_country_id_fk',$consumer->us_govt_badge_country_id_fk)}}" placeholder="63100" required name="us_govt_badge_country_id_fk">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">US Govt Badge State<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" class="form-control" value="{{old('us_govt_badge_state',$consumer->us_govt_badge_state)}}"  required name="us_govt_badge_state">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">US Govt Badge ID<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('us_govt_badge_id',$consumer->us_govt_badge_id)}}" placeholder="63100" required name="us_govt_badge_id">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">US Agency Description<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" class="form-control" value="{{old('us_agency_description',$consumer->us_agency_description)}}"  required name="us_agency_description">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Foreign Agency Description<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('foreign_agency_description',$consumer->foreign_agency_description)}}" placeholder="63100" required name="foreign_agency_description">
            </div>
        </div>
        <label class="col-sm-2 form-control-label"> Indian Affairs Card Number<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" class="form-control" value="{{old('bureau_of_indian_affairs_card_number',$consumer->bureau_of_indian_affairs_card_number)}}"  required name="bureau_of_indian_affairs_card_number">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Tribal Treaty Card Number<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('tribal_treaty_card_number',$consumer->tribal_treaty_card_number)}}" placeholder="63100" name="tribal_treaty_card_number">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Tribal ID<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" class="form-control" value="{{old('tribal_id',$consumer->tribal_id)}}"  required name="tribal_id">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Have Living Siblings<span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('have_living_siblings',$consumer->have_living_siblings)}}"  required name="have_living_siblings">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Submit & Next</button>
</form>

