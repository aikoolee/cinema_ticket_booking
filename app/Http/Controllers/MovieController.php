<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::all();
        
        return view('movies', compact('movies'));
    }
    
    public function book(Movie $movie) {
        return view('book', compact('movie'));
    }  
}
