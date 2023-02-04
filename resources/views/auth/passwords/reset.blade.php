@extends('dashboard.layouts.auth')
@section('title', __('backend.resetPassword'))
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
                {{ __('backend.resetPassword') }}
            </div>
            <form id="updatePasswordForm" name="reset" method="POST"
                action="{{ url('/' . env('BACKEND_PATH') . '/password/reset') }}">
                {{ csrf_field() }}

                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('email') }}
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('password') }}
                    </div>
                @endif
                @if ($errors->has('password_confirmation'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
                @if ($errors->has('same_password'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ $errors->first('same_password') }}
                </div>
            @endif

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="md-form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" value="{{ old('email') }}" class="md-input" required>
                    <label>{{ __('backend.yourEmail') }}</label>
                    <span style="float: left;color:red"> </span>
                </div>

                <div class="md-form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" name="password" class="md-input" required>
                    <label>{{ __('backend.newPassword') }}</label>
                    <span style="float: left;color:red"> </span>
                </div>


                <div class="md-form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="md-input" required>
                    <label>{{ __('backend.confirmPassword') }}</label>
                    <span style="float: left;color:red"> </span>
                </div>


                <button type="submit" class="btn primary btn-block p-x-md">{{ __('backend.resetPassword') }}</button>
            </form>
        </div>
    </div>

    <script>
        $("#updatePasswordForm").validate({
            errorPlacement: function(error, element) {

                error.appendTo(element.siblings("span"));
            },
            rules: {

                email: {
                    required: true,
                    email: true,
                    maxlength: 50
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

            },
            messages: {

                email: "Please enter a valid email address",

                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                password_confirmation: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Please enter the same password as above"
                },

            }
        });
    </script>
@endsection
