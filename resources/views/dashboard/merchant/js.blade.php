<script>
    $(document).ready(function () {
        $('#merchant_business_country').on('change', function () {
            let idCountry = this.value;
            $("#merchant_business_state").html('');
            $.ajax({
                url: "{{route('state_according_country')}}"+"/"+idCountry,
                type: "GET",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#merchant_business_state').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#merchant_business_state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#merchant_business_city').html('<option value="">-- Select City --</option>');
                }
            });
        });
        $('#merchant_business_state').on('change', function () {
            var idState = this.value;
            $("#merchant_business_city").html('');
            $.ajax({
                url: "{{route('city_according_state')}}"+"/"+idState,
                type: "GET",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#merchant_business_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        $("#merchant_business_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

    $(document).ready(function () {
        $('#merchant_country').on('change', function () {
            let idCountry = this.value;
            $("#merchant_state").html('');
            $.ajax({
                url: "{{route('state_according_country')}}"+"/"+idCountry,
                type: "GET",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#merchant_state').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#merchant_state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#merchant_city').html('<option value="">-- Select City --</option>');
                }
            });
        });
        $('#merchant_state').on('change', function () {
            var idState = this.value;
            $("#merchant_city").html('');
            $.ajax({
                url: "{{route('city_according_state')}}"+"/"+idState,
                type: "GET",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#merchant_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        $("#merchant_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

</script>
