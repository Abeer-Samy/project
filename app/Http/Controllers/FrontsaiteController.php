<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontsaiteController extends Controller
{
    function showHome(){
        return view('frontsite.home');
    }

    function  showAbout(){
        return view('frontsite.about');
    }
    function  showBlog(){
        return view('frontsite.blog');
    }
    function  showBlogDetails(){
        return view('frontsite.blogdetails');
    }
    function  showReservation(){
        return view('frontsite.reservation');
    }
    function  showGallery(){
        return view('frontsite.gallery');
    }
    function  showMenuFood(){
        return view('frontsite.menufood');
    }
    function  showStuff(){
        return view('frontsite.stuff');
    }
    function  showContact(){
        return view('frontsite.contact');
    }

}
