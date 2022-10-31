<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $carousels = Carousel::all();
        $count =$carousels->count();
        return view('admin.carousel.index', compact('carousels', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.carousel.create');
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
            'subtitle' => 'required',
            'img' => 'required|image',
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/carousel");
        }
        Carousel::create([
            'title' => $request->title,
            'subtitle' =>$request->subtitle,
            'img' => $img ? $img : null,
        ]);
        $request->session()->flash('success', 'Элемент карусели добавлен!');
        return redirect()->route('carousel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('admin.carousel.edit', compact('carousel'));
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
            'subtitle' => 'required',
            'img' => 'required|image',
        ]);
        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/carousel");
        }
        $carousel = Carousel::findOrFail($id);
        $carousel->update([
           'title' => $request->title,
           'subtitle' => $request->subtitle,
           'img' => $img,
        ]);
        $request->session()->flash('success', 'Изменения сохранены!');
        return redirect()->route('carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->destroy($id);
        return redirect()->route('carousel.index')->with('success', 'Элемент карусели удален!');
    }
}
