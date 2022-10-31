<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::orderby('id', 'DESC')->paginate(4);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cover' => 'required|image',
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $imageName = $request->file('cover')->storeAs("cover", $file->getClientOriginalName());
            

//            $file->move(\public_path('cover/',$imageName));

            $post = new Post([
                'title' => $request->title,
                'content' => $request['content'],
                'cover' => $imageName ? $imageName : null,
            ]);
            $post->save();
        }
        if ($request->hasFile('images')) {

            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = $file->storeAs("images", time().'_'.$file->getClientOriginalName());
                $request['post_id'] = $post->id;
                $request['image'] = $imageName;
                Image::create($request->all());
            }
        }

        $request->session()->flash('success', 'Новость добавлена!');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $posts = Post::all();
        $post = Post::FindOrFail($id);
        $images = Image::where('post_id', $id)->get();
        // dd($images);
        return view('front.news', compact('post', 'posts', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('cover')) {
            if (Storage::exists('storage/'.$post->cover)){
                Storage::delete($post->cover);           
            }
            $file = $request->file('cover');
            $imgName = $request->file('cover')->storeAs("cover", $file->getClientOriginalName());
            $post->cover = $imgName;
        }

        if ($request->hasFile('images')) {
// dd($request->images);
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = $file->storeAs("images", time().'_'.$file->getClientOriginalName());
                $request['post_id'] = $post->id;
                $request['image'] = $imageName;
                Image::create($request->all());
            }
        }

        $post->update();

        $request->session()->flash('success', 'Новость изменена!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $dpost =  Post::findOrFail($post->id);       
        if (file_exists('storage/'.$post->cover)){
             Storage::delete($post->cover);           
        }
        $images = Image::where('post_id', $post->id)->get();
        foreach ($images as $image){
             
            if (Storage::exists($image->image)){
                Storage::delete($image->image);
            }
        }
        $dpost->destroy($post->id);
        return redirect()->route('posts.index')->with('success', 'Новость удалена!');
    }

    public function deleteimage($id)
    {

        $images = Image::findOrFail($id);
        // dd($images);
        if (Storage::exists('images/'.$images->image)){
            dd($images);
            Storage::delete('images/'.$images->image);
        }
        Image::find($id)->delete();
        return back();
    }

    public function deletecover($id)
    {

        $post = Post::findOrFail($id);
//        dd($post);
        $cover = Post::findOrFail($id)->cover;
        $post->update([
           'title' => $post->title,
           'content' => $post->content,
           'cover' => null,
        ]);
        $post->save();


        if (Storage::exists('images/'.$cover)){
            Storage::delete('images/'.$cover);
        }
        return back();
    }
}
