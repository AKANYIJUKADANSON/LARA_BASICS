<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // After creating a relation ship btn user and post model
        // then we can easily access post made by that specific user (logged in)

        // Id for the logged in user
        $user_id = auth()->user()->id;

        /**
         * Finding the user so that we can get all the posts made by this specificser 
         * only since a relationship was established between the User and Post models
         */
        $user = User::find($user_id);

        // Finding the posts using the user model

        /**
         * The value my_posts is the function that is creating the relationship 
         * in the User model (must be the same function name)
         */
        $posts = $user->my_posts;

        /**
         * As we head to the dashboard, we will use the user obtained to get the 
         * posts that only belong to them
         */
        // return view('dashboard')->with('user', $user);
        return view('dashboard')->with('posts', $posts);
    }
}
