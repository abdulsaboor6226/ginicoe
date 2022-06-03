<div class="tab-pane  {{ $tab_8 }}" id="tab_version">
    <div class="box-body">

        <div class="row">
            <table class="table table-bordered dataTable no-footer dtr-inline" style="width: 100%;" id="topics_1"
                   aria-describedby="topics_1_info" role="grid">
                <thead class="dker">

                <tr role="row">
                    <th>#</th>
                    <th class="sorting_desc" tabindex="0" aria-controls="topics_1" rowspan="1" colspan="1"
                        style="width: 614px;" aria-sort="descending"
                        aria-label="Title: activate to sort column ascending">Title
                    </th>
                    <th style="width:80px;" class="sorting" tabindex="0" aria-controls="topics_1" rowspan="1"
                        colspan="1" aria-label="Visits: activate to sort column ascending">Version
                    </th>
                    <th style="width:80px;" class="sorting" tabindex="0" aria-controls="topics_1" rowspan="1"
                        colspan="1" aria-label="Status: activate to sort column ascending">Status
                    </th>
                    <th class="text-center sorting_disabled" style="max-width: 150px; width: 150px;" rowspan="1"
                        colspan="1" aria-label="Options">Options
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($topics as $key => $topic)
                        <tr class="row">
                            <td>{{$key+1}}</td>
                            <td class="sorting_1">
                                <div class="h6">{{$topic->title_en}}</div>
                            </td>
                            <td>
                                <div class="text-center">{{$topic->version}}</div>
                            </td>
                            <td>
                                <div class="text-center"><i class="fa fa-check {{$topic->status == true ? "fa-check text-success" : "fa-times text-danger"}}  inline"></i></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <a class="btn btn-sm info"
                                                            href="{{route('FrontendTopic', ["section" => $Topics->webmasterSection->id, "id" => $topic->id])}}"
                                                            data-toggle="tooltip" data-original-title=" Preview"
                                                            target="_blank">
                                        <i class="material-icons"></i>
                                    </a>
                                    <a class="btn btn-sm success" href="{{route("topicsEdit", ["webmasterId" => @$Topics->webmasterSection->id, "id" => $topic->id])}}"
                                            data-toggle="tooltip" data-original-title=" Edit">
                                        <i class="material-icons"></i>
                                    </a>
                                    @if (@Auth::user()->permissionsGroup->delete_status)
                                        <button type="button" class="btn btn-sm warning" onclick="DeleteTopic('{{$topic->id}}')"
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
