<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'national_id'=>'required|max:16',
            'phone'=>'required|numeric|regex:/(01)\d{9}/|digits:11|unique:students',
            'stname'=>'required|min:16|max:50|string',
            'stusername'=>'required|email:rfc,dns|unique:students',
            'stpassword' => ['required', 'string', 'min:8', 'confirmed'],
            'nationality'=>'required|min:4|max:10|string',
            'level'=>'required|min:1|max:1',
            'academic_number'=>'required|max:16',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>200,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
                $student=new Student;
                $student->ssn=$request->input('national_id');
                $student->phone=$request->input('phone');
                $student->stname=$request->input('stname');
                $student->stusername=$request->input('stusername');
                $student->stpassword=$request->input('stpassword');
                $student->nationality=$request->input('nationality');
                $student->level=$request->input('level');
                $student->acadamic_code=$request->input('academic_number');
                $student->password=$request->input('password')
                ;
                $student->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Student added Successfully',
                ]);
            }

    }
}
