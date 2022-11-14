<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.student.index');
    }

    public function fetchstudents()
    {
        $students = Student::orderby('id', 'DESC')->get();//->paginate(4);
        return response()->json([
            'students'=>$students,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required|max:191',
        //     'email' => 'required|email',
        //     'phone' => 'required|max:8',
        //     'course' => 'required',
        // ]);
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'email' => 'required|email',
            'phone' => 'required|max:8',
            'course' => 'required',    
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors(),
            ]);
        }
        else
        {
        $student = new Student;  
        $student->name = $request->input('name');      
        $student->email = $request->input('email');      
        $student->phone = $request->input('phone');      
        $student->course = $request->input('course');   
        $student->save();
        return response()->json([
            'status'=>200,
            'message'=>'Student Added Successfully',
        ]);             
        }
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        if ($student) {
            return response()->json([
                'status'=>200,
                'student' => $student,
            ]);        
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);        
        }
    }

    /** */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'email' => 'required|email',
            'phone' => 'required|max:8',
            'course' => 'required',    
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors(),
            ]);
        }
        else
        {            
            $student = Student::findOrFail($id); 
            if ($student) {
                $student->name = $request->input('name');      
                $student->email = $request->input('email');      
                $student->phone = $request->input('phone');      
                $student->course = $request->input('course');   
                $student->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Student Updated Successfully',
                ]);      
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Student Not Found',
                ]);        
            }
                       
        }
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Student Deleted Successfully',
        ]); 
    }
}
