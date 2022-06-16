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
                    <form action="{{route('discounts.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">User</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" value="{{old('user_id')}}" name="user_id" id="exampleFormControlSelect1">
                                        <option value="">Select Option</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{ucfirst($user->name)}} <b>{{$user->email}}</b></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Type</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="extra" value="{{old('type')}}" name="type">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Category</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="blankets" value="{{old('category')}}" name="category">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Discount</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="1" value="{{old('discount')}}" name="discount">
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
