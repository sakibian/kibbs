@extends('layouts.app')
@section('style')
<style>
.col {
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  max-width: 100%;

}
.col {
  margin-top: 5px;
  padding-right: 0px;
  padding-left: 5px;
  padding-bottom: 5px;
  border-radius: 0%;
  -webkit-transition: background-color 2s ease-out;
  -moz-transition: background-color 2s ease-out;
  -o-transition: background-color 2s ease-out;
  transition: background-color 2s ease-out;
}

.col:hover {
  background-color: rgba(40,167,69, 0.9);
  cursor: pointer;
}
.current-date {
    border-color: rgba(40,167,69, 0.9);
    border-right: 2px solid;
}
.count_booking {
    background-color: rgba(40,167,69, 0.9);
    color: #ffffff;
    height: 22px;
    width: 22px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.5s ease-in;
    font-size: 16px;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-3 mb-3">
        <div class="col-md-4">
            <h2 class="text-center">{{ $currentMonth }} - {{ $currentYear}}</h2>
        </div>
        <div class="col-md-4">
            <p class="mb-2 text-muted">
                Here all your planned bookings. 
                You will find information for each booking you've created, 
                as well as being to book a new one.
            </p>
        </div>
        <div class="col-md-4 text-right">
            @if (Auth::user()->is_admin == 1)
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-lg btn-outline-success rounded-0">Show Bookings</a>
            @else
                <a href="{{ route('user.bookings.index') }}" class="btn btn-lg btn-outline-success rounded-0">Booking</a>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach ($getEverydayOfMonth as $day)
        <div class="col">
            <div class="card rounded-0 border-0">
                <div class="card-body">
                    <h6 class="card-title">{{ $day->format('D') }}</h6>
                    <p class="card-text border-top mt-1 py-1 text-muted">
                        @if ($today == $day)
                            <h4 class="current-date text-success font-weight-bolder">
                                {{ $day->format('d') }}
                            </h4>
                        @else
                            <h4>{{ $day->format('d') }}</h4>
                        @endif
                        <br>
                       
                        @php
                            if (Auth::user()->is_admin == 1){
                                $booking_count = \App\Models\Booking::where('booking_date', $day->format('Y-m-d'))->count();   
                            }else{
                                $booking_count = Auth::user()->bookings->where('booking_date', $day->format('Y-m-d'))->count();   
                            }
                        @endphp
                        @if ($booking_count > 0)
                            @if (Auth::user()->is_admin == 1)
                                <p class="text-success font-weight-bolder">
                                    <small>
                                       <span class="count_booking">{{ $booking_count }}</span><br> Booking available. 
                                    </small>
                                </p>
                            @else
                                <a href="{{ route('user.bookings.index') }}" class="card-link text-success font-weight-bolder text-decoration-none"><small>
                                    <span class="count_booking">{{ $booking_count }}</span><br> Booking available. 
                                </small></a>
                            @endif
                        @else
                            @if (Auth::user()->is_admin == 1)
                               <p>
                                    <small>
                                        No booking available.
                                    </small>
                               </p>
                            @else
                                <a href="{{ route('user.bookings.create') }}" class="card-link text-dark text-muted">
                                    <small>
                                        No booking available.
                                    </small>
                                </a>
                            @endif
                        
                        @endif

                    </p>
                </div>
            </div>
        </div>
      @endforeach
    </div>
    <button class="btn btn-success mr-5 rounded-0 scrollToTopBtn">
        Top <i class="fas fa-angle-double-up fa-1x"></i>
    </button>
</div>
@endsection
