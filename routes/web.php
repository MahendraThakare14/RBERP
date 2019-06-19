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
Route::POST('update-emp-master','MastersController@employee_master_update');

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
Route::get('edit-employe-listtt/{id}','MastersController@table_edit');
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




});


Route::group(['middleware' => ['CheckMidd']], function (){



Route::get('vivek','VivekController@vivek');

Route::get('edit-menu','UsersController@editmenu');
Route::get('menu-master','UsersController@menumaster');
Route::post('menu-master-insert','UsersController@menu_master_insert');


// Route::get('dashboard','IndexController@dashboard');
// Route::get('dashboardnew','DashboardController@chartdashboard');
//Route::get('dashboardnew','DashboardController@dashboard');

Route::get('/registration','IndexController@registration');
Route::post('/registration-form','IndexController@insert_registration');

/*Project-Master*/

Route::get('/project-master','ProjectController@project');
Route::post('/project-master-form','ProjectController@project_insert');
Route::get('/project-master-sp','ProjectController@project_master_sp');

Route::get('/task-description','ProjectController@projectmaster');
Route::post('/task-description-form','ProjectController@project_master');
Route::get('/project-master-view','ProjectController@projectmasterview');


// Route::get('/employee-master','EmployeeMasterController@employeemaster');
// Route::post('/employee-master-form','EmployeeMasterController@employee_master');
// Route::get('/employee-table','EmployeeMasterController@employee_table');
// Route::get('/employee-master-view/{id}','EmployeeMasterController@employeeupdate');
// Route::post('/employee-master-update','EmployeeMasterController@employee_update');


Route::get('/assign-task','AssignTaskController@assigntask');
Route::get('/project-master','ProjectController@projectview');

Route::get('/task-history','AssignTaskController@taskhistory');
Route::get('/task-history-view/{id}','AssignTaskController@task_history_view');
Route::post('/task-history-update','AssignTaskController@task_history_update');
Route::get('/create-issue','CreateIssueController@create_issue');
Route::post('/create-issue-form','CreateIssueController@insert_create_issue');
Route::get('/module-master','ModuleController@modulemaster');
Route::post('/module-master-insert','ModuleController@insertmodulemaster');
Route::get('/module-master-view','ModuleController@modulemasterview');
Route::get('/task-master','TaskMasterController@taskmaster');
Route::get('/task-master-view','TaskMasterController@taskmasterview');
Route::post('/task-master-insert','TaskMasterController@inserttaskmaster');

Route::get('/tag-activity-view','TagActivityController@tagactivityview');
Route::post('/tag-activity-insert','TagActivityController@tagactivityinsert');
Route::get('/tag-activity','TagActivityController@tagactivity');


Route::get('/assign-tag-activity','TagActivityController@assignactivity');


Route::get('/subtask-master','SubTaskMasterController@subtaskmaster');
Route::get('/subtask-master-view','SubTaskMasterController@subtaskmasterview');
Route::post('/subtask-master-insert','SubTaskMasterController@subinserttaskmaster');
Route::get('/assign-subtask-master/{id}','SubTaskMasterController@assignSubtaskmaster
');
Route::get('/Releses','RelesesController@release');
Route::post('/realeses-details-insert','RelesesController@releasedetails');



Route::get('manage-fba-data','LeadsController@managefbadata');
Route::get('manage-fba-get/{fdate}/{tdate}','LeadsController@managefba');
Route::get('edit-fba-data/{id}','LeadsController@editfbadata');


Route::get('/release-details','RelesesController@releasedetailsview');
Route::get('/bug-activity','BugActivityController@bugactivity');
Route::post('/bug-activity-insert','BugActivityController@bugactivityinsert');
Route::get('/bug-activity-view','BugActivityController@bugactivityview');



Route::get('/home','HomeController@homemaster');
Route::post('/home-master-insert','HomeController@inserthomemaster');


Route::get('/home-master-view','HomeController@homemasterview');
Route::get('/openissues','OpenIssueController@open_issue');

Route::get('/openissues-view/{id}','OpenIssueController@open_issueview');

Route::get('/open-issues','OpenIssueController@openis');


Route::get('/open-bug-issue','OpenIssueController@openbug');

Route::get('/view-recently','OpenIssueController@view_recently');

Route::get('/recently-resolved','OpenIssueController@recently_resolved');

Route::get('/view-all-bug','OpenIssueController@view_all_bug');

 /************
//  Performance Appraisal System 
******************/
Route::get('emp-details','pas\PasController@emp_details');
Route::get('pas-details','pas\PasController@pms_details');
Route::post('asp-insert','pas\PasController@pas_insert');
Route::get('pas-registrar','pas\PasController@pas_registrar'); 
Route::get('pas-data','pas\PasController@pas_data'); 

Route::post('employee-master-insert','MastersController@employee_master_insert');

Route::post('employee-master-insert','MastersController@employee_master_insert'); 

Route::get('/unrelesed','OpenIssueController@task_unrelesed');
Route::get('/google-line-chart', 'GoogleChartController@googleLineChart');
Route::get('/report','GoogleChartController@chart');
Route::get('/user-details-view','UserController@userdetails_view');
Route::get('/user-login-details/{id}','UserController@userdetail_update');
Route::get('/user-details','UserController@userlogin_view');
Route::get('/user-details-update','UserController@user_update');
Route::post('/user-details-insert','UserController@user_detail_insert');

   // print_r($req->all());



Route::get('/header','HomeControlle@issueheader');


Route::get('/menu-group','MenuController@menugroup');
Route::get('/menu-list','MenuController@menulist');
Route::post('/menu-list-form','MenuController@menu_list');
Route::get('/menu-group','MenuController@menugroup');

Route::get('get-count-value/{id}','AssignTaskController@getcountvalue');
});