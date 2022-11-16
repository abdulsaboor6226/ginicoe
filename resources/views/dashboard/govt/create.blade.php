@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <h3 class="text-primary">Create Govt Detail</h3>
        <div class="padding">
            <div class="box">
                <div class="box-body">
                    <form action="{{route('govt.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'f_name' FI Title <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('f_name')}}" placeholder="xyz.." required name="f_name">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'l_name' First Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('l_name')}}" placeholder="xyz.." required name="l_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'phone_no' Middle Name </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="phone" class="form-control" value="{{old('phone_no')}}" placeholder="xyz..." name="phone_no">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'s_phone_no' Last Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="phone" class="form-control" value="{{old('s_phone_no')}}" placeholder="xyz" required name="s_phone_no">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'title' Phone <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="street_name">
                                        <option value="">Select Option</option>
                                        @foreach($titles as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'building_number' Email<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('building_number')}}" placeholder="xyz@example.com" required name="building_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'street_name' Job title<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="{{old('building_number')}}" placeholder="xyz@example.com" required name="building_number">
                            </div>
                            <label class="col-sm-2 form-control-label">'urbanization_number' Secondary First Name</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('street_name')}}" placeholder="xyz@example.com" name="urbanization_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'country_id_fk' Secondary Last Name</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" value="{{old('urbanization_number')}}" name="country_id_fk">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'state_id_fk' Secondary Phone</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Address" value="{{old('country_id_fk')}}"  name="state_id_fk">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'city_id_fk' Secondary Fax No</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" value="{{old('state_id_fk')}}" placeholder="London" name="city_id_fk">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'type' Secondary Email</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="xyz" value="{{old('city_id_fk')}}" name="type">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'zip_code' FI Represent<span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="single-append-radio" class="form-control select2-allow-clear" required multiple ui-jp="select2" name="zip_code[]" ui-options="{theme: 'bootstrap'}">
                                        <optgroup label="Select Multi Option">
                                            @foreach($FI_represents as $key =>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'agency_sector_id_fk' FI Type<span class="text-danger">*</span> </label>
                            <div class="col-sm-4" style="padding-top: 10px">
                                <div class="form-group">
                                    @foreach($FI_charterTypes as $key=> $value)
                                        <label class="radio-inline">
                                            <input type="radio" name="agency_sector_id_fk" required value="{{$key}}"> {{$value}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'agency_represent' FI Operate Across State<span class="text-danger">*</span> </label>
                            <div class="col-sm-4" style="padding-top: 10px">
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="agency_represent" required value="{{true}}"> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="budgeting_authority" required value="0">No
                                    </label>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'budgeting_authority' Asset Size<span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="amount_of_budgeting">
                                        <option value="">Select Option</option>
                                        @foreach($assetSizes as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'amount_of_budgeting' FI Performs<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="single-append-radio" class="form-control select2-allow-clear" name="how_ginicoe_help_you[]" required multiple ui-jp="select2" ui-options="{theme: 'bootstrap'}">
                                        <optgroup label="Select Multi Option">
                                            @foreach($FI_performses as $key =>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">'how_ginicoe_help_you' BIN<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('type')}}"  required name="user_id_fk">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">'user_id_fk' Daily Trade<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  nam=>
                                        <option value="">Select Option</option>
                                        @foreach($dailyTrades as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label"> Portfolio Size<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('zip_code')}}" placeholder="12345" required nam=>
                                </div>
                            </div>
                        </div>
                        <button  class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
