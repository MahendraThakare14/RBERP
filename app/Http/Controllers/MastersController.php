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
use App\CustomValidation;
use Excel;


class MastersController extends Controller
{

   //**employee-master** 

	public function aspxdata()

	{

		$users=DB::select("exec usp_get_Reporting_master");
		$selects=DB::select("exec usp_get_designation_master");
		$insert=DB::select("exec usp_get_department_master");
		return view ('employee-master',['users'=>$users,'selects'=>$selects,'insert'=>$insert]);
		//return view('employee-master');
	}
	public function employee_master_submit(Request $request,CustomValidation $validator)
	{
		 $userid=Session::get('userid');
		  $ipaddress = $_SERVER['REMOTE_ADDR'];
	// print_r($ipaddress);exit();
		$data = array();
		$error = array();
		$parameters['REQUEST'] = $request->all();
		$parameters['VALIDATIONS'] = array(
			'REQUIRED_VALIDATIONS'=>array('empname'=>'Please Enter Employee Name','empcode'=>'Please Enter Employee Code','companyname'=>'Please Enter Company Name','email'=>'Please Enter Email','address'=>'Please Enter Address','DOB'=>'Please Enter DOB','mobile'=>'Please Enter Mobile','reporting_authority'=>'Please Select Reporting Manager','reporting_authority'=>'Please Select Reporting Manager','date_of_joining'=>'Please Select DOJ','designation_id'=>'Please Select Designation','band'=>'Please Select Band','department'=>'Please Select department'));
		extract($validator->validate_required($parameters));
		if(count($error) === 0){


			$query=DB::select(DB::raw("exec USP_InsEmployee_Master :Emp_Name,:Emp_Code,:Company_Id,:Email_Id,:Address,:DOB,:Mobile,:Reporting_emp,:DOJ,:Designation_Id,:Band,:Department_Id,:CTC,:Variable,:userid,:ip"),[
				':Emp_Name' => $request->empname,
				':Emp_Code' => $request->empcode,
				':Company_Id' => $request->companyname,
				':Email_Id' => $request->email,
				':Address' => $request->address,
				':DOB' => $request->DOB,
				':Mobile' => $request->mobile,
				':Reporting_emp' => $request->reporting_authority,
				':DOJ' => $request->date_of_joining,
				':Designation_Id' => $request->designation_id,
				':Band' => $request->band,
				':Department_Id' => $request->department,
				':CTC' => $request->ctc,
				':Variable' => $request->variable,
				':userid' =>$userid, 
				':ip' =>$ipaddress, 
			]);
			$success_msg = array('status'=>'success',"messege"=>"Data inserted sucessfully",'redirectUrl'=>'/relationship');
			echo json_encode($success_msg);
		}else{
			echo json_encode($error);

      // print_r($request->all()); exit();


    	//print_r($query); exit();
// return $query;
		}
	}


	public function employee_master_update(Request $request,CustomValidation $validator)
	{
		$data = array();
		$error = array();
		$parameters['REQUEST'] = $request->all();
		$parameters['VALIDATIONS'] = array(
			'REQUIRED_VALIDATIONS'=>array('u_empname'=>'Please Enter Employee Name','u_companyname'=>'Please Enter Company Name','u_email'=>'Please Enter Email','u_address'=>'Please Enter Address','u_dob'=>'Please Enter DOB','u_mobile'=>'Please Enter Mobile'));
		extract($validator->validate_required($parameters));
		if(count($error) === 0){


			$query=DB::select(DB::raw("exec USP_UpdEmployee_Master :emp_id,:Emp_Name,:Emp_Code,:Company_Id,:Email_Id,:Address,:DOB,:Mobile,:Reporting_emp,:DOJ,:Designation_Id,:Band,:Department_Id,:CTC,:Variable"),[
				':emp_id' => $request->u_EmpId,
				':Emp_Name' => $request->u_empname,
				':Emp_Code' => $request->u_empcode,
				':Company_Id' => $request->u_companyname,
				':Email_Id' => $request->u_email,
				':Address' => $request->u_address,
				':DOB' => $request->u_dob,
				':Mobile' => $request->u_mobile,
				':Reporting_emp' => $request->u_reporting_authority,
				':DOJ' => $request->u_date_of_joining,
				':Designation_Id' => $request->u_Designation_id,
				':Band' => $request->u_band,
				':Department_Id' => $request->u_department,
				':CTC' => $request->u_ctc,
				':Variable' => $request->u_variable,
			]);

			$success_msg = array('status'=>'success',"messege"=>"Data Updated sucessfully",'redirectUrl'=>'/employee-list');
			echo json_encode($success_msg);

           print_r($request->all()); exit();
		}

		else{
			echo json_encode($error);




    	//print_r($query); exit();
// return $query;
		}
	}

