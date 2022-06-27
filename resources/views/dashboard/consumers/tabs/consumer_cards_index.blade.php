
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
                                            <button class="btn btn-sm warning" data-toggle="modal"
                                                    data-target="#m-{{ $consumers_card->id }}" ui-toggle-class="bounce"
                                                    ui-target="#animate">
                                                <small><i class="material-icons">&#xe872;</i>
                                                </small>
                                            </button>
                                            <div id="m-{{ $consumers_card->id }}" class="modal fade" data-backdrop="true">
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
                                                            <form action="{{route('consumers_cards.destroy',$consumers_card->id)}}" method="post">
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
