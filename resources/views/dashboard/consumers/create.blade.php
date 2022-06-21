@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <div class="padding">
            <div class="box">
                <div class="box-body">
                    <form action="{{route('consumers.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Salutation</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mr., Mrs." value="{{old('salutation')}}" name="salutation">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">First Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('first_name')}}" placeholder="xyz.." name="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Middle Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('middle_name')}}" placeholder="xyz..." name="middle_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Last_ Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('last_name')}}" placeholder="xyz" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Birthday</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="xyz" value="{{old('birthday')}}"  name="birthday">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Primary Email</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('primary_email')}}" placeholder="xyz@example.com" name="primary_email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Primary Phone</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="number" class="form-control" value="{{old('primary_phone')}}" placeholder="123456789" name="primary_phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Address 1</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" value="{{old('current_us_address_1')}}" name="current_us_address_1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Address 2</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('current_us_address_2')}}" placeholder="Address" name="current_us_address_2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Current Us Urbanization Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('current_us_urbanization_name')}}" placeholder="xyz.." name="current_us_urbanization_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Current Us City</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('current_us_city')}}" placeholder="London" name="current_us_city">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Current Us State</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('current_us_state')}}"  name="current_us_state">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Current Us Zip</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('current_us_zip')}}" placeholder="12345" name="current_us_zip">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Current Us Area Code</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('current_us_area_code')}}" placeholder="12345" name="current_us_area_code">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Current Us Lived For More Than Two Years</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('current_us_lived_for_more_than_two_years')}}" placeholder="" name="current_us_lived_for_more_than_two_years">
                                </div>
                            </div>
                        </div>
                        <button  class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
