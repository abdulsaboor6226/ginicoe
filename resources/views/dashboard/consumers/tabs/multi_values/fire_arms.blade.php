@if($consumer->fire_arms->isEmpty())
    <form action="{{route('fire_arms.store')}}" method="POST" >
        @csrf
        <input type="hidden" name="main_tab" value="multi_values_form_data">
        <input type="hidden" name="sub_tab" value="fire_arms">
        <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
        <input type="hidden" name="data[0][fire_arms_id_pk]" value="0">
        <input type="hidden" name="data[0][consumer_id_fk]" value="{{$consumer->id}}">
        <table class="table table-bordered" id="dynamicAddRemove_fire_arms">
            <tr>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Fire Arms License Country<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" required  name="data[0][fire_arm_country_id_fk]">
                                <option value="">Select Option</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Fire Arms Licensing State <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('fire_arm_state')}}" placeholder="London" required name="data[0][fire_arm_state]">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Fire Arms License ID <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('fire_arm_id')}}" placeholder="XX-12-1234" required name="data[0][fire_arm_id]">
                        </div>
                    </div>
                </div>
                <td style="float: right;" ><button type="button" name="add" id="add_more_fire_arms" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@else
    @foreach($consumer->fire_arms as $key => $fire_arms)
        <form action="{{route('fire_arms.update',$fire_arms->id)}}" method="POST" >
            @csrf
            @method('put')
            <input type="hidden" name="main_tab" value="multi_values_form_data">
            <input type="hidden" name="sub_tab" value="driving_licence">
            <input type="hidden" name="data[{{$key}}][fire_arms_id_pk]" value="{{$fire_arms->id}}">
            <input type="hidden" name="data[{{$key}}][consumer_id_fk]" value="{{$consumer->id}}">
            <table class="table table-bordered" id="dynamicAddRemove_fire_arms">
                <tr>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Fire Arms License Country<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" required  name="data[{{$key}}][fire_arm_country_id_fk]">
                                    <option value="">Select Option</option>
                                    @foreach($countries as $country)
                                        <option {{ $country->id == $fire_arms->fire_arm_country_id_fk  ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Fire Arms Licensing State <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('fire_arm_state',$fire_arms->fire_arm_state)}}" placeholder="London" required name="data[{{$key}}][fire_arm_state]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Fire Arms License ID <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('fire_arm_id',$fire_arms->fire_arm_id)}}" placeholder="XX-12-1234" required name="data[{{$key}}][fire_arm_id]">
                            </div>
                        </div>
                    </div>
                </tr>
            </table>
            @endforeach
            <button type="button" style="float: right;" name="add" id="add_more_fire_arms" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        @endif

        <script type="text/javascript">
            var i = 0;
            $("#add_more_fire_arms").click(function(){
                ++i;
                var fieldHTML = '<tr>';
                fieldHTML+= '<td>';
                fieldHTML+= '<input type="hidden" name="data['+i+'][consumer_id_fk]" value="{{$consumer->id}}">';
                fieldHTML+= '<input type="hidden" name="data['+i+'][fire_arms_id_pk]" value="0">';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Fire Arms License Country<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<select class="form-control" required  name="data['+i+'][fire_arm_country_id_fk]">';
                fieldHTML+= '<option value="">Select Option';
                fieldHTML+= '</option> @foreach($countries as $country)';
                fieldHTML+= '<option {{ $country->id ==  $consumer->fire_arm_country_id_fk ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}';
                fieldHTML+= '</option> @endforeach';
                fieldHTML+= '</select>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Fire Arms Licensing State <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('fire_arm_state',$consumer->fire_arm_state)}}" placeholder="London" required name="data['+i+'][fire_arm_state]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Fire Arms License ID <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('fire_arm_id',$consumer->driving_license_id)}}" placeholder="XX-12-1234" required name="data['+i+'][fire_arm_id]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<button style="float: right;" type="button" class="btn btn-danger remove-tr">Remove</button>';
                fieldHTML+= '</td>';
                fieldHTML+= '</tr>';
                $("#dynamicAddRemove_fire_arms").append(fieldHTML);
            });
            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });
        </script>
