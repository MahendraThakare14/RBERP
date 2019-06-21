@extends('include.master')
@section('content')

<style type="text/css">
  .error_class
  {
    color: red;
    font-size: 12px;
  }
</style>


  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
      <h3 class="box-title">Report</h3> 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

        

       <div class="box-body">
          <div class="row">
          	<div class="table-responsive"> 
              <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
            <form class="form-horizontal" name="dashboard_report" id="dashboard_report"  method="post">
           {{csrf_field()}}


              <div class="col-md-6">
                   <div class="form-group row">
                      <label for="empcode" class="col-sm-4 col-form-label">From&nbsp;Date:</label>
                       <div class="col-md-6">
                         <input type="text" class="form-control datepicker_id" id="f_date" name="f_date" value="<?php echo date('Y-m-d');?>">
                         <label id="err_f_date" class="error_class"></label>
                     </div>
                  </div>
                </div>

               <div class="col-md-6">
                   <div class="form-group row">
                      <label for="empname" class="col-sm-4 col-form-label" >To&nbsp;Date:</label>
                       <div class="col-sm-6">
                       <input type="text" class="form-control datepicker_id" id="t_date" name="t_date" value="<?php echo date('Y-m-d');?>">
                       <label id="err_t_date" class="error_class"></label>
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group row">
                   <label for="empname" class="col-sm-4 col-form-label">Dashboard:</label>
                    <div class="col-sm-6">
                       <select type="text" class="form-control" id="ddlfilter" name="ddlfilter">
                  	    <option selected disabled value="0">select</option>
						<option value="T">Team Wise</option>
						<option value="P">Product Wise</option>
						<option value="L">Location Wise</option>
						<option value="B">Bank Wise</option>
						<option value="BD">Billing Data</option>
						<option value="EP">TOP 40 Expected Pipeline</option>
						<option value="PR">Productivity Report</option>
						<option value="300_Data">Calling/SME Report</option>
						<option value="IL">Insurance Report</option>
						<option value="OL">Online Lead Dashboard</option>
					</select>
					<label id="err_ddlfilter" class="error_class"></label>
                   </div>
                 </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group row">
                   <label for="empname" class="col-sm-4 col-form-label">Company:</label>
                    <div class="col-sm-6">
                       <select type="text" class="form-control"   id="companyname" name="companyname">
                  	    <option selected disabled value="0">select</option>
                  	    <option value="1000">RupeeBoss</option>
                  	    <option value="1001">PolicyBoss</option>
                       </select>
                       <label id="err_companyname" class="error_class"></label>
                   </div>
                 </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group row">
                   <label for="ddlloantype" class="col-sm-4 col-form-label">Loan Type:</label>
                    <div class="col-sm-6">
                       <select type="text" class="form-control"   id="ddlloantype" name="ddlloantype">
                  	    <option selected disabled value="0">select</option>
						<option value="R">Retail</option>
						<option value="S">SME</option>
						<option value="O">Online</option>
						<option value="A">All</option>
						</select>
						<label id="err_ddlloantype" class="error_class"></label>
					</div>
                 </div>
               </div>

               <div class="col-md-12"> 
               <center>            
                 <button type="button" name="btnsubmit"  id="btnsubmit" class="btn btn-primary">Show Report</button>
             </center>
             </div>
              
            </form>


	
              <!-- <div class="table-responsive">    -->

              <div id="divhistory">
      
    </div>	

		 </div>


         </div>
        </div>
      </div>
      <!--  <div class="table-responsive">    
          <div id="tablediv" style="display:none"> 
			   <div id="table_response">  

			   </div>
			  </div>
			</div> -->

	


    </div>
  </div>   
<!-- success : function(response){
       $(".loader").hide();

       var data = JSON.parse(response);

       if(data.status == "success"){
        $("#tablediv").show();
        $("#table_response").html(data.table); -->

  <script type="text/javascript">
  $('#btnsubmit').click(function(){
    $(".error_class").empty();
     var formdata = new FormData($("#dashboard_report")[0]);
    $.ajax({  
           type: "POST",  
           url: "{{URL::to('dashboard-report-get')}}",
            data : formdata,
           processData: false,
             contentType : false,
             success: function(msgdata){

             	var data = JSON.parse(msgdata);


    if (data.status == "success"){      
       var str ="<table id='example'  class='table table-bordered table-striped'><thead><tr><th>Manager</th><th>Emp Code</th><th>No of Exp Customers</th><th>No of DisbursedCustomers</th><th>No Of Disbursed Files</th><th>Disbursed Amount</th><th>Exp.DisbursalFiles</th><th>Exp.Disbursal Amount</th><th>Online.Disbursal Amount</th><th>Online %</th><th>Exp.Billing Amt</th><th>No. of Sanction File</th><th>Sanction Amount</th></tr></thead><tbody>";
       for (var i = 0; i < data.result.length; i++) 
       {

      

         str = str + "<tr><td><a href='' onclick='demo(data.result[i].emp_code)'>"+data.result[i].Name+"</a></td><td>"+data.result[i].emp_code+"</td><td>"+data.result[i].no_of_customers+"</td><td>"+data.result[i].no_of_disbursed_customers+"</td><td>Disbursed Amount"+data.result[i].no_of_files_disbursed+"</td><td>"+data.result[i].dis_Amt+"</td><td>"+data.result[i].Exp_dis_files+"</td><td>"+data.result[i].Online_dis_amt+"</td><td>"+data.result[i].online_percent+"</td><td>"+data.result[i].exp_billing+"</td><td>"+data.result[i].no_of_saction+"</td><td>"+data.result[i].Sanction_amt+"</td></tr>";
       }
         str = str + "</tbody></table>";

            $('#divhistory').html(str);
           $('#example').DataTable();                
      // }
   }else{
              if(data.messege == "error"){
                  window.location = data.redirectUrl;
               }else{
                  $.each(data , function(key , value){
                     $("#err_" + key).text(value);
                  });
	            }
	          }
	        }
	    });
	    });
</script>

<script type="text/javascript">
 function demo(emp_code){
 	alert(emp_code);
   $.ajax({
    url: 'dashboard-re-model/'+id,
    type: "GET",
    success:function(user)
    {
      var data=  JSON.parse(user);
    }   
  });
 } 
</script>




<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



@endsection
