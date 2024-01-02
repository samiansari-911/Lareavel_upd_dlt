<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;


class StudentController extends Controller
{
    //
    public function data(){
        return view('welcome');
    }
    public function StudentRegisteration(){
        return view('StudentRegisteration');
    }
    public function create(Request $request){
    
       $request->validate([
        'name' =>  'required',
        'email' =>  'required | email',
        'address' =>  'required'
       ]);
         $data = new StudentModel();
      $data->name = $request['name'];
      $data->email = $request['email'];
      $data->address = $request['address'];
      $data->save();

       //    print_r($request->all());
    //    $data = compact('StudentRegisteration');
    //    return view('StudentRegisteration')->with($data);
    //     return view('StudentRegisteration');


    }
    public function user_view(){
        // return view('user_view');
        $data = StudentMOdel::all();
        $records = compact('data');
        return view('user_view')->with($records);
    }
    public function user_dlt($id){
        $user_Data = StudentModel::find($id);
        if(!is_null($user_Data)){
            $user_Data->delete();
            return redirect('user/view');
        }else{
            return redirect('user/view');
        }
    }
    public function user_edit($id){
    $user_Data = StudentModel::find($id);
    return view('update')->with(['user_Data'=>$user_Data]);  
    }
    public function user_update($id, Request $request){
        $data = StudentModel::find($id);
        $data->Name = $request['name'];
        $data->Email = $request['email'];
        $data->Address = $request['address'];
        $data->save();
        return redirect('user/view');
    }
}
