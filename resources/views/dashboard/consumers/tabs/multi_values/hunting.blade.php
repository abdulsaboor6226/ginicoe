@if($consumer->hunting->isEmpty())
    <form action="{{route('hunting.store')}}" method="POST" >
        @csrf
        <input type="hidden" name="main_tab" value="multi_values_form_data">
        <input type="hidden" name="sub_tab" value="hunting">
        <input type="hidden" name="data[0][hunting_licence_id_pk]" value="0">
        <input type="hidden" name="data[0][consumer_id_fk]" value="{{$consumer->id}}">
        <table class="table table-bordered" id="dynamicAddRemove_hunting">
            <tr>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Hunting License Country<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" required  name="data[0][hunting_country_id_fk]">
                                <option value="">Select Option</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Hunting Licensing State <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('hunting_state')}}" placeholder="London" required name="data[0][hunting_state]">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Hunting License ID <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('hunting_license_id')}}" placeholder="XX-12-1234" required name="data[0][hunting_license_id]">
                        </div>
                    </div>
                </div>
                <td style="float: right;" ><button type="button" name="add" id="add_more_hunting" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@else
    @foreach($consumer->hunting as $key => $hunting)
        <form action="{{route('hunting.update',$hunting->id)}}" method="POST" >
            @csrf
            @method('put')
            <input type="hidden" name="main_tab" value="multi_values_form_data">
            <input type="hidden" name="sub_tab" value="hunting">
            <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
            <input type="hidden" name="data[{{$key}}][hunting_licence_id_pk]" value="{{$hunting->id}}">
            <input type="hidden" name="data[{{$key}}][consumer_id_fk]" value="{{$consumer->id}}">
            <table class="table table-bordered" id="dynamicAddRemove_hunting">
                <tr>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Hunting License Country<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" required  name="data[{{$key}}][hunting_country_id_fk]">
                                    <option value="">Select Option</option>
                                    @foreach($countries as $country)
                                        <option {{ $country->id == $hunting->hunting_country_id_fk  ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Hunting Licensing State <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('hunting_state',$hunting->hunting_state)}}" placeholder="London" required name="data[{{$key}}][hunting_state]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Hunting License ID <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('hunting_license_id',$hunting->hunting_license_id)}}" placeholder="XX-12-1234" required name="data[{{$key}}][hunting_license_id]">
                            </div>
                        </div>
                    </div>
                </tr>
                <a style="float: right;" class="btn btn-danger" onclick="updateStatus('{{route('hunting.destroy',$hunting->id)}}')" data-toggle="modal" data-target="#m">X</a>
            </table>
            @endforeach
            <button type="button" style="float: right;" name="add" id="add_more_hunting" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        @endif

        <script type="text/javascript">
            var i = 0;
            $("#add_more_hunting").click(function(){
                ++i;
                var fieldHTML = '<tr>';
                fieldHTML+= '<td>';
                fieldHTML+= '<input type="hidden" name="data['+i+'][consumer_id_fk]" value="{{$consumer->id}}">';
                fieldHTML+= '<input type="hidden" name="data['+i+'][hunting_licence_id_pk]" value="0">';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Hunting License Country<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<select class="form-control" required  name="data['+i+'][hunting_country_id_fk]">';
                fieldHTML+= '<option value="">Select Option';
                fieldHTML+= '</option> @foreach($countries as $country)';
                fieldHTML+= '<option value="{{$country->id}}">{{$country->name}} - {{$country->code}}';
                fieldHTML+= '</option> @endforeach';
                fieldHTML+= '</select>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Hunting Licensing State <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('hunting_state')}}" placeholder="London" required name="data['+i+'][hunting_state]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Hunting License ID <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('hunting_license_id')}}" placeholder="XX-12-1234" required name="data['+i+'][hunting_license_id]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<button style="float: right;" type="button" class="btn btn-danger remove-tr">X</button>';
                fieldHTML+= '</td>';
                fieldHTML+= '</tr>';
                $("#dynamicAddRemove_hunting").append(fieldHTML);
            });

            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });
        </script>
