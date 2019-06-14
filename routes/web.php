<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','LoginController@checklogin');
Route::post('login','LoginController@login');
Route::get('logout','LoginController@logout');

Route::group(['middleware' => ['CheckMidd']], function (){
Route::get('dashboard','DashboardController@dashboard');
Route::get('employee-master','MastersController@aspxdata');
Route::post('employee-master_submit','MastersController@employee_master_submit');
Route::post('employee-master','MastersController@employ_master');
Route::POST('update_empmaster','MastersController@employ_master');

Route::get('bank-master','MastersController@bankmaster');
Route::post('bank-master','MastersController@bank_master');
Route::post('update-bank-master','MastersController@bank_master_edit');

Route::get('break-master','MastersController@breakmaster');
Route::post('break-master','MastersController@break_master');

Route::get('state-master','MastersController@statemaster');
Route::post('state-master','MastersController@state_master');

Route::get('city-master','MastersController@citymaster');
Route::post('city-master','MastersController@city_master');

Route::get('designation-master','MastersController@designationmaster');
Route::POST('update_designation_master','MastersController@designation_master');

Route::get('employee-list','MastersController@employelistmaster');
Route::get('edit-employe-list','MastersController@edit_employelist_master');
Route::get('edit-employe-list/{id}','MastersController@table_edit');
Route::post('update_employe_list','MastersController@employe_master_editlist');

Route::get('leadstatus-master','MastersController@leadstatusmaster');
Route::post('leadstatus-master','MastersController@leadstatus_master');

Route::get('product-master','MastersController@productmaster');
Route::post('product-master','MastersController@product_master');

Route::get('profession-master','MastersController@professionmaster');
Route::post('profession-master','MastersController@profession_master');

Route::get('role-master','MastersController@rolemaster');

Route::get('associate-master','MastersController@associatemaster');
Route::POST('associate-master','MastersController@associate_master');

Route::get('associate-list','MastersController@associatelist');
Route::post('associate-list','MastersController@associate_list');

Route::get('link-entry','MastersController@messagelinkdetail');
Route::post('link-entry','MastersController@message_link_detail');

Route::get('app-version-master','MastersController@appversionmaster');
Route::POST('app-version-master','MastersController@app_version_master');
Route::get('app-version-master-history','MastersController@appversionmaster_history');
Route::get('app-version-master-history/{$id}','MastersController@history');

Route::get('loan-disbursement','MastersController@loandisbursement');
Route::get('bank-product-web','MastersController@bankproductweb');

Route::get('bank-payout-master','MastersController@bankpayout');
Route::post('bank-payout-master','MastersController@bank_payout_master');

Route::get('edit-bank-payout-master/{id}','MastersController@editbankpayout');
Route::POST('update_bank_payout','MastersController@bank_payout');

Route::get('source-master','MastersController@sourcemaster');
Route::POST('source-master','MastersController@source_master');
Route::post('update-source-master','MastersController@source_master_edit');

Route::get('city-wise-employee','MastersController@citywiseemployee');
Route::post('city-wise-employee','MastersController@city_wise_employee');

Route::get('message-master','MastersController@messagemaster');
Route::post('message-master','MastersController@message_master');
Route::post('update_message_master','MastersController@message_master_edit');

Route::get('bank-contact-details','MastersController@bankcontactdetails');
Route::POST('bank-contact-details','MastersController@bank_contact_details');

Route::get('bank_contact_details-new','bank_contact_detailsController@bankdetails');









           //**UsersController***********************

Route::get('user-group','UsersController@usergroup');
Route::get('user-master','UsersController@usermaster');
Route::get('user-rights','UsersController@userrights');
Route::get('user-rights/{id}', 'UsersController@search');

Route::get('edit-menu','UsersController@editmenu');
Route::get('menu-master','UsersController@menumaster');
Route::post('menu-master-insert','UsersController@menu_master_insert');

Route::get('group-rights','UsersController@grouprights');
Route::get('monthly-target','UsersController@monthlytarget');

           //**BillingController***********************

Route::get('create-invoice','BillingController@createinvoice');
Route::get('create-broker-invoice','BillingController@brokerinvoice');
Route::get('broker-invoice-register','BillingController@brokerinvoiceregister');

         //**ActivityController***********************

Route::get('daily-planning','ActivityController@dailyplanning');
Route::post('daily-planning-insert','ActivityController@daily_planning');
Route::post('update_daily','ActivityController@daily_planning_edit');

Route::get('lead-capture','ActivityController@leadcapture');
Route::get('registration-report','ActivityController@registrationreport');
Route::get('campaign-wise-report','ActivityController@campaignwisereport');
Route::get('credit-card-entry','ActivityController@creditcardentry');




                 //***LeadsController************************

Route::get('manage-leads','LeadsController@manageleads');
Route::get('manage-leads-get/{fdate}/{tdate}','LeadsController@getleaddata');
Route::post('update_manage_leads','LeadsController@manage_leads');

Route::get('searchajax',array('as'=>'searchajax','uses'=>'LeadsController@autoComplete'));
Route::get('searchajax-Emp-Name',array('as'=>'searchajax-Emp-Name','uses'=>'LeadsController@autoComplete_employee'));
Route::get('searchajax-vertical',array('as'=>'searchajax-vertical','uses'=>'LeadsController@autoComplete_vertical'));
Route::get('searchajax-source-name',array('as'=>'searchajax-source-name','uses'=>'LeadsController@autoComplete_Source'));
Route::get('searchajax-status',array('as'=>'searchajax-status','uses'=>'LeadsController@autoComplete_Status'));
Route::get('lead-reassign-telecaller','LeadsController@leadreassigntelecaller');
Route::get('lead-lead-capture','LeadsController@leadleadcapture');
Route::POST('lead-lead-capture','LeadsController@lead_lead_capture');
Route::get('priority-manage-leads','LeadsController@prioritymanageleads');
Route::get('PB-payout-master','LeadsController@pbpayoutmaster');
Route::get('push-sms-entry','LeadsController@pushsmsentry');  
Route::get('lead-status-update-flow/{id}','LeadsController@leadstatusupdateflow');
Route::get('lead-assign-telecaller','LeadsController@leadassigntelecaller');

Route::get('manage-fba-data','LeadsController@managefbadata');
Route::get('manage-fba-get/{fdate}/{tdate}','LeadsController@managefba');
Route::get('edit-fba-data/{id}','LeadsController@editfbadata');




         //*** ReportingController***********************

Route::get('lead-assign-report','ReportingController@leadassignreport');
Route::get('call-tracking-report','ReportingController@calltrackingreport');
Route::get('sms-link-report','ReportingController@smslinkreport');
Route::get('daily-followup-report','ReportingController@dailyfollowupreport');
Route::get('lead-report','ReportingController@leadreport');



 /************
//  Menu List
******************/
Route::get('menu-list','MenuController@menulist');
Route::post('menu-list-add','MenuController@menulist_add');
Route::get('menu-mapping','MenuController@menu_mapping');

Route::post('grouprights-add','MenuController@grouprights_add');




 /************
//  Performance Appraisal System 
******************/
Route::get('emp-details','pas\PasController@emp_details');
Route::get('pas-details','pas\PasController@pms_details');
Route::post('asp-insert','pas\PasController@pas_insert');
Route::get('pas-registrar','pas\PasController@pas_registrar'); 
Route::get('pas-data','pas\PasController@pas_data'); 
Route::post('employee-master-insert','MastersController@employee_master_insert'); 






});
