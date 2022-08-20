@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <h3 class="text-primary">Create Merchant</h3>
        <div class="padding">
            <div class="box">
                <div class="box-body">
                    <form action="{{route('merchant.update',$merchant->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Business Legal Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_legal_name',$merchant->business_legal_name)}}" placeholder="xyz.." required name="business_legal_name">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Business DBA Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_DBA_name',$merchant->business_DBA_name)}}" placeholder="xyz.." required name="business_DBA_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Business Structure <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_structure',$merchant->business_structure)}}" placeholder="xyz..." name="business_structure">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Business Legal Address<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_legal_address',$merchant->business_legal_address)}}" placeholder="xyz" required name="business_legal_address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Business City <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('business_city',$merchant->business_city)}}"  required name="business_city">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Business State<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('business_state',$merchant->business_state)}}" placeholder="xyz@example.com" required name="business_state">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Business Zip<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" value="{{old('business_zip',$merchant->business_zip)}}" placeholder="123456789" required name="business_zip">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Business Country<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="business_country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($countries as $country)
                                            <option {{ $merchant->business_country_id_fk ==  $country->id ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Federal Tax ID<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" value="{{old('federal_tax_id',$merchant->federal_tax_id)}}" required name="federal_tax_id">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">DUNS Number<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" value="{{old('DUNS_number',$merchant->DUNS_number)}}" required name="DUNS_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Ownership<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('ownership',$merchant->ownership)}}" placeholder="London" required name="ownership">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">First Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('first_name',$merchant->first_name)}}"  required name="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Middle Name</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('middle_name',$merchant->middle_name)}}" placeholder="12345" required name="middle_name">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Last Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('last_name',$merchant->last_name)}}" placeholder="12345" required name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Phone No<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="tel" class="form-control" value="{{old('phone_no',$merchant->phone_no)}}"  name="phone_no">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Telephone Number</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" value="{{old('telephone_number',$merchant->telephone_number)}}" name="telephone_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">DOB<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" value="{{old('DOB',$merchant->DOB)}}" placeholder="London" required name="DOB">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Home Address<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('home_address',$merchant->home_address)}}"  required name="home_address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">City<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('city',$merchant->city)}}" placeholder="12345" required name="city">
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">State<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('state',$merchant->state)}}" placeholder="12345" required name="state">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Country<span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" required  name="country_id_fk">
                                        <option value="">Select Option</option>
                                        @foreach($countries as $country)
                                            <option {{ $merchant->country_id_fk ==  $country->id ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-control-label">Ownership Percentage</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" value="{{old('ownership_percentage',$merchant->ownership_percentage)}}" name="ownership_percentage">
                                </div>
                            </div>
                        </div>

                        <button  class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
