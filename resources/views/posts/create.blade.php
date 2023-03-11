{{-- Extend the name of the layout/ more like including --}}
@extends('layouts.app')

{{-- We have to wrap out content into the section contect --}}
{{-- NOTE: -> The 'content' param is/must be the param 
    filled in the @yield option in the app.blade.php file 
--}}

@section('content')


  <h1>Creating a post</h1>

  {!! Form::open(['route' => 'posts.store', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
      {{ Form::label('Post Title')}}
      {{-- syntax: $name, $value(could be empty), otherOptions like attributes of a field --}}
      {{ Form::text('posttitle', '', ['class'=>'form-control' , 'placeholder' => '']) }}
    </div>

    <div class="form-group">
      {{ Form::label('Body')}}
      {{ Form::textarea('postbody', '', ['id'=>'article-ckeditor','class' => 'form-control' , 'placeholder' => '']) }}
    </div>

    {{-- Image upload --}}
    <div class="form-group mt-4">
      {{ Form::file('thumb_nail')}}
    </div>

    <div class="form-group">
      {{ Form::submit('Submit', ['class'=>'btn btn-small bg-warning text-white mt-4']) }}
    </div>
    

  {!! Form::close() !!}

@endsection