@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <h3 class="text-primary">Update Consumer</h3>
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
                            <li class="nav-item {{ empty($tabName) || $tabName == 'consumers_cards' ? 'active' : '' }}">
                                <a class="nav-link" href="#consumers_cards" data-toggle="tab" aria-expanded="false">Consumers Cards</a>
                            </li>
                            <li class="nav-item {{ empty($tabName) || $tabName == 'consumers_face_details' ? 'active' : '' }}">
                                <a class="nav-link " href="#consumers_face_details" data-toggle="tab" aria-expanded="true">Consumers Face Details</a>
                            </li>
                            <li class="nav-item {{ empty($tabName) || $tabName == 'consumers_surgery_details' ? 'active' : '' }}">
                                <a class="nav-link" href="#consumers_surgery_details" data-toggle="tab" aria-expanded="false">Consumers Surgery Details</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content p-a m-b-md">
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'primary_info' ? 'active' : '' }}" id="primary_info" aria-expanded="true">
                            @include('dashboard.consumers.tabs.primary_info')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'secondary_info' ? 'active' : '' }}" id="secondary_info" aria-expanded="true">
                            @include('dashboard.consumers.tabs.secondary_info')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'additional_info' ? 'active' : '' }}" id="additional_info" aria-expanded="true">
                            @include('dashboard.consumers.tabs.additional_info')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'consumers_cards' ? 'active' : '' }}" id="consumers_cards" aria-expanded="true">
                            @include('dashboard.consumers.tabs.consumer_cards_index')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'consumers_face_details' ? 'active' : '' }}" id="consumers_face_details" aria-expanded="true">
                            @include('dashboard.consumers.tabs.consumer_face_details_index')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($tabName) || $tabName == 'consumers_surgery_details' ? 'active' : '' }}" id="consumers_surgery_details" aria-expanded="true">
                            @include('dashboard.consumers.tabs.consumer_surgery_details_index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
