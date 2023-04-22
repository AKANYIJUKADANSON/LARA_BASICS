<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * This function below means that all the user will not access any page 
     * controlled by this controller before the user authenticates
     * 
     * To make some pages exception, we an exception
     */
     
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except'=>['services']]);

    // }

    // Index page
    public function index(){
        $xx = 'INDEX';
        /**
         * PASSING VALUES
         * Here any valu or variable can be passed to the pages which is achieved using the With option
         * Syntax ->with($key, $value)
         * NB: name of the variable must act as the key ie if variable is '$jack1' then the key should be 'jack1'
         * 
         * Passing this variable jst use it by use of the echo function or using {{$variableName}}
         */ 
        return view('pages.index')->with('xx', $xx);
    }

    // About page
    // public function about(){
    //     $aboutTitle = 'ABOUT!';
    //     return view('pages.about')->with('aboutTitle', $aboutTitle);
    // }



    // Services page
    public function services(){
        // Passing an array
        $data = array(
            'title' => 'Services',
            // creating a list of value in an array
            'services' => ['Mobile App Development', 'Web dev', 'Graphics']
        );
        return view('pages.services')->with($data);
    }

    // About page
    public function contact(){
        $contactTitle = 'CONTACTS';
        return view('pages.contact')->with('contactTitle', $contactTitle);
    }


    // Login page
    public function login(){
        $loginTitle = "Login";
        return view('auth.login_ui')->with('loginTitle', $loginTitle);
    }

    // Register page
    public function register(){
        $registerTitle = "Register";
        return view('auth.register_ui')->with('registerTitle', $registerTitle);
    }

    // myblog page
    public function blog(){
        $blogTitle = "Blog";
        return view('pages.blog')->with('blogTitle', $blogTitle);
    }

        // myblog page
        public function about(){
        $aboutTitle = "About";
            return view('pages.about')->with('aboutTitle', $aboutTitle);
        }

}
