@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <div class="margin">
            <h5 class="m-b-0 _300"><span
                    class="text-primary">{{ __('backend.consumers_cards') }}</span>
            </h5>
        </div>
        <div style="float: right; padding-bottom: 5px;" >
            <a class="btn btn-fw primary" href="{{route("consumers_cards.create")}}">
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
                                aria-label="Title: activate to sort column ascending">Name
                            </th>
                            <th style="width:80px;" class="sorting" tabindex="0" aria-controls="topics_1" rowspan="1"
                                colspan="1" aria-label="Visits: activate to sort column ascending">Bank
                            </th>
                            <th style="width:80px;" class="sorting" tabindex="0" aria-controls="topics_1" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending">Card type
                            </th>
                            <th class="text-center sorting_disabled" style="max-width: 150px; width: 150px;" rowspan="1"
                                colspan="1" aria-label="Options">Card Number
                            </th>
                            <th class="text-center sorting_disabled" style="max-width: 150px; width: 150px;" rowspan="1"
                                colspan="1" aria-label="Options">Relationship
                            </th>
                            <th class="text-center sorting_disabled" style="max-width: 150px; width: 150px;" rowspan="1"
                                colspan="1" aria-label="Options">Relationship name
                            </th>
                            <th class="text-center sorting_disabled" style="max-width: 150px; width: 150px;" rowspan="1"
                                colspan="1" aria-label="Options">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($consumers_cards as $key => $consumers_card)
                            <tr class="row">
                                <td>{{$key+1}}</td>
                                <td class="sorting_1">
                                    <div class="h6">{{$consumers_card->primary_card_holder_first_name}} {{$consumers_card->primary_card_holder_last_name}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_card->bank}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_card->card_type}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_card->card_number}}</div>
                                </td>
                                    <td>
                                    <div class="text-center">{{$consumers_card->secondary_card_holder_relationship}}</div>
                                </td>
                                <td>
                                    <div class="text-center">{{$consumers_card->secondary_card_holder_first_name}} {{$consumers_card->secondary_card_holder_last_name}}</div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-sm success" href="{{route("consumers_cards.edit",$consumers_card->id)}}"
                                           data-toggle="tooltip" data-original-title=" Edit">
                                            <i class="material-icons"></i>
                                        </a>
                                        @if (@Auth::user()->permissionsGroup->delete_status)
                                            <button type="button" class="btn btn-sm warning" onclick="DeleteTopic('{{$consumers_card->id}}')"
                                                    data-toggle="tooltip" data-original-title=" Delete">
                                                <i class="material-icons"></i>
                                            </button>
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
