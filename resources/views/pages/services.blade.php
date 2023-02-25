{{-- Extend the name of the layout/ more like including --}}
@extends('layouts.app')

{{-- We have to wrap out content into the section contect --}}
{{-- NOTE: -> The 'content' param is/must be the param 
    filled in the @yield option in the app.blade.php file 
--}}
@section('content')

    {{-- Title below is from an array  frm 'app\Http\Controllers\Auth' pagesController--}}
    <h1>{{$title}}</h1>
    <h2>This is the services page</h2>

    {{-- hecking if there is at least one value and loop through all --}}
    @if (count($services) > 0)
        @foreach ($services as $service)

            <ul class="list-group">
                <li class="list-group-item">{{$service}}</li>
            </ul>
            
        @endforeach
        
    @endif
    
@endsection