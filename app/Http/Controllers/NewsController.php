<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $newses = News::orderby('id', 'DESC')->paginate(5);

        return view('admin.news.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.news.create');
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
            'img' => 'nullable|image',
        ]);

        if ($request->hasFile('img')) {
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("images/{$folder}");
        }

        $request['slug'] = Str::slug($request->title);
        News::create([
            'title' => $request->title,
            'content' => $request['content'],
            'slug' => Str::slug($request->title),
            'img' => $img ? $img : null,
        ]);

        $request->session()->flash('success', 'Новость добавлена!');
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('front.news', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $news = News::findorfail($id);

        if ($request->hasFile('img')) {
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("images/{$folder}");
        }

        $news->update([
            'title' => $request->title,
            'content' => $request['content'],
            'img' => $img ? $img : null,
        ]);

        $request->session()->flash('success', 'Изменения сохранены!');
        return redirect()->route('front.news', compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
//        dd($id);
        $news = News::findorfail($id);
        $news->destroy($id);
        return redirect()->route('news.index')->with('success', 'Новость удалена!');
    }
}
