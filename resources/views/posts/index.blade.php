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
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="/storage/thumb_nail/{{$post->thumb_nail}}" alt="Image" style="width: 100%;">
                    </div>
    
                    <div class="col-md-8 col-sm-8">
                        <h3><a style="text-decoration: none" href="/posts/{{$post->id}}">{{$post->posttitle}}</a></h3>
                        <small>{{$post->postbody}}</small>
                        <hr>
                        <small>Created On <span class="text-primary">{{$post->created_at}}</span></small>
    
                        {{-- Since we have the relationship between User and Post models
                            (by the functions user and my_posts)then we can get any field of user with the model class Post that is represented by variable $post in this page--}}
    
                        <small>by <span class="text-primary">{{$post->user->name}}</span></small>
                    
                    </div> 

                </div>               
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