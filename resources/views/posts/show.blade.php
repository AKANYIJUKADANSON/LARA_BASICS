{{-- Extend the name of the layout/ more like including --}}
@extends('layouts.app')

{{-- We have to wrap out content into the section contect --}}
{{-- NOTE: -> The 'content' param is/must be the param 
    filled in the @yield option in the app.blade.php file 
--}}

@section('content')

  <a href="/posts" type="button" class="btn btn-outline-primary mt-2">Back</a>
  <h1>{{$post->posttitle}}</h1>
  <p><em>{{$post->postbody}}</em></p>
  <hr>
  <p class="text-primary"><b>Written on {{$post->created_at}}</b></p>


@endsection