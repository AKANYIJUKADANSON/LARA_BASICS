{{-- Extend the name of the layout/ more like including --}}
@extends('layouts.app')

{{-- We have to wrap out content into the section contect --}}
{{-- NOTE: -> The 'content' param is/must be the param 
    filled in the @yield option in the app.blade.php file 
--}}
@section('content')

    <h1>{{$contactTitle}}</h1>
    <h2>This is the about page</h2>

@endsection