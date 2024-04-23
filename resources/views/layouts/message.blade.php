@if (session('status'))
    <div class="alert alert-success rounded-0">
        {{ session('status') }}
    </div>
@endif