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
                    <form action="{{route('consumers_cards.update',$consumers_cards->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Bank</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Meezan bank limited" value="{{old('bank',$consumers_cards->bank)}}" name="bank">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Card Type</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('card_type',$consumers_cards->card_type)}}" placeholder=" Debit etc.." name="card_type">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Card Number</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('card_number',$consumers_cards->card_number)}}" placeholder="12345678912345" name="card_number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Card Holder First Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('primary_card_holder_first_name',$consumers_cards->primary_card_holder_first_name)}}" placeholder="xyz" name="primary_card_holder_first_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Card Holder Last Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="xyz" value="{{old('primary_card_holder_last_name',$consumers_cards->primary_card_holder_last_name)}}" placeholder="" name="primary_card_holder_last_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Secondary Card Holder Relationship</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('secondary_card_holder_relationship',$consumers_cards->secondary_card_holder_relationship)}}" placeholder="sister,brother end etc..." name="secondary_card_holder_relationship">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('secondary_card_holder_first_name',$consumers_cards->secondary_card_holder_first_name)}}" placeholder="xyz" name="secondary_card_holder_first_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Secondary Card Holder First Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('secondary_card_holder_last_name',$consumers_cards->secondary_card_holder_last_name)}}" placeholder="xyz" name="secondary_card_holder_last_name">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
