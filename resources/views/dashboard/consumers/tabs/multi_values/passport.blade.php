@if($consumer->passport->isEmpty())
    <form action="{{route('passport.store')}}" method="POST" >
        @csrf
        <input type="hidden" name="main_tab" value="multi_values_form_data">
        <input type="hidden" name="sub_tab" value="passport">
        <input type="hidden" name="data[0][passport_id_pk]" value="0">
        <input type="hidden" name="data[0][consumer_id_fk]" value="{{$consumer->id}}">
        <table class="table table-bordered" id="dynamicAddRemove_passport">
            <tr>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Passport License Country<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" required  name="data[0][passport_country_id_fk]">
                                <option value="">Select Option</option>
                                @foreach($countries as $country)
                                    <option {{ $country->id ==  $consumer->passport_country_id_fk ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Passport Number <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('passport_number')}}" placeholder="London" required name="data[0][passport_number]">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Passport Issuance Date<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="date" class="form-control" value="{{old('passport_issuance_date')}}" placeholder="XX-12-1234" required name="data[0][passport_issuance_date]">
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Passport Expiration Date<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="date" class="form-control" value="{{old('passport_expiration_date')}}" placeholder="XX-12-1234" required name="data[0][passport_expiration_date]">
                        </div>
                    </div>
                </div>
                <td style="float: right;" ><button type="button" name="add" id="add_more_passport" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@else
    @foreach($consumer->passport as $key => $passport)
        <form action="{{route('passport.update',$passport->id)}}" method="POST" >
            @csrf
            @method('put')
            <input type="hidden" name="main_tab" value="multi_values_form_data">
            <input type="hidden" name="sub_tab" value="passport">
            <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
            <input type="hidden" name="data[{{$key}}][passport_id_pk]" value="{{$passport->id}}">
            <input type="hidden" name="data[{{$key}}][consumer_id_fk]" value="{{$consumer->id}}">
            <table class="table table-bordered" id="dynamicAddRemove_passport">
                <tr>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Passport License Country<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" required  name="data[{{$key}}][passport_country_id_fk]">
                                    <option value="">Select Option</option>
                                    @foreach($countries as $country)
                                        <option {{ $country->id == $passport->passport_country_id_fk  ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Passport Number <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('passport_number',$passport->passport_number)}}" placeholder="London" required name="data[{{$key}}][passport_number]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Passport Issuance Date<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="date" class="form-control" value="{{old('passport_issuance_date',$passport->passport_issuance_date)}}" placeholder="XX-12-1234" required name="data[{{$key}}][passport_issuance_date]">
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Passport Expiration Date<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="date" class="form-control" value="{{old('passport_expiration_date',$passport->passport_expiration_date)}}" placeholder="XX-12-1234" required name="data[0][passport_expiration_date]">
                            </div>
                        </div>
                    </div>
                </tr>
                <a style="float: right;" class="btn btn-danger" onclick="updateStatus('{{route('passport.destroy',$passport->id)}}')" data-toggle="modal" data-target="#m">X</a>
            </table>
            @endforeach
            <button type="button" style="float: right;" name="add" id="add_more_passport" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        @endif

        <script type="text/javascript">
            var i = 0;
            $("#add_more_passport").click(function(){
                ++i;
                var fieldHTML = '<tr>';
                fieldHTML+= '<td>';
                fieldHTML+= '<input type="hidden" name="data['+i+'][consumer_id_fk]" value="{{$consumer->id}}">';
                fieldHTML+= '<input type="hidden" name="data['+i+'][passport_id_pk]" value="0">';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Passport License Country<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<select class="form-control" required  name="data['+i+'][passport_country_id_fk]">';
                fieldHTML+= '<option value="">Select Option';
                fieldHTML+= '</option> @foreach($countries as $country)';
                fieldHTML+= '<option {{ $country->id ==  $consumer->passport_country_id_fk ? 'selected' : ""}} value="{{$country->id}}">{{$country->name}} - {{$country->code}}';
                fieldHTML+= '</option> @endforeach';
                fieldHTML+= '</select>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Passport Number <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('passport_number')}}" placeholder="London" required name="data['+i+'][passport_number]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Passport Issuance Date<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="date" class="form-control" value="{{old('passport_issuance_date')}}" placeholder="XX-12-1234" required name="data['+i+'][passport_issuance_date]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Passport Expiration Date<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="date" class="form-control" value="{{old('passport_expiration_date')}}" placeholder="XX-12-1234" required name="data['+i+'][passport_expiration_date]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<button style="float: right;" type="button" class="btn btn-danger remove-tr">X</button>';
                fieldHTML+= '</td>';
                fieldHTML+= '</tr>';
                $("#dynamicAddRemove_passport").append(fieldHTML);
            });
            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });
        </script>
