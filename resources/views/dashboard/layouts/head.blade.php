<meta charset="utf-8"/>
<title>@yield('title')</title>
<meta name="description" content="{{ Helper::GeneralSiteSettings("site_desc_".@Helper::currentLanguage()->code) }}"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
<link rel="apple-touch-icon" href="{{ asset('assets/dashboard/images/logo.png') }}">
<meta name="apple-mobile-web-app-title" content="Ginicoe">
<base href="{{ route("adminHome") }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="mobile-web-app-capable" content="yes">
<link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/dashboard/images/favicon.png') }}">
@stack('before-styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/animate.css/animate.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/animate.css/animate.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/fonts/glyphicons/glyphicons.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/fonts/font-awesome/css/font-awesome.min.css') }}"
      type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/fonts/material-design-icons/material-design-icons.css') }}"
      type="text/css"/>

<link rel="stylesheet" href="{{ asset('assets/dashboard/css/bootstrap/dist/css/bootstrap.min.css') }}" />

  
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/app.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/font.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/topic.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/js/dropify/dropify.css') }}" type="text/css"/>

@if( @Helper::currentLanguage()->direction=="rtl")
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bootstrap-rtl/dist/bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/app.rtl.css') }}">
@endif
@stack('after-styles')
<script src="{{ asset('assets/dashboard/js/jquery/dist/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/jquery.validate.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dashboard_card.css') }}" type="text/css"/>
<script>
    $(document).ready(function(){
        $(".become_a_partner").click(function () {
            var data = $(this).data('number');
            $("#requestForRole").val(function() {
                return this.value + data;
            });
        });
        var text_max = 1000;
        $('#textarea_feedback').html(text_max + ' characters remaining');
        $('#textarea').keyup(function() {
            var text_length = $('#textarea').val().length;
            var text_remaining = text_max - text_length;

            $('#textarea_feedback').html(text_remaining + ' characters remaining');
        });

    });
</script>
