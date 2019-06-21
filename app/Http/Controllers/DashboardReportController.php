<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use App\CustomValidation;
use Mail;
class DashboardReportController extends Controller
{
	public function dashboard_report(){
		return view('dashboard-report');
	}

	// public function dashboard_rep_get(Request $req){
	// 	print_r($req->all()); exit();
	// }

	public function dashboard_rep_get(Request $req,CustomValidation $validator){
   //print_r($req->all()); exit();

		//	$userid=Session::get('userid');
		$userid=Session::get('empcode');

		//print_r($userid); exit();
		
		$data = array();
		$error = array();
		$parameters['REQUEST'] = $req->all();
		$parameters['VALIDATIONS'] = array(
			'REQUIRED_VALIDATIONS'=>array('f_date'=>'Please Select Date','t_date'=>'Please Select Date','ddlfilter'=>'Please Select One','companyname'=>'Please Select Company','ddlloantype'=>'Please Select One'));
		extract($validator->validate_required($parameters));
		if(count($error) === 0){

			$query=DB::select(DB::raw("exec Usp_expected_Disbursed_bak :fdate,:tdate,:Reporting_emp,:company,:loginId,:Loan_type"),[
				':fdate' => $req->f_date,
				':tdate' => $req->t_date,
				':Reporting_emp' => $userid,
                ':loginId' => null,
				':company' => $req->companyname,				
				':Loan_type' =>$req->ddlloantype
			]);


    $table = '<table id="example"  class="table table-bordered table-striped">
                <thead>
                  <tr> 
                    <th>Manager</th>
                    <th>Emp Code</th>
                    <th>No of Exp Customers</th>
                    <th>No of DisbursedCustomers</th>
                    <th>No Of Disbursed Files</th>
                    <th>Disbursed Amount</th>
                    <th>Exp.DisbursalFiles</th>
                    <th>Exp.Disbursal Amount</th>
                    <th>Online.Disbursal Amount</th>                    
                    <th>Online %</th>                    
                    <th>Exp.Billing Amt</th>
                    <th>No. of Sanction File</th>
                    <th>Sanction Amount</th>
                   
                  </tr>
                </thead><tbody>';


    foreach($query as $val){
      $table  .= '<tr>';
        $table .= '<td>'. $val -> Name . '</td>';
        $table .= '<td>'. $val -> emp_code . '</td>';
        $table .= '<td>'. $val -> no_of_customers . '</td>';
        $table .= '<td>'. $val -> no_of_disbursed_customers . '</td>';
        $table .= '<td>'. $val -> no_of_files_disbursed . '</td>';
        $table .= '<td>'. $val -> dis_Amt . '</td>';
        $table .= '<td>'. $val -> Exp_dis_files . '</td>';
        $table .= '<td>'. $val -> Exp_dis_Amt . '</td>';
        $table .= '<td>'. $val -> Online_dis_amt . '</td>';
        $table .= '<td>'. $val -> online_percent . '</td>';
        $table .= '<td>'. $val -> exp_billing . '</td>';
        $table .= '<td>'. $val -> no_of_saction . '</td>';
        $table .= '<td>'. $val -> Sanction_amt . '</td>';        
        $table .= '</tr>';
    }

//print_r($table); exit();

    $table .= '</tbody></table>';
    $table .= '<script> $("#example").DataTable(); </script>';
    $msg = array("status"=>"success", "table" => $table);
	
	echo json_encode($msg);
		}
		else{
			echo json_encode($error);

		}
	}
}
