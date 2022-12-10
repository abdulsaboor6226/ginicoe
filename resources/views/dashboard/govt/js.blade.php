<script>
    $(document).ready(function () {
        $('#govt_country').on('change', function () {
            let idCountry = this.value;
            $("#govt_state").html('');
            $.ajax({
                url: "{{route('state_according_country')}}"+"/"+idCountry,
                type: "GET",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#govt_state').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#govt_state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#govt_city').html('<option value="">-- Select City --</option>');
                }
            });
        });
        $('#govt_state').on('change', function () {
            var idState = this.value;
            $("#govt_city").html('');
            $.ajax({
                url: "{{route('city_according_state')}}"+"/"+idState,
                type: "GET",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#govt_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        $("#govt_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
