@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <div class="margin">
            <h5 class="m-b-0 _300"><span
                    class="text-primary">{{ __('backend.consumers_surgery_details') }}</span>
            </h5>
        </div>
        <div style="float: right; padding-bottom: 5px;" >
            <a class="btn btn-fw primary" href="{{route("consumers_surgery_details.create")}}">
                <i class="material-icons">&#xe02e;</i>
                &nbsp; <span>{{ __('backend.create') }}</span>
            </a>
        </div>
        <div class="tab-pane" id="tab_version">
            <div class="box-body">

                <div class="row">
                    <table class="table table-bordered dataTable no-footer dtr-inline" style="width: 100%;" id="topics_1"
                           aria-describedby="topics_1_info" role="grid">
                        <thead class="dker">

                        <tr role="row">
                            <th>#</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="topics_1" rowspan="1" colspan="1"
                                style="width: 614px;" aria-sort="descending"
                                aria-label="Title: activate to sort column ascending">Surgeon Name
                            </th>
                            <th style="width:80px;" class="sorting" tabindex="0" aria-controls="topics_1" rowspan="1"
                                colspan="1" aria-label="Visits: activate to sort column ascending">Surgeon contact
                            </th>
                            <th style="width:80px;" class="sorting" tabindex="0" aria-controls="topics_1" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending">Medical practice
                            </th>
                            <th class="text-center sorting_disabled" style="max-width: 150px; width: 150px;" rowspan="1"
                                colspan="1" aria-label="Options">Building no
                            </th>
                            <th>Street</th>
{{--                            <th>Suit</th>--}}
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Zip</th>
                            <th>Area Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($consumers_surgery_details as $key => $consumers_surgery_detail)
                            <tr class="row">
                                <td>{{$key+1}}</td>
                                <td class="sorting_1">
                                    <div class="h6">{{$consumers_surgery_detail->surgeon_salutation}}.{{$consumers_surgery_detail->surgeon_first_name}} {{$consumers_surgery_detail->surgeon_middle_name}} {{$consumers_surgery_detail->surgeon_last_name}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_surgery_detail->surgeon_contact_number}}</div>
                                </td>
                                <td class="sorting_1">
                                    <div class="h6">{{$consumers_surgery_detail->medical_practice_name}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_surgery_detail->building_number}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_surgery_detail->street}}</div>
                                </td>
{{--                                <td>--}}
{{--                                    <div class="text-center">{{$consumers_surgery_detail->suite}}</div>--}}
{{--                                </td>--}}
                                <td class="sorting_1">
                                    <div class="h6">{{$consumers_surgery_detail->country}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_surgery_detail->state}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_surgery_detail->city}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_surgery_detail->zip}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_surgery_detail->area_code}}</div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-sm success" href="{{route("consumers_surgery_details.edit", $consumers_surgery_detail->id)}}"
                                           data-toggle="tooltip" data-original-title=" Edit">
                                            <i class="material-icons"></i>
                                        </a>
                                        @if (@Auth::user()->permissionsGroup->delete_status)
                                            <button class="btn btn-sm warning" data-toggle="modal"
                                                    data-target="#m-{{ $consumers_surgery_detail->id }}" ui-toggle-class="bounce"
                                                    ui-target="#animate">
                                                <small><i class="material-icons">&#xe872;</i>
                                                </small>
                                            </button>
                                            <div id="m-{{ $consumers_surgery_detail->id }}" class="modal fade" data-backdrop="true">
                                                <div class="modal-dialog" id="animate">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                                                        </div>
                                                        <div class="modal-body text-center p-lg">
                                                            <p>
                                                                {{ __('backend.confirmationDeleteMsg') }}
                                                                <br>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('consumers_surgery_details.destroy',$consumers_surgery_detail->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn dark-white p-x-md"
                                                                        data-dismiss="modal">{{ __('backend.no') }}</button>
                                                                <button class="btn danger p-x-md">{{ __('backend.yes') }}</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
