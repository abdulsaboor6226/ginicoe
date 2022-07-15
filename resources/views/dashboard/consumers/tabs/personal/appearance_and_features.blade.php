<form action="{{route('consumers.update',$consumer->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="main_tab" value="primary_info">
    <input type="hidden" name="sub_tab" value="appearance_and_features">

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Complexion <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('complexion',$consumer->complexion)}}" placeholder="15 A/W" required name="complexion">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Gender Identity <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('gender_identity',$consumer->gender_identity)}}" placeholder="Gulfam Street" required name="gender_identity">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Sexual Orientation </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('sexual_orientation',$consumer->sexual_orientation)}}" placeholder="15 A/W" name="sexual_orientation">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Sex Assigned At Birth <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('sex_assigned_at_birth',$consumer->sex_assigned_at_birth)}}" placeholder="Gulfam Street" required name="sex_assigned_at_birth">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Marital Status <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('marital_status',$consumer->marital_status)}}" required name="marital_status">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Height <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz.." value="{{old('height',$consumer->height)}}" required name="height">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Weight <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('weight',$consumer->weight)}}" placeholder="63100" required name="weight">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Hair Color <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('hair_color',$consumer->hair_color)}}"  required name="hair_color">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Hair Style </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('hair_style',$consumer->hair_style)}}" placeholder="63100" name="hair_style">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Facial Hair <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('facial_hair',$consumer->facial_hair)}}" name="facial_hair">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Eye Color <span class="text-danger">*</span> </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('eye_color',$consumer->eye_color)}}" placeholder="63100" required name="eye_color">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Prescribed Glasses </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('prescribed_glasses',$consumer->prescribed_glasses)}}" name="prescribed_glasses">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Race</label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('Race',$consumer->Race)}}" placeholder="63100" name="Race">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Enforcement To Know Your Disability </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('allow_law_enforcement_to_know_your_disability',$consumer->allow_law_enforcement_to_know_your_disability)}}" name="allow_law_enforcement_to_know_your_disability">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Disability Description </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('disability_description',$consumer->disability_description)}}" placeholder="63100" name="disability_description">
            </div>
        </div>
        <label class="col-sm-2 form-control-label">Medication </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('medication',$consumer->medication)}}" name="medication">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Hand Usage Preference </label>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="xyz" value="{{old('hand_usage_preference',$consumer->hand_usage_preference)}}" name="hand_usage_preference">
            </div>
        </div>
    </div>
    <button  class="btn btn-primary">Submit & Next</button>
</form>

