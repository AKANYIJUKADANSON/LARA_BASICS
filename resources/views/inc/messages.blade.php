
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mt-2 alert-dismissible">
        {{-- Notification message to display --}}
        {{$error}}

        <!-- Button to close/Dismiss the alert -->
        <button class="btn-close" type="button" aria-label="close" data-bs-dismiss="alert" ></button>
    </div>
    @endforeach
@endif

@if (session('success'))

    <div class="alert alert-success alert-dismissible mt-2">
        {{-- Notification message to display --}}
        {{session('success')}}

        <!-- Button to close/Dismiss the alert -->
        <button class="btn-close" type="button" aria-label="close" data-bs-dismiss="alert" ></button>
    </div>
    
@endif

@if (session('error'))
    <div class="alert alert-danger mt-2 alert-dismissible">
        {{-- Notification message to display --}}
        {{session('error')}}

        <!-- Button to close/Dismiss the alert -->
        <button class="btn-close" type="button" aria-label="close" data-bs-dismiss="alert" ></button>
    </div>
@endif