	// public function employ_master(Request $req)
	// {
	// 	DB::statement("call Insert_empolyee_master(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($req->empname,$req->empcode,$req->companyname,$req->email,$req->address,$req->DOB,$req->mobile,$req->department,$req->reporting_authority,$req->date_of_joining,$req->designation,$req->band,$req->Is_Active,$req->ctc,$req->variable));
	// 	return Redirect('employee-master');
	// }
//**bank-master*-*-----------*********** 
	public function bankmaster()
	{
		$smsdata=DB::select("call usp_get_bankmaster()");
		return view('bank-master',['smsdata'=>$smsdata])->with('no', 1);	
	} 
	public function bank_master(Request $req)
	{

		DB::statement("call Insert_Bank_Master(?,?,?,?,?)",array($req->Bank_Name,$req->Bank_Address,$req->Bank_Code,$req->Document1,$req->Document2));
		return Redirect('bank-master');
	}
	public function bank_master_edit(Request $req)
	{

		$filename='';
		$filename2='';
		$destinationPath = public_path('/images');     

		if($req->file_documant1){
			$filename=$req->file_documant1;
		}else{
			$filename=$this->files_fn($req->file('Pop_Document1'));
		}
		if($req->file_documant2){
			$filename2=$req->file_documant2;
		}else{
			$filename2 = $this->files_fn($req->file('Pop_Document2'));
		}
		DB::select("call Update_bank_Master(?,?,?,?,?,?)",array($req->Pop_Bank_Id,$req->Pop_Bank_Name,$req->Pop_Bank_Address,$req->Pop_Bank_Code,$filename,$filename2));
		return Redirect('bank-master');
	}
	public function files_fn($file)
	{
		$filename='';
		$destinationPath = public_path('/images');
		if($file){
			$filename=time().'.'.$file->getClientOriginalExtension();
			$file->move($destinationPath, $filename);
			return $filename;
		}else{
			return $filename;
		}
	}

