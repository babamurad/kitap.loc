<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        
        $about = Page::findOrFail(1);
        return view('admin.page.about', compact('about'));    
    }
}
