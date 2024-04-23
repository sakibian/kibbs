<div class="form-group row">
    <label for="shift" class="col-md-4 col-form-label text-md-right">{{ __('Shifts') }}</label>

    <div class="col-md-6">
        <select class="form-select form-control @error('shift') is-invalid @enderror"
            id="shift" name="shift" value="{{ old('shift') }}" required autocomplete="shift"
            autofocus aria-label="shift">
            <option selected value="">Select Shifts</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
            <option value="Evening">Evening</option>
        </select>
        
        @error('shift')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Times') }}</label>

    <div class="col-md-6">
        <div class="input-group mb-3">
            <select class="form-select session-duration form-control @error('duration') is-invalid @enderror"
                id="time_duration" name="duration" value="{{ old('duration') }}" required autocomplete="duration"
                autofocus aria-label="Session duration">
                <option selected value="">Select Duration</option>
                <option value="15">15min</option>
                <option value="30">30min</option>

                @error('duration')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </select>

            <select class="form-select session-times form-control @error('time') is-invalid @enderror"
               id="time_slots" name="time" value="{{ old('time') }}" required autocomplete="time"
                autofocus aria-label="Session time">
                <option selected value="">Select Time</option>
                @foreach ($times as $slot)
                    <option class="d-{{ $slot->time_duration }} {{ $slot->time_shift }}" 
                        @if($slot->is_unavailable)
                            disabled
                        @endif
                        value="{{ $slot->time_slot }}">{{ $slot->time_slot }}</option>
                @endforeach

                @error('time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </select>
            
        </div>
    </div>
</div>