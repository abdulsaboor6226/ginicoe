@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@push("after-styles")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/flags.css') }}" type="text/css"/>
@endpush
@section('content')
    <div class="padding p-b-0">
        <div class="margin">
            <h5 class="m-b-0 _300"><span
                    class="text-primary">{{ __('backend.bank') }}</span>
            </h5>
        </div>
        <div style="float: right; padding-bottom: 5px;{{(auth()->user()->permissions_id ==5 && count($merchants)!=0) ?'display: none;': 'display: block;'}}">
            <a class="btn btn-fw primary"  href="{{route("bank.create")}}">
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
                            <th>Business Legal Name</th>
                            <th>Business DBA Name</th>
                            <th>Federal Tax ID</th>
                            <th>DUNS No</th>
                            <th>Owner</th>
                            <th>Phone No</th>
                            <th>Country</th>
                            <th>owner %</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banks as $key => $merchant)
                            <tr class="row">
                                <td>{{$key+1}}</td>
                                <td>{{$merchant->business_legal_name}}</td>
                                <td>{{$merchant->business_DBA_name}}</td>
                                <td>{{$merchant->federal_tax_id}}</td>
                                <td>{{$merchant->DUNS_number}}</td>
                                <td>{{$merchant->first_name}} {{$merchant->middle_name}} {{$merchant->last_name}}</td>
                                <td>{{$merchant->phone_no}}</td>
                                <td>{{$merchant->country->name}}</td>
                                <td>{{$merchant->ownership_percentage}}</td>
                                <td>{{$merchant->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-sm success" href="{{route("merchant.edit",$merchant->id)}}"
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
                                            <form action="{{route('merchant.destroy',$merchant->id)}}" method="post">
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
