@extends('dashboard.layouts.auth')
@section('title', __('Verify Your Email Address'))
@section('content')
    <div class="center-block w-xxl p-t-3">
        <div class="p-a-md box-color r box-shadow-z4 text-color">
            <div class="text-center">
                @if(Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code) !="")
                    <img alt="" class="app-logo"
                         src="{{ URL::to('uploads/settings/'.Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code)) }}">
                @else
                    <img alt="" src="{{ URL::to('uploads/settings/nologo.png') }}">
                @endif
            </div>
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success text-center">A new email verification link has been emailed to you!</div>
                    @endif
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
                        <div class="text-center mb-5">
                            <p>You must verify your email address to access this page.</p>
                        </div>
                        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                            @csrf
                            <button type="submit" class="btn btn-primary">Resend verification email</button>
                        </form>
{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }}, <a--}}
{{--                        href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.--}}
                </div>
                <p class="mt-3 mb-0 text-center"><small>Issues with the verification process or entered the wrong email?
                        <br>Please sign up with <a href="{{route('register-retry')}}" >another</a> email address.</small></p>
            </div>
        </div>
    </div>
@endsection

