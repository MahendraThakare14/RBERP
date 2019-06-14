<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
class UsersController extends Controller
{

	public function usergroup()
	{
		return view('user-group');		
	}

	public function usermaster()
	{
		$shows=DB::select("call usp_get_Group_Master()");
		$selects=DB::select("call usp_get_company_master()");
		return view('user-master',['selects'=>$selects,'shows'=>$shows]);
	}

	public function userrights()
	{
		$selects=DB::select("call usp_get_usr_login()");
		return view('user-rights',['selects'=>$selects]);
	}

	public function search(Request $req)
	{
		print_r($req->all()); exit();
		return view('user-rights');
	}

	public function editmenu()
	{
		return view('edit-menu');
	}

	public function grouprights()
	{
		$shows=DB::select("call usp_get_Group_Master()");
		return view('group-rights',['shows'=>$shows]);
	}

	public function menumaster()
	{
		 $module=DB::select("exec usp_get_Module_menu_master");
		 // $menu_parent=DB::select("exec usp_select_parent_menu_L");

		   $menu_parent=DB::select(DB::raw("exec usp_select_parent_menu_L :Module"),[
    ':Module' => "RBERP"]);
		    $menu_sequence=DB::select("exec usp_get_sequence_menu_master");
		     $menu_level=DB::select("exec usp_get_sequence_menu_master");

		// print_r($module); exit();
		// $menu_level=DB::select("call usp_get_level_menu_master()");
		// $menu_sequence=DB::select("call usp_get_sequence_menu_master()");
		// $menu_parent=DB::select("call usp_get_Parent_menu_master()");
		// $menu_type=DB::select("call usp_get_Type_menu_master()");
	// 	return view('menu-master',['module'=>$module,'menu_sequence'=>$menu_sequence,'menu_parent'=>$menu_parent,'menu_level'=>$menu_level,'menu_type'=>$menu_type]);

		return view('menu-master',['module'=>$module,'menu_parent'=>$menu_parent,'menu_sequence'=>$menu_sequence,'menu_level'=>$menu_level]);
}
    

    public function menu_master_insert(Request $request )
    {

 // print_r($request->all() ); exit();
    	$query=DB::select(DB::raw("exec USP_Menu_Master_Insert_L :Module_name, :mname,:pname,:mlevel,:msequence,:mtype,:maction,:mdisplay"),[
    ':Module_name' => $request->Module_name,
    ':mname' => $request->mname,
     ':pname' => $request->pname,
      ':mlevel' => $request->mlevel,
       ':msequence' => $request->msequence,
        ':mtype' => $request->mtype,
         ':maction' => $request->maction,
          ':mdisplay' => $request->mdisplay,
]);
return $query;

 // $success_msg = array('status'=>'success',"messege"=>"Data inserted sucessfully",'redirectUrl'=>'/menu-master');
 //    echo json_encode($success_msg);
    }

	public function monthlytarget()
	{
		return view('monthly-target');
	}

}
