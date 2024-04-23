@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.message')
        </div>
        @foreach ($bookings as $booking)
        {{-- @dd(explode(" - ", $booking->time)) --}}
        @php
            $expired = false;
            $time_tmp = explode(" - ", $booking->time);

            if($booking->booking_date <= date("Y-m-d") && 
                strtotime($booking->booking_date . " " . $time_tmp[0]) < strtotime(Carbon\Carbon::now('Europe/London')))
            {
                $expired = true;
            }
        @endphp
        <div class="col-md-4 mb-5">
            <div class="card my-2 mb-5 rounded-0">
                <div class="card-header py-2 fs-5">
                    <i class="far fa-user"></i> {{ $booking->user->name }} 
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger btn-sm d-inline-block float-right" data-toggle="modal" data-target="#bookingDeleteModal">
                        Delete
                    </button>
                    @if ($expired)
                        <button class="disabled btn btn-sm btn-outline-secondary d-inline-block float-right mr-1">
                            Expired
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong class="text-success mr-1">Booking:</strong> {{ Carbon\Carbon::parse($booking->booking_date)->toFormattedDateString() }}</li>
                        <li class="list-group-item"><strong class="text-success mr-1">Gender:</strong> {{ $booking->gender }}</li>
                        <li class="list-group-item"><strong class="text-success mr-1">Age:</strong> {{ $booking->age }}</li>
                        <li class="list-group-item"><strong class="text-success mr-1">Shift:</strong> {{ $booking->shift }}</li>
                        <li class="list-group-item"><strong class="text-success mr-1">Time:</strong> {{ $booking->time }}</li>
                        <li class="list-group-item"><strong class="text-success mr-1">Duration:</strong> {{ $booking->duration }}min.</li>
                        <li class="list-group-item"><footer class="blockquote-footer text-muted mt-2"><cite title="Booked">{{ $booking->created_at->diffForHumans() }}</cite></footer></li>
                        <a class="btn btn-outline-success rounded-0 float-right" href="{{ route('user',$booking->user->id) }}"><i class="far fa-comments mr-2"></i> Start Meeting</a>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @if ($bookings->isEmpty())
        <div class="col-md-12">
            <div class="card my-2 rounded-0">
                <div class="card-body">
                    <h5 class="text-center">No booking's available at the moment.</h5>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="bookingDeleteModal" tabindex="-1" aria-labelledby="bookingDeleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.bookings.destroy',$booking->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingDeleteModal">Are you sure ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                       <textarea class="form-control" id="deleteReason" name="booking_delete_reason" rows="5" placeholder="Reasons:"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger btn-sm">Send Email & Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
