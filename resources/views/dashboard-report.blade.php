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

              	

		 </div>


         </div>
        </div>
      </div>
       <div class="table-responsive">    
          <div id="tablediv" style="display:none"> 
			   <div id="table_response">  

			   </div>
			  </div>
			</div>


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
              var response = JSON.parse(msgdata);
              if (response.status == "success"){

             $("#tablediv").show();
             $("#table_response").html(response.table);

              }else
              if(response.messege == "error"){
                  window.location = response.redirectUrl;
               }else{
                  $.each(response , function(key , value){
                     $("#err_" + key).text(value);
                  });
	              }
	            }
	        });
	    });
</script>


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



@endsection
