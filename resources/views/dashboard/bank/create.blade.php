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
                                    <input type="text" class="form-control" value="{{old('financial_institution_title')}}" placeholder="xyz.." required name="financial_institution_title">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">First Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('f_name')}}" placeholder="xyz.." required name="f_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Middle Name </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('m_name')}}" placeholder="xyz..." name="m_name">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Last Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('l_name')}}" placeholder="xyz" required name="l_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Phone <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="xyz" value="{{old('phone_no')}}"  required name="phone_no">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Email<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{old('email')}}" placeholder="xyz@example.com" required name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Job title<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="job_title">
                                        <option value="">Select Option</option>
                                        @foreach($jobTitles as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Secondary First Name</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{old('secondary_f_name')}}" placeholder="xyz@example.com" name="secondary_f_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Secondary Last Name</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" value="{{old('secondary_l_name')}}" name="secondary_l_name">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Secondary Phone</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Address" value="{{old('secondary_phone_no')}}"  name="secondary_phone_no">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Secondary Fax No</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" value="{{old('secondary_fax_no')}}" placeholder="London" name="secondary_fax_no">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Secondary Email</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="xyz" value="{{old('secondary_email')}}" name="secondary_email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FI Represent<span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="single-append-radio" class="form-control select2-allow-clear" required multiple ui-jp="select2" name="financial_institution_represent[]" ui-options="{theme: 'bootstrap'}">
                                        <optgroup label="Select Multi Option">
                                            @foreach($FI_represents as $key =>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">FI Type<span class="text-danger">*</span> </label>
                            <div class="col-sm-4" style="padding-top: 10px">
                                <div class="form-group">
                                    @foreach($FI_charterTypes as $key=> $value)
                                        <label class="radio-inline">
                                            <input type="radio" name="FI_type" required value="{{$key}}"> {{$value}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FI Operate Across State<span class="text-danger">*</span> </label>
                            <div class="col-sm-4" style="padding-top: 10px">
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="FI_operate_across_state" required value="{{true}}"> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="FI_operate_across_state" required value="0">No
                                    </label>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Asset Size<span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="asset_size">
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
                                    <select id="single-append-radio" class="form-control select2-allow-clear" name="FI_performs[]" required multiple ui-jp="select2" ui-options="{theme: 'bootstrap'}">
                                        <optgroup label="Select Multi Option">
                                            @foreach($FI_performses as $key =>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">BIN<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('BIN')}}"  required name="BIN">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Daily Trade<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="daily_trade">
                                        <option value="">Select Option</option>
                                        @foreach($dailyTrades as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Portfolio Size<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('portfolio_size')}}" placeholder="12345" required name="portfolio_size">
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
