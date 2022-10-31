<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Carousel;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        $about = About::find(1);
        $gat1 = About::find(2);
        $gat2 = About::find(3);
        $gat3 = About::find(4);
        $gat4 = About::find(5);
        $posts = Post::all();
        return view('front.home', compact('carousels', 'about', 'gat1', 'gat2', 'gat3', 'gat4', 'posts'));
    }
}
