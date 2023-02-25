@extends('layouts.app')

@section('content')
    <h1>POSTS</h1>
    
    @if (count($posts) > 0)
        {{-- If there are posts then loop through them and display --}}

        @foreach ($posts as $post)
            {{-- Add  div to load the posts title --}}
            <div class="well bg-secondary mt-4">
                <h3><a style="text-decoration: none" href="/posts/{{$post->id}}">{{$post->posttitle}}</a></h3>
                <small>{{$post->postbody}}</small>
                <small>{{$post->created_at}}</small>
            </div>
        @endforeach
        {{-- iF THE pagination is set in the controller then appears below --}}
            {{-- {{$posts->links()}} --}}
    @else
        <h2>No posts available !</h2>
    @endif
    
@endsection