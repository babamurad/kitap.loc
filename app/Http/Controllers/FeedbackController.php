<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fcount = Feedback::where('answer', '0')->count();
        $feedbacks = Feedback::where('answer', '0')->orderby('id', 'DESC')->paginate(3);
        return view('admin.feedback.index', compact('feedbacks', 'fcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $request->session()->flash('success', 'Hatyňyz ugradyldy!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedbacks = Feedback::where('answer', '1')->orderby('id', 'DESC')->paginate(3);
        return view('admin.feedback.archive', compact('feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $del = 1;
        $feedback = Feedback::FindOrFail($id);

        if($del){
            $feedback->answer = 1;
            $mes = 'Отправлен в архив!';    
        } else {
            $feedback->answer = 0;
            $mes =  'Восстановлен!';
        }
        
        $feedback->update();
        return redirect()->back()->with('success', $mes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect()->back()->with('success', 'Сообщение удалено!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive($id)
    {  
        dd('archive');
        $feedbacks = Feedback::where('answer', '1')->orderby('id', 'DESC')->paginate(3);
        return view('admin.feedback.archive', compact('feedbacks')); 
    }

    public function goarchive(Request $request, $id)
    {
        $del = $request->flag;
        $feedback = Feedback::FindOrFail($id);
        if($del){
            $feedback->answer = 1;
            $mes = 'Отправлен в архив!';    
        } else {
            $feedback->answer = 0;
            $mes =  'Восстановлен!';
        }
        
        $feedback->update();
        return redirect()->back()->with('success', $mes);
    }    
}
