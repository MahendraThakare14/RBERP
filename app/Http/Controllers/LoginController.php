<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Validator;
use Redirect;
class LoginController extends Controller
{
     

  public function checklogin(Request $request){

  
if(!$request->session()->exists('empcode')){
               return view('login');
       }else{
                return redirect('/dashboard');
}

}

   public function login(Request $request){


//print_r($request->all()); exit();
			    $validator = Validator::make($request->all(), [
			    'email' => 'required|max:100',
			    'password' => 'required|max:100',
			    ]);

			   if ($validator->fails()) {
			    return redirect('/')
			    ->withErrors($validator)
			    ->withInput();
			   }else{
          


           // $query=DB::select("exec USP_Select_login($request->email,$request->password)");

           //      print_r($query); exit();

                $query=DB::select(DB::raw("exec USP_Select_login :email, :password"),[
    ':email' => $request->email,
    ':password' => $request->password,
]);
             
             //DB::select('exec my_stored_procedure(?,?,..)',array($Param1,$param2));

             if($query){
             	$val=$query[0];
				$request->session()->flush();
				$request->session()->put('userid',$val->userid);
				$request->session()->put('username',$val->username);
				$request->session()->put('empcode',$val->empcode);
				$request->session()->put('groupid',$val->groupid);
				$request->session()->put('Is_Active',$val->Is_Active);
				$request->session()->put('email',$val->email);

				                         
               return redirect()->intended('dashboard');
				 //return redirect()->intended('employe-list');
            
               }else{   Session::flash('msg', "Invalid email or password. Please Try again! ");

                         return Redirect::back();
               
                   }




           }
   }


  public function logout(Request $req) {
  $req->session()->flush();
   return redirect('/');
}


// public function demo(){
// 	 $data=DB::select("exec usp_load_city"); 
// 	 print_r($data);
	  // exit();

	// print("india");

	// echo "maharashtra";exit();
	 // return view('demo',['data'=>$data]);
	//return view('demo');
// }



}
