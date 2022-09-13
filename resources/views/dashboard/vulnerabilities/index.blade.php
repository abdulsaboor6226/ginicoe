@extends('dashboard.layouts.master')
@section('title', __('backend.usersPermissions'))
@section('content')
    <div class="padding">
        <div class="box">
            <div class="container mt-5 text-center p-t-3 p-b-3">
                <form action="{{ route('vulnerabilities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Import File <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="file" class="form-control dropify" accept=".csv" value="{{old('file')}}" placeholder="xyz.." required name="file">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
