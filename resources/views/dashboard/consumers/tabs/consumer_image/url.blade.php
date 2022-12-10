<form action="{{route('service-call-save',$url->id)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="consumer_id_fk" value="{{$consumer->id}}">
    <div class="form-group row">
        <label class="col-sm-3 form-control-label">Url<span class="text-danger">*</span><br><span class="text-info">( Only url not user id )</span> </label>
        <div class="col-sm-7">
            <div class="form-group">
                <input type="text" class="form-control" value="{{old('url',$url->value)}}"  multiple name="url">
            </div>
        </div>
    </div>
    <div class="col-sm-2" style="float: right; padding-bottom: 5px;">
        <button class="btn btn-danger">
            &nbsp;<i class="material-icons">autorenew</i>
            <span>Submit</span>
        </button>
    </div>
</form>
