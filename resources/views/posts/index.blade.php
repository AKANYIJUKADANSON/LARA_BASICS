@extends('layouts.app')

@section('content')
    <h1>POSTS</h1>
    <a href="/posts/create" type="button" class="btn btn-outline-primary mt-2">Create Post</a>
    
    <div class="mb-4">
        @if (count($posts) > 0)
        {{-- If there are posts then loop through them and display --}}

        @foreach ($posts as $post)
            {{-- Add  div to load the posts title --}}
            <div class="well mt-4 p-4" style="border: 1px solid deepskyblue; ">
                <h3><a style="text-decoration: none" href="/posts/{{$post->id}}">{{$post->posttitle}}</a></h3>
                <small>{{$post->postbody}}</small>
                <hr>
                <small>Created On <span class="text-primary">{{$post->created_at}}</span></small>
            </div>
        @endforeach
        {{-- iF THE pagination is set in the controller then appears below --}}
            <div class="pagination mt-4">
                {{$posts->links()}}
            </div>
    @else
        <h2>No posts available !</h2>
    @endif
    </div>
    
@endsection