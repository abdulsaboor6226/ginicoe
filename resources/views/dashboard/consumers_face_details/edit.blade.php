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
                    <form action="{{route('consumers_face_details.update',$consumers_face_details->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Type</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Face mask" value="{{old('type',$consumers_face_details->type)}}" name="type">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Location</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('location',$consumers_face_details->location)}}" placeholder="On Nose " name="location">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Size</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('size',$consumers_face_details->size)}}" placeholder="inches" name="size">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Shapes</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('shape',$consumers_face_details->shape)}}" placeholder="Circle" name="shape">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Color</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Gray" value="{{old('color',$consumers_face_details->color)}}" name="color">
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
