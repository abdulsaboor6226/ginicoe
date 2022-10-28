@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <h3 class="text-primary">Create Bank Detail</h3>
        <div class="padding">
            <div class="box">
                <div class="box-body">
                    <form action="{{route('bank.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FI Title <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_legal_name')}}" placeholder="xyz.." required name="business_legal_name">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">First Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_DBA_name')}}" placeholder="xyz.." required name="business_DBA_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Middle Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_structure')}}" placeholder="xyz..." name="business_structure">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Last Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_legal_address')}}" placeholder="xyz" required name="business_legal_address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Phone <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="xyz" value="{{old('business_city')}}"  required name="business_city">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Email<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{old('business_state')}}" placeholder="xyz@example.com" required name="business_state">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Job title<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="business_country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($jobTitles as $key =>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Secondary First Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{old('business_state')}}" placeholder="xyz@example.com" required name="business_state">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Secondary Last Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" value="{{old('federal_tax_id')}}" required name="federal_tax_id">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Secondary Phone</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Address" value="{{old('DUNS_number')}}"  name="DUNS_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Secondary Fax No</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" value="{{old('ownership')}}" placeholder="London" name="ownership">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Secondary Email</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="xyz" value="{{old('first_name')}}" name="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FI Represent</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($FI_represents as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">FI Type<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($FI_charterTypes as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FI_operate_across_state<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" value="{{old('phone_no')}}"  name="phone_no">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Asset Size</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($assetSizes as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FI Performs<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($FI_performses as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">BIN<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('home_address')}}"  required name="home_address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Daily Trade<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('city')}}" placeholder="12345" required name="city">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Portfolio Size<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('state')}}" placeholder="12345" required name="state">
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
