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
                            <li class="nav-item {{ empty($main_tab) || $main_tab == 'primary_info' ? 'active' : '' }}">
                                <a class="nav-link" href="#primary_info" data-toggle="tab" aria-expanded="false">Primary Info</a>
                            </li>
                            <li class="nav-item {{ empty($main_tab) || $main_tab == 'multi_values_form_data' ? 'active' : '' }}">
                                <a class="nav-link" href="#multi_values_form_data" data-toggle="tab" aria-expanded="false">Multi Value Data</a>
                            </li>
                            <li class="nav-item {{ empty($main_tab) || $main_tab == 'consumer_images' ? 'active' : '' }}">
                                <a class="nav-link" href="#consumer_images" data-toggle="tab" aria-expanded="false">Consumers Images</a>
                            </li>
                            <li class="nav-item {{ empty($main_tab) || $main_tab == 'consumers_cards' ? 'active' : '' }}">
                                <a class="nav-link" href="#consumers_cards" data-toggle="tab" aria-expanded="false">Consumers Cards</a>
                            </li>
                            <li class="nav-item {{ empty($main_tab) || $main_tab == 'consumers_face_details' ? 'active' : '' }}">
                                <a class="nav-link " href="#consumers_face_details" data-toggle="tab" aria-expanded="true">Consumers Face Details</a>
                            </li>
                            <li class="nav-item {{ empty($main_tab) || $main_tab == 'consumers_surgery_details' ? 'active' : '' }}">
                                <a class="nav-link" href="#consumers_surgery_details" data-toggle="tab" aria-expanded="false">Consumers Surgery Details</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content p-a m-b-md">
                        <div class="tab-pane animated fadeIn text-muted {{ empty($main_tab) || $main_tab == 'primary_info' ? 'active' : '' }}" id="primary_info" aria-expanded="true">
                            @include('dashboard.consumers.tabs.personal_info')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($main_tab) || $main_tab == 'multi_values_form_data' ? 'active' : '' }}" id="multi_values_form_data" aria-expanded="true">
                            @include('dashboard.consumers.tabs.multi_values_form_data')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($main_tab) || $main_tab == 'consumer_images' ? 'active' : '' }}" id="consumer_images" aria-expanded="true">
                            @include('dashboard.consumers.tabs.consumer_images')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($main_tab) || $main_tab == 'consumers_cards' ? 'active' : '' }}" id="consumers_cards" aria-expanded="true">
                            @include('dashboard.consumers.tabs.consumer_cards_index')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($main_tab) || $main_tab == 'consumers_face_details' ? 'active' : '' }}" id="consumers_face_details" aria-expanded="true">
                            @include('dashboard.consumers.tabs.consumer_face_details_index')
                        </div>
                        <div class="tab-pane animated fadeIn text-muted {{ empty($main_tab) || $main_tab == 'consumers_surgery_details' ? 'active' : '' }}" id="consumers_surgery_details" aria-expanded="true">
                            @include('dashboard.consumers.tabs.consumer_surgery_details_index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- .modal -->
<div id="m" class="modal" data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
            </div>
            <div class="modal-body text-center p-lg">
                <h6>{{ __('backend.confirmationDeleteMsg') }}</h6>
            </div>
            <div class="modal-footer">
                <form id="form_id" method="post">
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
<script>
    function updateStatus(route) {
        document.getElementById("form_id").action = route;
    }
</script>
