@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h5 class="float-start mt-2 mb-4">My posts</h5>
                    <a href="/posts/create" type="button" class="btn btn-primary mt-2 mb-4 float-end">Create Post</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                     
                   @if (count($posts) > 0)
                    <table class="table table-striped table-responsive mt-4">
                        <tr>
                            <th>Title</th>
                            <th >Body</th>
                            <th colspan="2">Action</th>
                        </tr>
                        
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->posttitle }}</td>
                                    <td>{{ $post->postbody }}</td>
                                    <td>
                                        <a type="button" href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-primary mt-2">Edit</a>
                                    </td>
                                    <td>

                                        {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'POST', 'float-start']) !!}
                                        {{-- Add the hidden spoffing method and the submit btn --}}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {{-- The delete button --}}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger mt-2']) !!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                                <h6 class="mt-4 text-secondary">You have no posts yet!</h6>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
