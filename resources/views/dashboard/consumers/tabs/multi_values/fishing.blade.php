@if($consumer->fishing->isEmpty())
    <form action="{{route('fishing.store')}}" method="POST" >
        @csrf
        <input type="hidden" name="main_tab" value="multi_values_form_data">
        <input type="hidden" name="sub_tab" value="fishing">
        <input type="hidden" name="data[0][fishing_id_pk]" value="0">
        <input type="hidden" name="data[0][consumer_id_fk]" value="{{$consumer->id}}">
        <table class="table table-bordered" id="dynamicAddRemove_fishing">
            <tr>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Fishing License Country<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" required  name="data[0][fishing_country_id_fk]">
                                <option value="">Select Option</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Fishing Licensing State <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('fishing_state')}}" placeholder="London" required name="data[0][fishing_state]">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Fishing License ID <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('fishing_license_id')}}" placeholder="XX-12-1234" required name="data[0][fishing_license_id]">
                        </div>
                    </div>
                </div>
                <td style="float: right;" ><button type="button" name="add" id="add_more_fishing" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@else

    @foreach($consumer->fishing as $key => $fishing)
        <form action="{{route('fishing.update',$fishing->id)}}" method="POST" >
            @csrf
            @method('put')
            <input type="hidden" name="main_tab" value="multi_values_form_data">
            <input type="hidden" name="sub_tab" value="fishing">
            <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
            <input type="hidden" name="data[{{$key}}][fishing_id_pk]" value="{{$fishing->id}}">
            <input type="hidden" name="data[{{$key}}][consumer_id_fk]" value="{{$consumer->id}}">
            <table class="table table-bordered" id="dynamicAddRemove_fishing">
                <tr>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Fishing License Country<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" required  name="data[{{$key}}][fishing_country_id_fk]">
                                    <option value="">Select Option</option>
                                    @foreach($countries as $country)
                                        <option {{ $country->id == $fishing->fishing_country_id_fk  ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Fishing Licensing State <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('fishing_state',$fishing->fishing_state)}}" placeholder="London" required name="data[{{$key}}][fishing_state]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Fishing License ID <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('fishing_license_id',$fishing->fishing_license_id)}}" placeholder="XX-12-1234" required name="data[{{$key}}][fishing_license_id]">
                            </div>
                        </div>
                    </div>
                </tr>
            </table>
            @endforeach
            <button type="button" style="float: right;" name="add" id="add_more_fishing" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        @endif

        <script type="text/javascript">
            var i = 0;
            $("#add_more_fishing").click(function(){
                ++i;
                var fieldHTML = '<tr>';
                fieldHTML+= '<td>';
                fieldHTML+= '<input type="hidden" name="data['+i+'][consumer_id_fk]" value="{{$consumer->id}}">';
                fieldHTML+= '<input type="hidden" name="data['+i+'][fishing_id_pk]" value="0">';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Fishing License Country<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<select class="form-control" required  name="data['+i+'][fishing_country_id_fk]">';
                fieldHTML+= '<option value="">Select Option';
                fieldHTML+= '</option> @foreach($countries as $country)';
                fieldHTML+= '<option value="{{$country->id}}">{{$country->name}} - {{$country->code}}';
                fieldHTML+= '</option> @endforeach';
                fieldHTML+= '</select>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Fishing Licensing State <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('fishing_state')}}" placeholder="London" required name="data['+i+'][fishing_state]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Fishing License ID <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('fishing_license_id')}}" placeholder="XX-12-1234" required name="data['+i+'][fishing_license_id]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<button style="float: right;" type="button" class="btn btn-danger remove-tr">Remove</button>';
                fieldHTML+= '</td>';
                fieldHTML+= '</tr>';
                $("#dynamicAddRemove_fishing").append(fieldHTML);
            });

            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });
        </script>
