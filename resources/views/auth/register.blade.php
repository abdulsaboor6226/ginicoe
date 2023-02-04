@if (Helper::GeneralWebmasterSettings('register_status'))
    @extends('dashboard.layouts.auth')
    @section('title', __('backend.createNewAccount'))
    @section('content')
        <div class="center-block w-xxl p-t-3">
            <div class="p-a-md box-color r box-shadow-z4 text-color">
                <div class="text-center">
                    @if (Helper::GeneralSiteSettings('style_logo_' . @Helper::currentLanguage()->code) != '')
                        <img alt="" class="app-logo"
                            src="{{ URL::to('uploads/settings/' . Helper::GeneralSiteSettings('style_logo_' . @Helper::currentLanguage()->code)) }}">
                    @else
                        <img alt="" src="{{ URL::to('uploads/settings/nologo.png') }}">
                    @endif
                </div>
                <div class="m-y text-muted text-center">
                    {{ __('backend.newUser') }}
                </div>
                <form role="form" method="POST" action="{{ route('register') }}" id="registerForm">
                    {{ csrf_field() }}

                    @if ($errors->has('name'))
                        <div class="alert alert-warning">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    @if ($errors->has('email'))
                        <div class="alert alert-warning">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    @if ($errors->has('password'))
                        <div class="alert alert-warning">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <div class="md-form-group">
                        <input id="name" type="text" class="md-input" name="name" value="{{ old('name') }}"
                            required autofocus>
                        <label>{{ __('backend.fullName') }}</label>
                        <span style="float: left;color:red"> </span>
                    </div>
                    <div class="md-form-group">
                        <input id="email" type="email" class="md-input" name="email" value="{{ old('email') }}"
                            required>

                        <label>{{ __('backend.connectEmail') }}</label>
                        <span style="float: left;color:red"> </span>
                    </div>
                    <div class="md-form-group">
                        <input id="password" type="password" class="md-input" name="password" required>
                        <label>{{ __('backend.connectPassword') }}</label>
                        <span style="float: left;color:red"> </span>
                    </div>
                    <div class="md-form-group">
                        <input id="password-confirm" type="password" class="md-input" name="password_confirmation" required>
                        <label>{{ __('backend.confirmPassword') }}</label>
                        <span style="float: left;color:red"> </span>
                    </div>
                    <div class="md-form-group">
                        <input type="hidden" class="md-input">
                        <label>{{ __('backend.role') }}</label>
                        <span style="float: left;color:red"> </span>
                    </div>
                    <div class="  row">

                        <div class="col-md-6">
                            <input class="has-value" type="radio" value="4" name="role" checked>
                            <label>{{ __('backend.consumer') }}</label>

                        </div>
                        <div class="col-md-6">
                            <input class="has-value" type="radio" value="7" name="role">
                            <label>{{ __('backend.govt') }}</label>

                        </div>
                        <div class="col-md-6">
                            <input class="has-value" type="radio" value="5" name="role">
                            <label>{{ __('backend.merchant') }}</label>

                        </div>
                        <div class="col-md-6">
                            <input class="has-value" type="radio" value="6" name="role">
                            <label>{{ __('backend.bank') }}</label>

                        </div>


                    </div>
                    <div class="md-form-group p-t-0">

                    </div>
                    <button type="submit" class="btn primary btn-block p-x-md"><i class="material-icons">&#xe7fe;</i>
                        {{ __('backend.createNewAccount') }}</button>
                </form>

                <div class="p-v-lg text-center m-t-1">
                    <div>{{ __('backend.signedInToControl') }} <a href="{{ url('/' . env('BACKEND_PATH') . '/login') }}"
                            class="text-primary _600">{{ __('backend.signIn') }}</a>
                    </div>
                </div>
            </div>

        </div>

        <script>
            $("#registerForm").validate({
                errorPlacement: function(error, element) {

                    error.appendTo(element.siblings("span"));
                },
                rules: {
                    name: {
                        required: true,
                        maxlength: 25
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 25
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password",
                        maxlength: 25
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },


                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",

                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                    password_confirmation: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",

                }
            });
        </script>
    @endsection
@else
    <script>
        window.location.href = '{{ url('/login') }}';
    </script>
@endif
