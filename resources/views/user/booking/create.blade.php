@extends('layouts.app')

@section('style')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.message')
            <div class="card rounded-0">
                <div class="card-header rounded-0 bg-success text-light">{{ Auth::user()->name }} 1:1 {{ __('Booking') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.bookings.store') }}">
                        @csrf
                       <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <select id="age" class="form-select form-control @error('age') is-invalid @enderror"
                                    name="age" value="{{ old('age') }}" required autocomplete="age"
                                    autofocus aria-label="age">
                                    <option selected>Select Age</option>
                                </select>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-control @error('gender') is-invalid @enderror"
                                    name="gender" value="{{ old('gender') }}" required autocomplete="gender"
                                    autofocus aria-label="gender">
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Don't want to tell">Don't want you to know</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="booking_date" class="col-md-4 col-form-label text-md-right">{{ __('Booking for') }}</label>

                            <div class="col-md-6">
                                <div class="input-group" id="calendar">
                                    <input type="text" class="form-control @error('booking_date') is-invalid @enderror"
                                    name="booking_date" value="{{ old('booking_date') }}" placeholder="dd-mm-yyy" required>
                                    <span class="input-group-text rounded-0 border-0 bg-success text-light"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                @error('booking_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="bookingTimes"></div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Book Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" defer></script>
<script>
$(document).ready(function () {
    // Calendar
    $('#calendar input').datepicker({
        orientation: "top right",
        autoclose: true,
        todayHighlight: true,
        startDate: new Date(),
        format: "yyyy-mm-dd",
        
    }).on('changeDate', function(e) {
        var selectedDate = $('[name=booking_date]').val();
        $("#bookingTimes").empty();
        $.ajax({
            url: "{{ route('user.bookings.times') }}?booking_date=" + selectedDate,
            type: 'GET',
            success: data => {
                // console.log(data);
                $("#bookingTimes").html(data);
                $('#time_slots > option').hide();
            }
        });
    });

    // Time slot ways option showcase for users
    $( ".container" ).on("change", "#shift, #time_duration", function() {
        $('#time_slots > option').hide();
        let time = $('#shift').val();
        let time_duration = $('#time_duration').val();

        let targetClass = time_duration == '15' ? '.d-15' : '.d-30';

        if (time == "Morning") targetClass += '.M';
        else if (time == "Afternoon") targetClass += '.A';
        else if (time == "Evening") targetClass += '.E';
        
        $('#time_slots > option' + targetClass).show();        
    });

    // Loop function for age
    var select = '<option selected>Select Age</option>';
    for (i=16;i<=100;i++){
            select += '<option val=' + i + '>' + i + '</option>';
        }
    $('#age').html(select);
});
</script>
@endsection
@endsection