     //**break-master**
	public function breakmaster()
	{
		$smsdata=DB::select("call usp_get_breakmaster()");

		return view('break-master',['smsdata'=>$smsdata]);
	}
	public function break_master(Request $req)
	{
		DB::statement("call Insert_break_timemaster(?,?,?)",array($req->Break_Type,$req->Time,$req->Is_Active));
		return Redirect('break-master');
	}
     //**state-master**
	public function statemaster()
	{
		$smsdata=DB::select("call usp_state_master()");
		return view('state-master',['smsdata'=>$smsdata]);
	}
	public function state_master(Request $req)
	{
		DB::statement("call Insert_state_master(?,?)",array($req->state_name,$req->Is_active));
		return Redirect('state-master');
	}
//**city-master**------------*****************
	public function citymaster()
	{
		$users=DB::select("call usp_get_statemaster()");
		$smsdata=DB::select("call usp_get_citymaster()");
		return view('city-master',['users'=>$users,'smsdata'=>$smsdata])->with('no', 1);
	}
	public function city_master(Request $req)
	{
		DB::statement("call Insert_city_master(?,?,?)",array($req->city_name,$req->state_id,$req->is_active));
		return Redirect('city-master');
	}
//**designation-master****-------************
	public function designationmaster()
	{
		$smsdata=DB::select("call usp_get_designation_master()");
		return view('designation-master',['smsdata'=>$smsdata])->with('no', 1);
	}
	public function designation_master(Request $req)
	{
	//print_r($req->Designation_Id); exit();
		DB::statement("call Update_designation_Master(?,?)",array($req->Designation_Id,$req->Designation));
		return Redirect('designation-master');
	}
//**employe-list*******************-***-
	public function employelistmaster()
	{
		$smsdata=DB::select("exec USp_DispEmployee_List");
		return view('employe-list',['smsdata'=>$smsdata])->with('no', 1);
	}
//***-*-*-*-*-*-*-*-*-*-*-*edit-employe-list**
	public function edit_employelist_master()
	{	
		return view('edit-employe-list');
	}
	public function table_edit($id)
	{
		//print_r($id); exit();
		// $shows=DB::select("call usp_get_company_master()");
		$updates=DB::select("exec usp_get_Reporting_master");
		$masters=DB::select("exec usp_get_designation_master");
		$insert=DB::select("exec usp_get_department_master");


   // $user=DB::select(DB::raw("exec usp_show_empolyee_list :id"),[':id' => $id->id]);
 // $user=DB::select(DB::raw("exec usp_show_empolyee_list :id"),[':id' => $id->id,]);


		$user=DB::select(DB::raw("exec usp_show_empolyee_list :id"),[
			':id' => $id,
		]);

        // print_r($user); exit();


       // $user= DB::select('exec usp_show_empolyee_list(?)',array($id))[0];
       // print_r($user); exit();
		return view('edit-employe-list',['user'=>$user,'updates'=>$updates,'masters'=>$masters,'insert'=>$insert]);
	}
	public function employe_master_editlist(Request $req)
	{
		DB::select('call Update_employee_Master(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($req->u_EmpId,$req->u_empname,$req->u_empcode,$req->u_companyname,$req->u_email,$req->u_address,$req->u_dob,$req->u_mobile,$req->u_department,$req->u_reporting_authority,$req->u_date_of_joining,$req->u_designation,$req->u_band,$req->u_Is_Active,$req->u_ctc,$req->u_variable));
		return Redirect('employee-list');
	}
//**-*-*-*-*-*-*-*-*-*lead status master
	public function leadstatusmaster()
	{
		$users=DB::select("call usp_get_leadstatus_master()");
		return view('leadstatus-master',['users'=>$users]);
	}
	public function leadstatus_master(Request $req)
	{
		DB::statement("call Insert_lead_statusmaster(?,?)",array($req->Lead_Status,$req->Is_Active));return Redirect('leadstatus-master');
	}
//***-*-*-*-*-*-*-*-*-*-product master
	public function productmaster()
	{
		$users=DB::select("call usp_get_product_master()");
		return view('product-master',['users'=>$users]);
	}
	public function product_master(Request $req)
	{
		DB::statement("call Insert_product_master(?,?,?)",array($req->Product_Name,$req->Document,$req->Is_Active));
		return Redirect('product-master');
	}
//**-*-*-*-*-*-*-*-*-*-*profession master
	public function professionmaster()
	{
		$users=DB::select("call usp_get_professionmaster()");
		return view('profession-master',['users'=>$users]);
	}
	public function profession_master(Request $req)
	{
	//print_r($req->all());exit();
		DB::statement("call Insert_profession_master(?,?)",array($req->Profession_Name,$req->Is_Active));
		return Redirect('profession-master');
	}
//***-*-**--*-*-*-*-*-*-*-Role master
	public function rolemaster()
	{
		return view('role-master');
	}
//**-*-*-*-*--**-*-Associate-Master
	public function associatemaster()
	{
		$assign=DB::select("call usp_get_assing_empmaster()");
		$smsdata=DB::select("call usp_get_product_master()");
		$lead=DB::select("call usp_get_leadcity_master()");
		return view('associate-master',['smsdata'=>$smsdata,'lead'=>$lead,'assign'=>$assign])->with('no', 1);
	}
	public function associate_master(Request $req)
	{
		//print_r($req->all());exit();	
		DB::statement("call Insert_associate_master (?,?,?,?,?,?,?,?,?)",array($req->Broker_id,$req->Broker_Name,$req->Contact_No,$req->PanNo,$req->email,$req->Emp_Code,$req->city_Id,$req->remark,$req->Is_Active));
		return Redirect('associate-master');

	}
	public function associatelist()
	{
		$assign=DB::select("call usp_get_assing_associate()");
		$associate=DB::select("call usp_get_associate_list()");
		$city=DB::select("call usp_get_leadcity_master()");	
		return view('associate-list',['assign'=>$assign,'associate'=>$associate,'city'=>$city])->with('no', 1);
	}
	public function associate_list(Request $req)
	{ 
		$va=0;
		if(isset($req->m_Is_Active)){
			$va=1;
		}else{
			$va=0;
		}
		//print_r($req->all());exit();
		DB::statement('call Update_associate_master(?,?,?,?,?,?,?,?,?)',array($req->m_Broker_id,$req->m_Broker_Name,$req->m_Contact_No,$req->m_PAN_No,$req->m_Email_Id,$req->m_Emp_Code,$req->m_city_Id,$req->m_remark,
			$va));

		return Redirect('associate-list');
	}
//**-*-*-*-*-*-*-*-*Link-Entry
	public function messagelinkdetail()
	{
		return view('link-entry');
	}
	public function message_link_detail(Request $req)
	{
	  //print_r($req->all());exit();
		DB::statement("call msg_link_details_Insert(?,?,?)",array($req->link,$req->MsgBody,$req->title));
		Session::flash('message', 'City saved successfully');
		return Redirect('link-entry');
	}
//***-*-*-*-*-*-*-*-*-*-App-Version-Master
	public function appversionmaster()
	{
		$users=DB::select("call usp_get_app_versionmaster()");
		return view('app-version-master',['users'=>$users])->with('no', 1);
	}
	public function app_version_master(Request $req)
	{
	//print_r($req->all()); exit();
		DB::statement("call app_version_Master_edit(?,?)",array($req->App_Type_Name,$req->Version_Code));
		return Redirect('app-version-master');
	}
	public function appversionmaster_history()
	{
		$users=DB::select("call usp_get_Version_History_Master()");
		return view('app-version-master-history',['users'=>$users]);
	}	   
//*********-*-*-*-**Loan-Disbursement
	public function loandisbursement()
	{
		return view('loan-disbursement');
	}
//************bank-payout************
	public function bankpayout()
	{
		$smsdata=DB::select("call usp_get_bankpayout_master()");
		$bank=DB::select("call usp_get_bankmaster()");
		$select=DB::select("call usp_get_product_master()");
		return view('bank-payout-master',['smsdata'=>$smsdata,'bank'=>$bank,'select'=>$select])->with('no', 1);
	}
	public function bank_payout_master(Request $req)
	{
	//print_r($req->all());exit();
		DB::statement("call Insert_bankpayout_master(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($req->Bank_Id,$req->Product_Id,$req->Payoutfrom1,$req->Payoutfrom2,$req->Payoutfrom3,$req->Payoutfrom4,$req->Payoutfrom5,$req->Payoutto1,$req->Payoutto2,$req->Payoutto3,$req->Payoutto4,$req->Payoutto5,$req->Payoutper1,$req->Payoutper2,$req->Payoutper3,$req->Payoutper4,$req->Payoutper5,$req->Processing_Per,$req->Flat_Per));
		return Redirect('bank-payout-master');
	}
	public function bank_payout(Request $req)
	{
		//print_r($req->all());exit();
		DB::select('call Update_bank_payoutMaster(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($req->m_Id,$req->m_Bank_Id,$req->m_Product_Id,$req->m_Payoutfrom1,$req->m_Payoutfrom2,$req->m_Payoutfrom3,$req->m_Payoutfrom4,$req->m_Payoutfrom5,$req->m_Payoutto1,$req->m_Payoutto2,$req->m_Payoutto3,$req->m_Payoutto4,$req->m_Payoutto5,$req->m_Payoutper1,$req->m_Payoutper2,$req->m_Payoutper3,$req->m_Payoutper4,$req->m_Payoutper5,$req->m_Processing_Per,$req->m_Flat_Per));
		return Redirect('bank-payout-master');
	}	
//******-*-*-**source-master
	public function sourcemaster()
	{
		$smsdata=DB::select("call usp_get_source_master()");
		return view('source-master',['smsdata'=>$smsdata])->with('no', 1);
	}
	public function source_master(Request $req)
	{
		DB::statement("call Insert_source_master(?,?)",array($req->p_source_name,$req->p_is_Active));
		return Redirect('source-master');
	}
	public function source_master_edit(Request $req)
	{ 
		$va=0;
		if(isset($req->Is_Active)){
			$va=1;
		}else{
			$va=0;
		}

		DB::select("call Update_source_master(?,?,?)",array($req->source_id,$req->source_name,$va));
		return Redirect('source-master');
	}
//******bank-product-web
	public function bankproductweb()
	{
		$select=DB::select("call usp_get_product_master()");
		$bank=DB::select("call usp_get_bankmaster()");
		return view('bank-product-web',['select'=>$select,'bank'=>$bank]);
	}
//******city-wise-employee
	public function citywiseemployee()
	{
		$users=DB::select("call usp_get_citymaster()");
		$name=DB::select("call usp_get_employee_Name()");
		$smsdata=DB::select("call usp_get_city_wise_emp()");
		
		return view('city-wise-employee',['users'=>$users,'name'=>$name,'smsdata'=>$smsdata])->with('no', 1);
	}
	public function city_wise_employee(Request $req)
	{
	//print_r($req->all()); exit();
		DB::statement("call Insert_citywise_emp_master(?,?)",array($req->City_Id,$req->Emp_Code));
		return Redirect('city-wise-employee');
	}
//******message-master******-*-***-****
	public function messagemaster()
	{
		$smsdata=DB::select("call usp_get_message_master()");
		return view('message-master',['smsdata'=>$smsdata]);
	}
	public function message_master(Request $req)
	{
		DB::statement("call Insert_message_master(?,?,?)",array($req->messageTitle,$req->messageBody,$req->is_Active));
		return Redirect('message-master');
	}
	public function message_master_edit(Request $req)
	{ 
		$va=0;
		if(isset($req->m_is_Active)){
			$va=1;
		}else{
			$va=0;
		}
		DB::select("call Update_message_master(?,?,?,?)",array($req->m_message_id,$req->m_messageTitle,$req->m_messageBody,$va));
		return Redirect('message-master');
	}
	public function editbankpayout($id)
	{
		$m_users=DB::select("call usp_get_bankmaster()");
		$m_select=DB::select("call usp_get_product_master()");
		$user= DB::select("call usp_show_bankpayout(?)",array($id))[0];
		return view('edit-bank-payout-master',['m_users'=>$m_users,'m_select'=>$m_select,'user'=>$user]);
	}

	public function bankcontactdetails()
	{
		$users=DB::select("call usp_get_bankmaster()");
		$select=DB::select("call usp_get_product_master()");
		$smsdata=DB::select("call usp_get_bankcontact_details()");

		return view('bank-contact-details',['users'=>$users,'select'=>$select,'smsdata'=>$smsdata]);
	}

	public function bank_contact_details(Request $req)
	{
		print_r($req->all());exit(); 
		DB::statement("call Insert_Bank_Contact_Details(?,?,?,?,?,?,?,?,?,?,?)",array($req->Bank_id,$req->Product_id,$req->Co_Ordinator_Name,$req->Co_Ordinator_ContactNo,$req->Co_Ordinator_Email,$req->Sales_Manager_Name,$req->Sales_Manager_ContactNo,$req->Sales_Manager_Email,$req->Other_Head_Name,$req->Other_Head_ContactNo,$req->Other_Head_Email));
		return Redirect('bank-contact-details');

	}
} 	