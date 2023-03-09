<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Here the 'posts' is the directory and index is the index.blade.php file
        // return view('posts.index');

        // To use the model which has all the methods add, delete, update, post, create...., we import the model using its name space wc is 'App' with ts title/name of 'Posts' and use the Post::All() to have them in use here

        // Let's store all the post available in a variable and pass it to the index page and display it
        // The all() function is from models in this case the posts modl


        // Using sql to fetch the data
        // $posts = DB::select('select * from posts ');





        // =================Using eloquent
        // $posts = Post::all();

        // ~~~~~~~~~if we want to load post following a certain order, use orderby
        // *********Eg as below orderBy latest post created using the data
        // NOTE: That if we add these other clauses then have to add the get functin
        // $posts = Post::orderBy('created_at', 'asc')->get();

        // ~~~~~~~~~May be also if you want to search, could use the where clause
        // $posts = Post::where('posttitle', 'Business')->get();

        // ~~~~~~~~~To limit the number of posts to diplay
        // $posts = Post::orderBy('posttitle', 'desc')->take(1)->get();

        // ~~~~~~~~Pagination
        // But here to load the pagination marks then we have to use the {{$posts->links()}} in the page
        //  wea we want to paginate in thc case index.blade.php

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // adding a post
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating the request sent to this function
        $this->validate($request, [
            'posttitle' => 'required',
            'postbody' => 'required'
        ]);

        // Creating or storing the data user enters
        $post = new Post;
        // Capturing data and pass it to the post class to store it
        $post->posttitle = $request->input('posttitle');
        $post->postbody = $request->input('postbody');

        // Saving the poats created
        $post->save();

        // Redirecting the user to the posts list
        return redirect('posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // This function will access any post that will be selected using the special
        // id of that post and it can be implemented as this

        // NOTE: that we are using eloquent
        // TO DO: more on eloquent 
        $post = Post::find($id);
        //Creating page for the single post
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // First find the post to edit specifying it with its id
        $post = Post::find($id);

        // Then send the postz data to the editing page
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validating the request sent to this function
        $this->validate($request, [
            'posttitle' => 'required',
            'postbody' => 'required'
        ]);

        // Find the post of specific id and update it with the data that is entered
        $post = Post::find($id);
        // Capturing data and pass it to the post class to store it
        $post->posttitle = $request->input('posttitle');
        $post->postbody = $request->input('postbody');

        // Saving the poats created
        $post->save();

        // Redirecting the user to the posts list
        return redirect('posts')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Getting the post to delete using the specific id
        $post = Post::find($id);

        // Deleting the post using the delete() function
        $post->delete();
        // Redirecting to the posts page(posts.index)
        return redirect('posts')->with('success', 'Post deleted successfully');

    }
}