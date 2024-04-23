@extends('layouts.app')

@section('style')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    @include('layouts.message')
    @if (Auth::user()->is_admin == 1)
        
    @else
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-outline-success btn-block rounded-0" href="{{ route('user.bookings.create') }}">Start Booking</a>
        </div>
        <div class="col-md-4">
            <a class="btn btn-outline-success btn-block rounded-0 disabled" href="{{ route('user.bookings.create') }}">
                {{ $bookingCount }} Booking available in this week.
            </a>
        </div>
        <div class="col-md-4">
            <p class="btn btn-outline-success btn-block rounded-0 disabled">
                Remaining {{ 5 - $bookingCount }} booking in this week.
            </p>
        </div>
    </div>
    @endif
    
    <div class="row justify-content-left">
        @if ($bookings->isEmpty())
            <div class="col-md-6">
                <div class="card my-2 rounded-0 border-0">
                    <div class="card-body border-right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" class="illustration styles_illustrationTablet__1DWOa"><g id="_113_brainstorming_flatline" data-name="#113_brainstorming_flatline"><path d="M263.41,163.71h0a72.79,72.79,0,1,0-119.67,0h0l.08.09a71.6,71.6,0,0,0,6.06,7.6c3,4.21,11.3,9.55,12.76,14.51,3,10.25,9.05,23,9.05,23h63.8s6.05-12.77,9.06-23c1.45-5,9.72-10.3,12.76-14.51a71.6,71.6,0,0,0,6.06-7.6Z" fill="#28a745"></path><rect x="169.73" y="208.93" width="67.65" height="10.45" rx="3.91" fill="#fff"></rect><path d="M233.47,219.89H173.63a4.41,4.41,0,0,1-4.4-4.41v-2.64a4.41,4.41,0,0,1,4.4-4.41h59.84a4.42,4.42,0,0,1,4.41,4.41v2.64A4.42,4.42,0,0,1,233.47,219.89Zm-59.84-10.46a3.41,3.41,0,0,0-3.4,3.41v2.64a3.41,3.41,0,0,0,3.4,3.41h59.84a3.41,3.41,0,0,0,3.41-3.41v-2.64a3.41,3.41,0,0,0-3.41-3.41Z" fill="#231f20"></path><rect x="169.73" y="219.39" width="67.65" height="10.45" rx="3.91" fill="#fff"></rect><path d="M233.47,230.34H173.63a4.4,4.4,0,0,1-4.4-4.4V223.3a4.41,4.41,0,0,1,4.4-4.41h59.84a4.42,4.42,0,0,1,4.41,4.41v2.64A4.41,4.41,0,0,1,233.47,230.34Zm-59.84-10.45a3.41,3.41,0,0,0-3.4,3.41v2.64a3.4,3.4,0,0,0,3.4,3.4h59.84a3.41,3.41,0,0,0,3.41-3.4V223.3a3.41,3.41,0,0,0-3.41-3.41Z" fill="#231f20"></path><rect x="169.73" y="229.84" width="67.65" height="10.45" rx="3.91" fill="#fff"></rect><path d="M233.47,240.8H173.63a4.41,4.41,0,0,1-4.4-4.41v-2.64a4.41,4.41,0,0,1,4.4-4.41h59.84a4.42,4.42,0,0,1,4.41,4.41v2.64A4.42,4.42,0,0,1,233.47,240.8Zm-59.84-10.46a3.41,3.41,0,0,0-3.4,3.41v2.64a3.41,3.41,0,0,0,3.4,3.41h59.84a3.41,3.41,0,0,0,3.41-3.41v-2.64a3.41,3.41,0,0,0-3.41-3.41Z" fill="#231f20"></path><rect x="169.73" y="240.3" width="67.65" height="10.45" rx="3.91" fill="#fff"></rect><path d="M233.47,251.25H173.63a4.41,4.41,0,0,1-4.4-4.41V244.2a4.4,4.4,0,0,1,4.4-4.4h59.84a4.41,4.41,0,0,1,4.41,4.4v2.64A4.42,4.42,0,0,1,233.47,251.25ZM173.63,240.8a3.4,3.4,0,0,0-3.4,3.4v2.64a3.41,3.41,0,0,0,3.4,3.41h59.84a3.41,3.41,0,0,0,3.41-3.41V244.2a3.41,3.41,0,0,0-3.41-3.4Z" fill="#231f20"></path><path d="M212.52,264.8H194.59a15.91,15.91,0,0,1-11.91-5.34l-7.75-8.71h57.25l-7.75,8.71A15.93,15.93,0,0,1,212.52,264.8Z" fill="#231f20"></path><path d="M212.52,265.3H194.59a16.48,16.48,0,0,1-12.29-5.51l-7.75-8.71a.49.49,0,0,1-.08-.53.51.51,0,0,1,.46-.3h57.25a.49.49,0,0,1,.45.3.47.47,0,0,1-.08.53l-7.75,8.71A16.45,16.45,0,0,1,212.52,265.3ZM176,251.25l7,7.88a15.45,15.45,0,0,0,11.54,5.17h17.93a15.47,15.47,0,0,0,11.54-5.17l7-7.88Z" fill="#231f20"></path><path d="M187.19,177.56a21.12,21.12,0,0,1-3.87-.38,12.48,12.48,0,0,1-9.91-8.13,24.21,24.21,0,0,1-9-5.06c-4.27-3.68-3.22-9.29-2.58-11.5a14.28,14.28,0,0,1-7.38-9.27,11.84,11.84,0,0,1,2.69-11.57,13,13,0,0,1-2.92-7c-.7-5.43,3.49-9.49,5.31-11-1-1.65-2.48-5.55.49-11.22a12.22,12.22,0,0,1,10.32-6.79,19.91,19.91,0,0,1,.35-9.22c1.73-6.7,18.41-13,23.61-12.72a10.41,10.41,0,0,1,7,3.27.94.94,0,0,1,.29.69v88.16a1.36,1.36,0,0,1,0,.2,7.8,7.8,0,0,1-.39,1.4C198.57,174.06,193.66,177.56,187.19,177.56ZM171,97.61a10.31,10.31,0,0,0-9.24,5.75c-3.26,6.22-.27,9.69-.14,9.84a1,1,0,0,1,.24.79,1,1,0,0,1-.42.71c-.06,0-6,4.13-5.27,9.68.6,4.61,2.88,6.4,3,6.47a1,1,0,0,1,.39.79,1,1,0,0,1-.37.79,9.88,9.88,0,0,0-2.83,10.25,12.06,12.06,0,0,0,7,8.3,1,1,0,0,1,.6.52,1,1,0,0,1,0,.79c0,.07-2.5,6.55,1.71,10.18a20.89,20.89,0,0,0,8.68,4.76,1,1,0,0,1,.79.76c0,.24,1.48,5.87,8.52,7.22,7.45,1.43,12.86-1.52,15.67-8.53a6.84,6.84,0,0,0,.26-1V78.08a8.42,8.42,0,0,0-5.42-2.38c-5-.24-20.24,6-21.59,11.22a16.68,16.68,0,0,0,0,9.36,1,1,0,0,1-.14,1,1,1,0,0,1-.9.38S171.32,97.61,171,97.61Z" fill="#fff"></path><path d="M168.69,137.77c-5.66,0-10.62-5.2-10.84-5.43a1,1,0,1,1,1.46-1.37c0,.05,5,5.18,9.94,4.78a1,1,0,0,1,.16,2Z" fill="#fff"></path><path d="M181.25,122.73a14.46,14.46,0,0,1-3.72-.5c-8.71-2.31-9.61-12.34-9.64-12.77a1,1,0,1,1,2-.16c0,.37.83,9,8.17,11a11.64,11.64,0,0,0,11.9-3.64,1,1,0,0,1,1.58,1.23A13.77,13.77,0,0,1,181.25,122.73Z" fill="#fff"></path><path d="M173.8,131.59l-.81,0a1,1,0,0,1-1-1,1,1,0,0,1,1.05-1c2.78.14,4.89-.51,6.27-1.94,2.18-2.26,1.91-5.78,1.91-5.82a1,1,0,1,1,2-.17c0,.18.36,4.44-2.45,7.36A9.3,9.3,0,0,1,173.8,131.59Z" fill="#fff"></path><path d="M185.83,110.88a1,1,0,0,1-1-.83c-2.15-12.12-12.76-12.41-13.21-12.41a1,1,0,0,1-1-1,1,1,0,0,1,1-1c.13,0,12.72.28,15.16,14.06a1,1,0,0,1-.81,1.16Z" fill="#fff"></path><path d="M187.94,165.67a1,1,0,0,1-1-1c-.2-12.92-12.67-13.3-13.2-13.31a1,1,0,0,1-1-1,1,1,0,0,1,1-1c.15,0,14.94.41,15.17,15.27a1,1,0,0,1-1,1Z" fill="#fff"></path><path d="M178.74,152.38a1,1,0,0,1-1-.88c0-.14-1.67-14.53,12.86-16.41a1,1,0,0,1,.26,2c-12.54,1.62-11.2,13.66-11.13,14.17a1,1,0,0,1-.87,1.12Z" fill="#fff"></path><path d="M200.63,102.29a1,1,0,0,1-1-.94c0-.15-.3-3.08-5.07-4.3a1,1,0,1,1,.5-1.93c6.3,1.6,6.56,5.94,6.57,6.13a1,1,0,0,1-1,1Z" fill="#fff"></path><path d="M186.94,85.89a1,1,0,0,1-.74-.33c-4.45-4.94-9.56-3.14-9.78-3.06a1,1,0,0,1-1.28-.6,1,1,0,0,1,.59-1.28c.26-.1,6.58-2.37,12,3.6a1,1,0,0,1-.08,1.42A1,1,0,0,1,186.94,85.89Z" fill="#fff"></path><path d="M175.75,151.38a1,1,0,0,1-1-.92,5.94,5.94,0,0,0-3.49-4.7,1,1,0,0,1,.76-1.85,7.94,7.94,0,0,1,4.72,6.38,1,1,0,0,1-.91,1.08Z" fill="#fff"></path><path d="M219.92,177.56c-6.47,0-11.38-3.5-14-10.14a8.89,8.89,0,0,1-.38-1.4,1.36,1.36,0,0,1,0-.2V77.66a1,1,0,0,1,.28-.69,10.46,10.46,0,0,1,7.05-3.27c5.16-.23,21.88,6,23.61,12.72a20.19,20.19,0,0,1,.35,9.22,12.24,12.24,0,0,1,10.32,6.79c3,5.67,1.47,9.57.48,11.22,1.83,1.49,6,5.55,5.32,11a12.86,12.86,0,0,1-2.93,7,11.81,11.81,0,0,1,2.7,11.57,14.34,14.34,0,0,1-7.38,9.27c.63,2.21,1.69,7.82-2.58,11.5a24.21,24.21,0,0,1-9,5.06,12.5,12.5,0,0,1-9.91,8.13A21.29,21.29,0,0,1,219.92,177.56Zm-12.44-11.84a5.62,5.62,0,0,0,.26,1c2.8,7,8.23,10,15.67,8.53,7.09-1.36,8.51-7.16,8.52-7.22a1,1,0,0,1,.79-.76,21.15,21.15,0,0,0,8.67-4.76c4.22-3.63,1.75-10.11,1.72-10.18a1,1,0,0,1,0-.79,1,1,0,0,1,.59-.52c.21-.07,5.18-1.79,7-8.3a9.84,9.84,0,0,0-2.83-10.25,1,1,0,0,1-.37-.8,1,1,0,0,1,.4-.78c.09-.07,2.38-1.86,3-6.47.72-5.57-5.2-9.64-5.26-9.68a1,1,0,0,1-.18-1.51c.13-.14,3.11-3.61-.14-9.83a10.33,10.33,0,0,0-9.77-5.73,1,1,0,0,1-.89-.39,1,1,0,0,1-.14-1,16.68,16.68,0,0,0,0-9.36c-.6-2.28-4.15-5.14-9.52-7.66-4.56-2.14-9.77-3.67-12.07-3.56a8.39,8.39,0,0,0-5.42,2.38Z" fill="#fff"></path><path d="M238.42,137.77l-.72,0a1,1,0,0,1-.92-1.08,1,1,0,0,1,1.08-.92c5,.41,9.89-4.73,9.94-4.78a1,1,0,0,1,1.41-.05,1,1,0,0,1,0,1.42C249,132.57,244.08,137.77,238.42,137.77Z" fill="#fff"></path><path d="M225.86,122.73a13.75,13.75,0,0,1-10.28-4.84,1,1,0,0,1,1.58-1.23,11.6,11.6,0,0,0,11.9,3.64c7.34-2,8.14-10.63,8.17-11a1,1,0,1,1,2,.16c0,.43-.93,10.46-9.64,12.77A14.57,14.57,0,0,1,225.86,122.73Z" fill="#fff"></path><path d="M233.3,131.59a9.29,9.29,0,0,1-7-2.59,10.19,10.19,0,0,1-2.45-7.36,1,1,0,1,1,2,.17,8.29,8.29,0,0,0,1.91,5.82c1.38,1.43,3.48,2.08,6.27,1.94a1,1,0,0,1,1,1,1,1,0,0,1-.95,1Z" fill="#fff"></path><path d="M221.27,110.88l-.17,0a1,1,0,0,1-.81-1.16c2.44-13.78,15-14.06,15.15-14.06h0a1,1,0,0,1,0,2h0c-.46,0-11.06.29-13.21,12.41A1,1,0,0,1,221.27,110.88Z" fill="#fff"></path><path d="M219.17,165.67h0a1,1,0,0,1-1-1c.23-14.86,15-15.27,15.16-15.27a1,1,0,0,1,1,1,1,1,0,0,1-1,1c-.53,0-13,.39-13.2,13.31A1,1,0,0,1,219.17,165.67Z" fill="#fff"></path><path d="M228.36,152.38h-.12a1,1,0,0,1-.87-1.12c.06-.51,1.41-12.55-11.13-14.17a1,1,0,0,1,.26-2C231,137,229.37,151.36,229.35,151.5A1,1,0,0,1,228.36,152.38Z" fill="#fff"></path><path d="M206.48,102.29h0a1,1,0,0,1-1-1c0-.19.27-4.53,6.57-6.13a1,1,0,0,1,.49,1.93c-4.87,1.25-5.06,4.26-5.06,4.29A1,1,0,0,1,206.48,102.29Z" fill="#fff"></path><path d="M220.16,85.89a1,1,0,0,1-.74-1.67c5.38-6,11.69-3.7,12-3.6a1,1,0,0,1,.59,1.29,1,1,0,0,1-1.29.59h0c-.21-.08-5.33-1.88-9.77,3.06A1,1,0,0,1,220.16,85.89Z" fill="#fff"></path><path d="M231.36,151.37h-.09a1,1,0,0,1-.91-1.08,7.92,7.92,0,0,1,4.71-6.38,1,1,0,0,1,1.31.55,1,1,0,0,1-.55,1.3,5.91,5.91,0,0,0-3.48,4.7A1,1,0,0,1,231.36,151.37Z" fill="#fff"></path><path d="M324.6,103C322,94.68,307,90.8,282.19,92.09q-5.76.3-12,1l.43,1a201.5,201.5,0,0,1,20.62-1.18c18.19,0,30.16,3.43,32.33,10.49,3.36,11-17.67,27.91-51.7,44A448.53,448.53,0,0,1,212.7,170a464.56,464.56,0,0,1-51.79,12.82,286.42,286.42,0,0,1-36,4.47c-23.91,1.24-39-2.47-41.35-10.18-3.26-10.58,16.28-26.77,48.3-42.39,0-.35-.11-.7-.17-1.06-7.34,3.57-14.11,7.23-20.18,10.91-21.24,12.84-31.51,24.51-29,32.85,2.24,7.28,14,11.17,33.51,11.17,2.81,0,5.78-.09,8.9-.25a284.77,284.77,0,0,0,36.64-4.58A459.93,459.93,0,0,0,213,171a446.76,446.76,0,0,0,58.36-22.25,267.93,267.93,0,0,0,24.27-12.85C316.87,123,327.15,111.35,324.6,103Z" fill="#231f20"></path><path d="M295.64,144.54c-6.08-3.68-12.84-7.34-20.18-10.91-.06.36-.13.71-.18,1.06,32,15.62,51.57,31.81,48.31,42.39-2.38,7.71-17.45,11.42-41.35,10.18a286,286,0,0,1-36-4.47A464.56,464.56,0,0,1,194.41,170a445.36,445.36,0,0,1-59.2-22.66A256,256,0,0,1,112,135C91.54,122.58,81.14,111,83.52,103.32c2.16-7.06,14.12-10.49,32.32-10.49A201.69,201.69,0,0,1,136.47,94c.14-.32.28-.65.43-1q-6.21-.66-12-1C100.13,90.8,85.07,94.68,82.51,103s7.72,20,29,32.86a267.69,267.69,0,0,0,24.26,12.85A446.92,446.92,0,0,0,194.1,171a459.79,459.79,0,0,0,51.44,12.76,284.69,284.69,0,0,0,36.65,4.58c3.12.16,6.08.25,8.9.25,19.48,0,31.27-3.89,33.51-11.17C327.15,169.05,316.87,157.38,295.64,144.54Z" fill="#231f20"></path><path d="M152.71,197.15l-9.42,5.4a7.32,7.32,0,0,0-2.57-.47h-35a7.35,7.35,0,0,0-7.35,7.35v18.29a7.35,7.35,0,0,0,7.35,7.35h35a7.35,7.35,0,0,0,7.35-7.35V209.43a7.4,7.4,0,0,0-.65-3Z" fill="#fff"></path><path d="M140.72,235.57h-35a7.86,7.86,0,0,1-7.85-7.85V209.43a7.86,7.86,0,0,1,7.85-7.85h35a7.79,7.79,0,0,1,2.52.42l9.22-5.28a.49.49,0,0,1,.6.08.5.5,0,0,1,.08.6l-5.17,9a7.71,7.71,0,0,1,.6,3v18.29A7.86,7.86,0,0,1,140.72,235.57Zm-35-33a6.86,6.86,0,0,0-6.85,6.85v18.29a6.85,6.85,0,0,0,6.85,6.85h35a6.85,6.85,0,0,0,6.85-6.85V209.43a6.68,6.68,0,0,0-.61-2.81.5.5,0,0,1,0-.46l4.38-7.66L143.54,203a.54.54,0,0,1-.43,0,6.83,6.83,0,0,0-2.39-.44Z" fill="#d1d3d4"></path><path d="M286,202.08a39.14,39.14,0,0,0-16.18,3.32l-11.64-6.18L262,210.78a13.31,13.31,0,0,0-3.89,9.05c0,9.81,12.46,17.76,27.82,17.76s27.81-8,27.81-17.76S301.31,202.08,286,202.08Z" fill="#fff"></path><path d="M286,238.09c-15.62,0-28.32-8.19-28.32-18.26a13.65,13.65,0,0,1,3.83-9.17l-3.8-11.28a.49.49,0,0,1,.15-.54.5.5,0,0,1,.56-.06l11.42,6.06A39.8,39.8,0,0,1,286,201.58c15.61,0,28.31,8.19,28.31,18.25S301.56,238.09,286,238.09ZM259,200.25l3.49,10.37a.49.49,0,0,1-.11.5,12.8,12.8,0,0,0-3.76,8.71c0,9.52,12.26,17.26,27.32,17.26s27.31-7.74,27.31-17.26S301,202.58,286,202.58a38.66,38.66,0,0,0-16,3.27.51.51,0,0,1-.45,0Z" fill="#d1d3d4"></path><path d="M136.59,38.29H98V72.12h33.08l5.5,5.16-1.73-5.16h1.73Z" fill="#fff"></path><path d="M136.59,77.78a.51.51,0,0,1-.34-.14l-5.35-5H98a.5.5,0,0,1-.5-.5V38.29a.5.5,0,0,1,.5-.5h38.58a.5.5,0,0,1,.5.5V72.12a.5.5,0,0,1-.5.5h-1l1.51,4.5a.51.51,0,0,1-.48.66ZM98.51,71.62h32.58a.52.52,0,0,1,.35.14l4.05,3.8-1.1-3.28a.5.5,0,0,1,.47-.66h1.23V38.79H98.51Z" fill="#d1d3d4"></path><path d="M117.3,164.54c-3.38,0-3.38,5.26,0,5.26S120.69,164.54,117.3,164.54Z" fill="#d1d3d4"></path><path d="M72.16,125.47a1,1,0,0,0-.27-.46l-.59-.6a.81.81,0,0,0-.34-.21.73.73,0,0,0-.41-.09.71.71,0,0,0-.4.09.81.81,0,0,0-.34.21l-.16.22a1,1,0,0,0-.15.53l0,.28a1.08,1.08,0,0,0,.27.46l.59.59a.83.83,0,0,0,.34.22,1,1,0,0,0,.41.09.9.9,0,0,0,.4-.09.83.83,0,0,0,.34-.22l.16-.21a1,1,0,0,0,.15-.53Z" fill="#d1d3d4"></path><path d="M117.08,111.14a.83.83,0,0,0-.22-.34.75.75,0,0,0-.34-.21.7.7,0,0,0-.4-.09l-.28,0a1,1,0,0,0-.46.27l-.17.22a1.08,1.08,0,0,0-.14.53v.59a1.16,1.16,0,0,0,.31.74.74.74,0,0,0,.33.22,1,1,0,0,0,.41.09l.28,0a1,1,0,0,0,.46-.27l.17-.21a1.1,1.1,0,0,0,.14-.53v-.59A1,1,0,0,0,117.08,111.14Z" fill="#d1d3d4"></path><path d="M294.82,171.05c-3.38,0-3.38,5.26,0,5.26S298.21,171.05,294.82,171.05Z" fill="#d1d3d4"></path><path d="M328,135c-3.38,0-3.39,5.25,0,5.25S331.34,135,328,135Z" fill="#d1d3d4"></path><path d="M251.29,218a1.49,1.49,0,0,0-.83-.83,1.27,1.27,0,0,0-.61-.14l-.42.06a1.52,1.52,0,0,0-.69.41l-.25.31a1.63,1.63,0,0,0-.22.8v.59a1.27,1.27,0,0,0,.14.61,1.18,1.18,0,0,0,.33.51,1.78,1.78,0,0,0,1.11.46l.42-.06a1.5,1.5,0,0,0,.69-.4l.25-.32a1.6,1.6,0,0,0,.22-.8v-.59A1.27,1.27,0,0,0,251.29,218Z" fill="#d1d3d4"></path><path d="M306,51a10.82,10.82,0,0,0-7.93,3.77,23.09,23.09,0,0,0-17-4.16,13,13,0,0,0-7.3,3c-.68.64-3.52,6.58-3.2,6.5-3.62.91-5.92,5-5.4,8.66a10.72,10.72,0,0,0,6.93,8.1,24.12,24.12,0,0,0,3.57,1,23.51,23.51,0,0,1-6,5.81,13.84,13.84,0,0,0,10.21-4.73c1.75.65,3.35,1.65,5.07,2.36,4.21,1.76,9,1.74,13.45.87a19.85,19.85,0,0,0,8.9-3.79,10.44,10.44,0,0,0,4.07-8.48c4,1.13,7.93-3,7.88-7.16C319.18,55.56,312.46,50.71,306,51Z" fill="#fff"></path><path d="M269.7,84.14a.5.5,0,0,1-.48-.35.51.51,0,0,1,.2-.56,22.76,22.76,0,0,0,5.38-5.08,21.08,21.08,0,0,1-2.89-.82,11.17,11.17,0,0,1-7.24-8.5c-.56-3.94,1.91-8,5.44-9.12a24.35,24.35,0,0,1,1.29-3,20.49,20.49,0,0,1,2-3.52A13.58,13.58,0,0,1,281,50.08a23.43,23.43,0,0,1,17,4,11.27,11.27,0,0,1,8-3.6h0a14,14,0,0,1,10,3.79,11.8,11.8,0,0,1,3.78,8.46,8.33,8.33,0,0,1-3.24,6.47,6,6,0,0,1-4.62,1.32,11.2,11.2,0,0,1-4.27,8.24,20.08,20.08,0,0,1-9.12,3.89c-5.24,1-9.86.72-13.74-.89-.79-.33-1.55-.71-2.28-1.09s-1.62-.81-2.46-1.15a14.32,14.32,0,0,1-10.35,4.64Zm1-23.56c-3.23.82-5.53,4.53-5,8.11a10.13,10.13,0,0,0,6.61,7.7,23.6,23.6,0,0,0,3.49,1,.48.48,0,0,1,.36.3.51.51,0,0,1-.05.48A24.41,24.41,0,0,1,271.4,83a13.53,13.53,0,0,0,8.14-4.44.49.49,0,0,1,.55-.13A25.72,25.72,0,0,1,283,79.76c.72.36,1.46.74,2.21,1,3.7,1.54,8.12,1.82,13.17.83A19.2,19.2,0,0,0,307,78a10,10,0,0,0,3.88-8.06.53.53,0,0,1,.18-.43.52.52,0,0,1,.45-.09,4.91,4.91,0,0,0,4.4-1,7.29,7.29,0,0,0,2.85-5.67A10.81,10.81,0,0,0,315.31,55a12.91,12.91,0,0,0-9.26-3.52h0a10.3,10.3,0,0,0-7.57,3.6.5.5,0,0,1-.68.07,22.43,22.43,0,0,0-16.67-4.06,12.65,12.65,0,0,0-7,2.9A36.36,36.36,0,0,0,271.05,60a.48.48,0,0,1-.37.56ZM306,51h0Z" fill="#d1d3d4"></path><path d="M292.39,113.69A3.59,3.59,0,1,1,296,110.1,3.59,3.59,0,0,1,292.39,113.69Zm0-6.18A2.59,2.59,0,1,0,295,110.1,2.59,2.59,0,0,0,292.39,107.51Z" fill="#d1d3d4"></path><path d="M209.39,41.88A3.59,3.59,0,1,1,213,38.29,3.59,3.59,0,0,1,209.39,41.88Zm0-6.18A2.59,2.59,0,1,0,212,38.29,2.59,2.59,0,0,0,209.39,35.7Z" fill="#d1d3d4"></path><path d="M96.09,140.71a2.57,2.57,0,1,1,2.56-2.56A2.56,2.56,0,0,1,96.09,140.71Zm0-4.13a1.57,1.57,0,1,0,1.56,1.57A1.56,1.56,0,0,0,96.09,136.58Z" fill="#d1d3d4"></path><path d="M243.34,44.22a1.05,1.05,0,0,0,0,2.1A1.05,1.05,0,0,0,243.34,44.22Z" fill="#d1d3d4"></path><path d="M159.91,45.54c-2.71,0-2.71,4.2,0,4.2S162.62,45.54,159.91,45.54Z" fill="#d1d3d4"></path><path d="M138.38,214.66H111a.5.5,0,0,1-.5-.5.51.51,0,0,1,.5-.5h27.41a.5.5,0,0,1,.5.5A.5.5,0,0,1,138.38,214.66Z" fill="#d1d3d4"></path><path d="M130.77,223.21H111a.5.5,0,0,1-.5-.5.51.51,0,0,1,.5-.5h19.8a.5.5,0,0,1,.5.5A.5.5,0,0,1,130.77,223.21Z" fill="#d1d3d4"></path><path d="M301.78,215.89H270.52a.5.5,0,0,1-.5-.5.51.51,0,0,1,.5-.5h31.26a.51.51,0,0,1,.5.5A.5.5,0,0,1,301.78,215.89Z" fill="#d1d3d4"></path><path d="M296.57,225.12H270.52a.51.51,0,0,1-.5-.5.5.5,0,0,1,.5-.5h26.05a.5.5,0,0,1,.5.5A.51.51,0,0,1,296.57,225.12Z" fill="#d1d3d4"></path><path d="M129.6,46H104.74a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5H129.6a.5.5,0,0,1,.5.5A.5.5,0,0,1,129.6,46Z" fill="#d1d3d4"></path><path d="M129.6,52.16H104.74a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5H129.6a.5.5,0,0,1,.5.5A.5.5,0,0,1,129.6,52.16Z" fill="#d1d3d4"></path><path d="M129.6,58.29H104.74a.5.5,0,0,1,0-1H129.6a.5.5,0,0,1,0,1Z" fill="#d1d3d4"></path><path d="M123.74,64.42h-19a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h19a.5.5,0,0,1,.5.5A.51.51,0,0,1,123.74,64.42Z" fill="#d1d3d4"></path><path d="M281.41,65.54a1,1,0,0,0,0,2A1,1,0,0,0,281.41,65.54Z" fill="#d1d3d4"></path><path d="M291.42,65.54a1,1,0,0,0,0,2A1,1,0,0,0,291.42,65.54Z" fill="#d1d3d4"></path><path d="M301.43,65.54a1,1,0,0,0,0,2A1,1,0,0,0,301.43,65.54Z" fill="#d1d3d4"></path></g></svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card my-2 rounded-0 border-0">
                    <div class="card-body mt-5 text-center text-success">
                        <h3 class="card-title mt-5">You haven't made any booking's yet</h3>
                        <p class="card-text">Let's help each other shall we ? from here you can start booking for a free. You'll get chance to make 5 bookings in a week.</p>
                        <a href="{{ route('user.bookings.create') }}" class="btn btn-outline-success btn-lg btn-block rounded-0">Book for free</a>
                    </div>
                </div>
            </div>
        @else
            @foreach ($bookings as $booking)
            <?php
                $bookingTimes = explode(" - ", $booking->time);
                $bookingStartTime = Carbon\Carbon::createFromFormat('Y-m-d h:ia', $booking->booking_date . $bookingTimes[0], 'Europe/London')->addMinutes(-10);
                $bookingEndTime = Carbon\Carbon::createFromFormat('Y-m-d h:ia', $booking->booking_date . $bookingTimes[1], 'Europe/London');

                $enableStartButton = $currentTime->greaterThanOrEqualTo($bookingStartTime) && $currentTime->lessThanOrEqualTo($bookingEndTime);

            ?>
            <div class="col-md-4 mb-5">
                <div class="card rounded-0 mb-5 my-2">
                    <p class="card-header rounded-0 py-2 fs-5">
                        <i class="far fa-user"></i> {{ $booking->user->name }}
                    </p>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong class="text-success mr-1">Booking for:</strong> {{ Carbon\Carbon::parse($booking->booking_date)->toFormattedDateString() }}</li>
                            <li class="list-group-item"><strong class="text-success mr-1">Gender:</strong> {{ $booking->gender }}</li>
                            <li class="list-group-item"><strong class="text-success mr-1">Age:</strong> {{ $booking->age }}</li>
                            <li class="list-group-item"><strong class="text-success mr-1">Day Shift:</strong> {{ $booking->shift }}</li>
                            <li class="list-group-item"><strong class="text-success mr-1">Time:</strong> {{ $booking->time }}</li>
                            <li class="list-group-item"><strong class="text-success mr-1">Duration:</strong> {{ $booking->duration }}min.</li>
                            <li class="list-group-item"><footer class="blockquote-footer text-muted mt-2"><cite title="Booked">{{ $booking->created_at->diffForHumans() }} </cite></footer></li>

                            @if ($enableStartButton)
                               <a class="btn btn-outline-success rounded-0 float-right" href="{{ route('user', $admin->id) }}"><i class="far fa-comments mr-2"></i> Start Meeting</a>
                            @else
                            <a class="btn btn-outline-success disabled rounded-0 float-right" href="{{ route('user', $admin->id) }}"><i class="far fa-comments mr-2"></i> Start Meeting</a>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

    </div>
</div>

@section('script')
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" defer></script>
<script>
    // Calendar
    $('#calendar input').datepicker({
        orientation: "top right",
        autoclose: true,
        todayHighlight: true,
        startDate: new Date(),
        format: "yyyy-mm-dd"
    });
    // Loop function for age
    var select = '';
    for (i=16;i<=100;i++){
            select += '<option val=' + i + '>' + i + '</option>';
        }
    $('#age').html(select);
    
    window.setInterval(function(){
        window.location.reload();  
    }, 180000);
</script>
@endsection
@endsection