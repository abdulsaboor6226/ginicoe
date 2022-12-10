<script>
    $(document).ready(function () {
        $('#consumer_US_state').on('change', function () {
            var idState = this.value;
            $("#consumer_US_city").html('');
            $.ajax({
                url: "{{route('city_according_state')}}"+"/"+idState,
                type: "GET",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#consumer_US_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        $("#consumer_US_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function () {
        $('#emergency_US_state').on('change', function () {
            var idState = this.value;
            $("#emergency_US_city").html('');
            $.ajax({
                url: "{{route('city_according_state')}}"+"/"+idState,
                type: "GET",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#emergency_US_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        $("#emergency_US_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function () {
        $('#previous_us_state').on('change', function () {
            var idState = this.value;
            $("#previous_us_city").html('');
            $.ajax({
                url: "{{route('city_according_state')}}"+"/"+idState,
                type: "GET",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#previous_us_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        $("#previous_us_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function () {
        $('#birth_country').on('change', function () {
            let idCountry = this.value;
            $("#birth_state").html('');
            $.ajax({
                url: "{{route('state_according_country')}}"+"/"+idCountry,
                type: "GET",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#birth_state').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#birth_state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#birth_city').html('<option value="">-- Select City --</option>');
                }
            });
        });
        $('#birth_state').on('change', function () {
            var idState = this.value;
            $("#birth_city").html('');
            $.ajax({
                url: "{{route('city_according_state')}}"+"/"+idState,
                type: "GET",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#birth_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        $("#birth_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function () {
        $('#us_govt_badge_country').on('change', function () {
            let idCountry = this.value;
            $("#us_govt_badge_state").html('');
            $.ajax({
                url: "{{route('state_according_country')}}" + "/" + idCountry,
                type: "GET",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#us_govt_badge_state').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#us_govt_badge_state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

</script>
