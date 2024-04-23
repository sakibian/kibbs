@extends('layouts.app')
@section('style')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success rounded-0">
                <div class="card-header bg-success text-light rounded-0">{{ __('Notice!') }}</div>

                <div class="card-body">
                    @include('layouts.message')
                    <p class="alert alert-danger rounded-0 border-0 pt-2 pb-2">
                        You have reached your limit for this week!
                        <small>(5 booking per week.)</small>
                    </p>
                    <p class="alert alert-success rounded-0 border-0 pt-2 pb-2">
                        You still can book for upcoming weeks.
                        <small>(5 booking per week.)</small>
                    </p>
                    <a href="{{ route('user.bookings.index') }}" class="btn btn-outline-success rounded-0">Back to bookings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
