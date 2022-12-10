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
                            <label class="col-sm-2 form-control-label">First Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('f_name')}}" placeholder="xyz.." required name="f_name">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Last Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('l_name')}}" placeholder="xyz.." required name="l_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label"> Phone No</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="phone" class="form-control" value="{{old('phone_no')}}" placeholder="xyz..." name="phone_no">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Secondary Phone No<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="phone" class="form-control" value="{{old('s_phone_no')}}" placeholder="xyz" required name="s_phone_no">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Title<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="title">
                                        <option value="">Select Option</option>
                                        @foreach($titles as $key=> $value)
                                            <option value="{{$key}}">{{ucfirst($value)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Building Number<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('building_number')}}" placeholder="xyz@example.com" required name="building_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Street Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="{{old('street_name')}}" placeholder="A/W " required name="street_name">
                            </div>
                            <label class="col-sm-2 form-control-label">Urbanization Number</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('urbanization_number')}}" placeholder="xyz@example.com" name="urbanization_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Country</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="govt_country" class="form-control" required  name="country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}} - {{$country->iso3}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">State</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="govt_state" name="state_id_fk" class="form-control"></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">City</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="govt_city" name="city_id_fk" class="form-control"></select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Agency Type</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="checkbox">
                                        @foreach($agencyType as $key => $value)
                                            <label class="ui-check p-r-1">
                                                <input type="checkbox" name="agency_type[]" value="{{$key}}">
                                                <i class="dark-white"></i>
                                                {{$value}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label"> Zip Code<span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('zip_code')}}" name="zip_code">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Agency Sector<span class="text-danger">*</span> </label>
                            <div class="col-sm-4" style="padding-top: 10px">
                                <div class="form-group">
                                    <select class="form-control" required  name="agency_sector_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($govtAgencySector as $key=> $value)
                                            <option required value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Agency Represent<span class="text-danger">*</span> </label>
                            <div class="col-sm-4" style="padding-top: 10px">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('agency_represent')}}" name="agency_represent">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Budgeting Authority<span class="text-danger">*</span></label>
                            <div class="col-sm-4" style="padding-top: 10px">
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="budgeting_authority" required value="{{true}}"> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="budgeting_authority" required value="0">No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Amount Of Budgeting<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="amount_of_budgeting">
                                        <option value="">Select Option</option>
                                        @foreach($govtBudgetAmount as $key=> $value)
                                            <option required value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label"> How Ginicoe Help You<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <textarea id="textarea" rows="3" cols="37" name="how_ginicoe_help_you" maxlength="1000" ></textarea>
                                    <div id="textarea_feedback"></div>
                                </div>
                            </div>
                        </div>
                        <button  class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.govt.js')
@endsection
