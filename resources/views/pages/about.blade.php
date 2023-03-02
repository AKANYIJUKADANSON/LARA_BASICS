{{-- Extend the name of the layout/ more like including --}}
@extends('layouts.app')

{{-- We have to wrap out content into the section contect --}}
{{-- NOTE: -> The 'content' param is/must be the param 
    filled in the @yield option in the app.blade.php file 
--}}
@section('content')

    <h1>{{$aboutTitle}}</h1>
    <h2>This is the about page</h2>


    {!! Form::open(['route' => 'posts.store']) !!}
    <div class="form-group">
      {{ Form::label('Post Title')}}
      {{-- syntax: $name, $value(could be empty), otherOptions like attributes of a field --}}
      {{ Form::text('title', '', ['class'=>'form-control' , 'placeholder' => '']) }}
    </div>

    <div class="form-group">
      {{ Form::label('Body')}}
      {{ Form::textarea('body', '', ['id'=>'article-ckeditor','class' => 'form-control' , 'placeholder' => '']) }}
    </div>

    <div class="form-group">
{{ Form::submit('Submit', ['class'=>'btn btn-small bg-warning text-white mt-4']) }}
    </div>
  {!! Form::close() !!}

@endsection
