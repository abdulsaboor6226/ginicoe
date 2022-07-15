@if($consumer->twins->isEmpty())
    <form action="{{route('twins.store')}}" method="POST" >
        @csrf
        <input type="hidden" name="main_tab" value="multi_values_form_data">
        <input type="hidden" name="sub_tab" value="twins">
        <input type="hidden" name="data[0][twins_detail_id_pk]" value="0">
        <input type="hidden" name="data[0][consumer_id_fk]" value="{{$consumer->id}}">
        <table class="table table-bordered" id="dynamicAddRemove_twins">
            <tr>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Twin salutation<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" required name="data[0][living_twin_salutation]">
                                <option value="">Select Option</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                            </select>
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Twins First Name <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('living_twin_first_name')}}" placeholder="London" required name="data[0][living_twin_first_name]">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Twin Middle Name</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('living_twin_middle_name')}}" placeholder="XX-12-1234" name="data[0][living_twin_middle_name]">
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Twin Last Name<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('living_twin_last_name')}}" placeholder="XX-12-1234" required name="data[0][living_twin_last_name]">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Twin Classification<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('twin_classification')}}" placeholder="XX-12-1234" required name="data[0][twin_classification]">
                        </div>
                    </div>
                    <label class="col-sm-2 form-control-label">Difference With The Twin<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('difference_with_the_twin')}}" placeholder="XX-12-1234" required name="data[0][difference_with_the_twin]">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Twin Gender<span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{old('twin_gender')}}" placeholder="XX-12-1234" required name="data[0][twin_gender]">
                        </div>
                    </div>
                </div>
                <td style="float: right;" ><button type="button" name="add" id="add_more_twins" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@else
    @foreach($consumer->twins as $key => $twins)
        <form action="{{route('twins.update',$twins->id)}}" method="POST" >
            @csrf
            @method('put')
            <input type="hidden" name="main_tab" value="multi_values_form_data">
            <input type="hidden" name="sub_tab" value="driving_licence">
            <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
            <input type="hidden" name="data[{{$key}}][twins_detail_id_pk]" value="{{$twins->id}}">
            <input type="hidden" name="data[{{$key}}][consumer_id_fk]" value="{{$consumer->id}}">
            <table class="table table-bordered" id="dynamicAddRemove_twins">
                <tr>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Twin salutation<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" required name="data[{{$key}}][living_twin_salutation]">
                                    <option value="">Select Option</option>
                                    <option {{ $twins->living_twin_salutation ==  'Mr' ? 'selected' : ""}} value="Mr">Mr</option>
                                    <option {{ $twins->living_twin_salutation ==  'Mrs' ? 'selected' : ""}} value="Mrs">Mrs</option>
                                    <option {{ $twins->living_twin_salutation ==  'Jr' ? 'selected' : ""}} value="Jr">Jr</option>
                                    <option {{ $twins->living_twin_salutation ==  'Sr' ? 'selected' : ""}} value="Sr">Sr</option>
                                </select>
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Twins First Name <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('living_twin_first_name',$twins->living_twin_first_name)}}" placeholder="London" required name="data[0][living_twin_first_name]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Twin Middle Name</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('living_twin_middle_name',$twins->living_twin_middle_name)}}" placeholder="XX-12-1234" name="data[0][living_twin_middle_name]">
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Twin Last Name<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('living_twin_last_name',$twins->living_twin_last_name)}}" placeholder="XX-12-1234" required name="data[0][living_twin_last_name]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Twin Classification<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('twin_classification',$twins->twin_classification)}}" placeholder="XX-12-1234" required name="data[0][twin_classification]">
                            </div>
                        </div>
                        <label class="col-sm-2 form-control-label">Difference With The Twin<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('difference_with_the_twin',$twins->difference_with_the_twin)}}" placeholder="XX-12-1234" required name="data[0][difference_with_the_twin]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Twin Gender<span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{old('twin_gender',$twins->twin_gender)}}" placeholder="XX-12-1234" required name="data[0][twin_gender]">
                            </div>
                        </div>
                    </div>
                </tr>
            </table>
            @endforeach
            <button type="button" style="float: right;" name="add" id="add_more_twins" class="btn btn-success"><span class="fa fa-plus-square-o"> </span> Add More</button>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        @endif

        <script type="text/javascript">
            var i = 0;
            $("#add_more_twins").click(function(){
                ++i;
                var fieldHTML = '<tr>';
                fieldHTML+= '<td>';
                fieldHTML+= '<input type="hidden" name="data['+i+'][consumer_id_fk]" value="{{$consumer->id}}">';
                fieldHTML+= '<input type="hidden" name="data['+i+'][twins_detail_id_pk]" value="0">';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Twin salutation<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<select class="form-control" required  name="data['+i+'][living_twin_salutation]">';
                fieldHTML+= '<option value="">Select Option';
                fieldHTML+= '</option>';
                fieldHTML+= '<option value="Mr">Mr';
                fieldHTML+= '</option>';
                fieldHTML+= '<option value="Mrs">Mrs';
                fieldHTML+= '</option>';
                fieldHTML+= '<option value="Jr">Jr';
                fieldHTML+= '</option>';
                fieldHTML+= '<option value="Sr">Sr';
                fieldHTML+= '</option>';
                fieldHTML+= '</select>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Twin First Name <span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('living_twin_first_name')}}" placeholder="London" required name="data['+i+'][living_twin_first_name]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Twin Middle Name';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('living_twin_middle_name')}}" placeholder="XX-12-1234" required name="data['+i+'][living_twin_middle_name]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Twin Last Name<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('living_twin_last_name')}}" placeholder="XX-12-1234" required name="data['+i+'][living_twin_last_name]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Twin Classification<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('twin_classification')}}" placeholder="XX-12-1234" required name="data['+i+'][twin_classification]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Difference With The Twin<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('difference_with_the_twin')}}" placeholder="XX-12-1234" required name="data['+i+'][difference_with_the_twin]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<div class="form-group row">';
                fieldHTML+= '<label class="col-sm-2 form-control-label">Twin Gender<span class="text-danger">*';
                fieldHTML+= '</span>';
                fieldHTML+= '</label>';
                fieldHTML+= '<div class="col-sm-4">';
                fieldHTML+= '<div class="form-group">';
                fieldHTML+= '<input type="text" class="form-control" value="{{old('twin_gender')}}" placeholder="XX-12-1234" required name="data['+i+'][twin_gender]">';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '</div>';
                fieldHTML+= '<button style="float: right;" type="button" class="btn btn-danger remove-tr">Remove</button>';
                fieldHTML+= '</td>';
                fieldHTML+= '</tr>';
                $("#dynamicAddRemove_twins").append(fieldHTML);
            });
            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });
        </script>
