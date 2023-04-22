<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * This function below means that the user will not access any post function
     * /pages controlled by this controller before the user authenticates
     * 
     * If want to give access to others without authenticating, we add them 
     * to be except
     */

    public function __construct()
    {
        // No acccess to create, edit, delete, update, post with no auth
        // but can view all posts(index) and view single post(show) post without authentication
        $this->middleware('auth', ['except'=>['index', 'show']]);

    }
    
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
            'postbody' => 'required',
            'thumb_nail'=> 'image|nullable|max:6999'
            /**
             * 'image|nullable|max:1999' will make sure that the file selected is an
             * image but not other type, then nullable will make it optional to upload
             * an image and max will make sure that the image size should be only 1.9mb
             * and below.
             * The reason for this, is because most apache servers accept up to 2MBs of 
             * file size upload so this will eliminate the error in case user has a large
             * sized file
             *
             */
        ]);

        /**
         * First check if the user has selected a file and then make the file unique
         * with the addition of a timestamp value
        */
        if($request->hasFile('thumb_nail')){
            // First get the complete file name with the extention
            $fileNameWithExt = $request->file('thumb_nail')->getClientOriginalName();
            // Extracting the file name without the extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Extracting the extension from the file
            $fileExtension = $request->file('thumb_nail')->getClientOriginalExtension();
            // Combining the name + timestamp + extension
            $fileNameToUpload = $fileName.'_'.time().'.'.$fileExtension;
            // Storing the image
            $request->file('thumb_nail')->storeAs(
                'public/thumb_nail/', 
                $fileNameToUpload
            );

            /**
             * 'public/thumb_nail/' means that the sytem will store the images in the 
             * path -> storage/app/public/ which cannot be acced by the web pages
             * thus we have to create a link for it in the public folder
             * using the php artisan storage:link
             */
        }else{
            // If they didnt selecte the image, then we can store the default 'noimagefile.jp'
            // The default noimage.jpg can be downloaded and put in the storage
            // location of storage folder (innaccessible one)
            $fileNameToUpload = 'noimage.jpg';
        }
        

        // Creating or storing the data user enters
        $post = new Post;
        // Capturing data and pass it to the post class to store it
        $post->posttitle = $request->input('posttitle');

        /** 
         * After the authentication is integrated then, a logged in user id 
         * can easily be obtained using auth()->user()->id;
         * and that means we can store the post details and the user id who made 
         * the post
        */
        $post->user_id = auth()->user()->id;
        $post->postbody = $request->input('postbody');

        // Storing the image
        $post->thumb_nail = $fileNameToUpload;

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
        
        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error', 'You dont have permission to edit');

        }

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
            'postbody' => 'required',
            'thumb_nail'=> 'image|nullable|max:5999'
        ]);

        // Find the post of specific id and update it with the data that is entered
        $post = Post::find($id);

        // Updating the image
        if($request->hasFile('thumb_nail')){
            // First get the complete file name with the extention
            $fileNameWithExt = $request->file('thumb_nail')->getClientOriginalName();
            // Extracting the file name without the extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Extracting the extension from the file
            $fileExtension = $request->file('thumb_nail')->getClientOriginalExtension();
            // Combining the name + timestamp + extension
            $fileNameToUpload = $fileName.'_'.time().'.'.$fileExtension;
            // Storing the image
            $request->file('thumb_nail')->storeAs(
                'public/thumb_nail/', 
                $fileNameToUpload
            );

            /**
             * 'public/thumb_nail/' means that the sytem will store the images in the 
             * path -> storage/app/public/ which cannot be acced by the web pages
             * thus we have to create a link for it in the public folder
             * using the php artisan storage:link
             */
        }
        // Since if the user doesnt load another image then the else part will be nglctd


        // Capturing data and pass it to the post class to store it
        $post->posttitle = $request->input('posttitle');
        $post->postbody = $request->input('postbody');
        
        // Here we want to only upload if the user selects an image
        if($request->hasFile('thumb_nail')){
            $post->thumb_nail = $fileNameToUpload;
        }
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

        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error', 'Permission to delete denied');
        }

        // Also after deleting a post then its image should be deleted to from storage
        if($post->thumb_nail != 'noimage.jpg'){
            Storage::delete('public/thumb_nail/'.$post->thumb_nail);
        }

        // Deleting the post using the delete() function
        $post->delete();
        // Redirecting to the posts page(posts.index)
        return redirect('posts')->with('success', 'Post deleted successfully');
    }
}