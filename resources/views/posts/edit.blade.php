{{-- Extend the name of the layout/ more like including --}}
@extends('layouts.app')

{{-- We have to wrap out content into the section contect --}}
{{-- NOTE: -> The 'content' param is/must be the param 
    filled in the @yield option in the app.blade.php file 
--}}

@section('content')


  <h1>Edit post</h1>

  {{-- Since the form routes to the function update() it will be in need of two parameters
    that is the $request and the $id parameters so we shall make an array of the route
    AND  the method should be PUT not post(remember by default its always post so we gat to change it) --}}

  {!! Form::open(['route'=> ['posts.update', $post->id], 'method'=>'PUT']) !!}
    <div class="form-group">
      {{ Form::label('Post Title')}}
      {{-- syntax: $name, $value(could be empty), otherOptions like attributes of a field --}}
      {{ Form::text('posttitle', $post->posttitle, ['class'=>'form-control' , 'placeholder' => '']) }}
    </div>

    <div class="form-group">
      {{ Form::label('Body')}}
      {{ Form::textarea('postbody', $post->postbody, ['id'=>'article-ckeditor','class' => 'form-control' , 'placeholder' => '']) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Edit', ['class'=>'btn btn-small bg-warning text-white mt-4']) }}
    </div>

  {!! Form::close() !!}

@endsection