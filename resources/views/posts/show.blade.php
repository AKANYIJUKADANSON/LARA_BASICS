{{-- Extend the name of the layout/ more like including --}}
@extends('layouts.app')

{{-- We have to wrap out content into the section contect --}}
{{-- NOTE: -> The 'content' param is/must be the param 
    filled in the @yield option in the app.blade.php file 
--}}

@section('content')

  <a href="/posts" type="button" class="btn btn-sm btn-outline-primary mt-2">Back</a>

  {{-- displaying a single post --}}
  <h1>{{$post->posttitle}}</h1>
  <p><em>{{$post->postbody}}</em></p>
  <hr>
  <p class="text-primary"><b>Written on {{$post->created_at}}</b></p>

  <a type="button" href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-primary">Edit</a>

  {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'POST', 'class'=>'float-end']) !!}
    {{-- Add the hidden spoffing method and the submit btn --}}
    {!! Form::hidden('_method', 'DELETE') !!}
    {{-- The delete button --}}
    {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
  {!! Form::close() !!}



@endsection