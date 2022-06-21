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
                    <div class="b-b b-primary nav-active-primary">
                        <ul class="nav nav-tabs">
                            <li class="nav-item {{ empty($tabName) || $tabName == 'primary_info' ? 'active' : '' }}">
                                <a class="nav-link" href="#primary_info" data-toggle="tab" aria-expanded="false">Primary Info</a>
                            </li>
                            <li class="nav-item {{ empty($tabName) || $tabName == 'secondary_info' ? 'active' : '' }}">
                                <a class="nav-link " href="#secondary_info" data-toggle="tab" aria-expanded="true">Secondary Info</a>
                            </li>
                            <li class="nav-item {{ empty($tabName) || $tabName == 'additional_info' ? 'active' : '' }}">
                                <a class="nav-link" href="#additional_info" data-toggle="tab" aria-expanded="false">Additional Info</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content p-a m-b-md">
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'primary_info' ? 'active' : '' }}" id="primary_info" aria-expanded="false">
                            @include('dashboard.consumers.tabs.primary_info')
                        </div>

                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'secondary_info' ? 'active' : '' }}" id="secondary_info" aria-expanded="true">
                            @include('dashboard.consumers.tabs.secondary_info')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'additional_info' ? 'active' : '' }}" id="additional_info" aria-expanded="false">
                            @include('dashboard.consumers.tabs.additional_info')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
