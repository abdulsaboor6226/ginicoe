@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <div class="margin">
            <h5 class="m-b-0 _300"><span
                    class="text-primary">{{ __('backend.consumer') }}</span>
            </h5>
        </div>
        @if(auth()->user()->permissions_id !=3 && count($consumers)>1)
        <div style="float: right; padding-bottom: 5px;" >
            <a class="btn btn-fw primary" href="{{route("consumers.create")}}">
                <i class="material-icons">&#xe02e;</i>
                &nbsp; <span>{{ __('backend.create') }}</span>
            </a>
        </div>
        @endif
        <div class="tab-pane" id="tab_version">
            <div class="box-body">

                <div class="row">
                    <table class="table table-bordered dataTable no-footer dtr-inline" style="width: 100%;" id="topics_1"
                           aria-describedby="topics_1_info" role="grid">
                        <thead class="dker">

                        <tr role="row">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($consumers as $key => $consumer)
                            <tr class="row">
                                <td>{{$key+1}}</td>
                                <td>
                                    <small>{{$consumer->salutation}} {{$consumer->first_name}} {{$consumer->middle_name}} {{$consumer->last_name}}</small>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumer->primary_email}}</div>
                                </td>
                                <td>{{$consumer->primary_phone}}</td>
                                <td>{{$consumer->current_us_city}}</td>
                                <td>{{$consumer->current_us_state}}</td>
                                <td>{{$consumer->current_us_zip}}</td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-sm success" href="{{route("consumers.edit",$consumer->id)}}"
                                           data-toggle="tooltip" data-original-title=" Edit">
                                            <i class="material-icons"></i>
                                        </a>
                                        @if (@Auth::user()->permissionsGroup->delete_status)
                                            <button class="btn btn-sm warning" data-toggle="modal" data-target="#consumer-delete"><i class="material-icons"></i></button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <div id="consumer-delete" class="modal" data-backdrop="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <h6>{{ __('backend.confirmationDeleteMsg') }}</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('consumers.destroy',$consumer->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">{{ __('backend.no') }}</button>
                                                <button class="btn danger p-x-md">{{ __('backend.yes') }}</button>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
