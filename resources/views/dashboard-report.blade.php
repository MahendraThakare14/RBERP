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




<div id="divhistory">

</div>	

</div>


</div>
</div>
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md" style="size:100px">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <center><h3 style="color: #0099FF;">Edit Bank Master</h3></center>
          <hr>

          <form id="demo_form" name="demo_form" method="POST" action="{{url('update-bank-master')}}"  enctype="multipart/form-data"> 
                {{csrf_field()}} 
          

                   <div class="form-group row">
                        <label for="Pop_Bank_Id" class="col-sm-2 col-form-label">Bank&nbsp;Id:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Pop_Bank_Id" name="Pop_Bank_Id"  value="" placeholder="Enter a Bank Name"  required>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="Pop_Bank_Name" class="col-sm-2 col-form-label">Bank&nbsp;Name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Pop_Bank_Name" name="Pop_Bank_Name"  value="" placeholder="Enter a Bank Name"  required>
                        </div>
                      </div>


                        <div class="form-group row">
                        <label for="Pop_Bank_Address" class="col-sm-2 col-form-label">Address:</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" id="Pop_Bank_Address" name="Pop_Bank_Address"  value="" placeholder="Enter a Address"  required></textarea>
                        </div>
                      </div>



                        <div class="form-group row">
                        <label for="Pop_Bank_Code" class="col-sm-2 col-form-label">Bank&nbsp;Code:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Pop_Bank_Code" name="Pop_Bank_Code"  value="" placeholder="Enter a Bank Code">
                        </div>
                      </div>



                        <div class="form-group row">
                        <label for="Pop_Document1" class="col-sm-2 col-form-label">Select&nbsp;File:</label>
                        <div class="col-sm-10">
                         
                           <input type="hidden" name="file_documant1" id="file_documant1">
                          <input type="file" class="form-control" id="Pop_Document1" name="Pop_Document1"  value="">
                           <lable id="msg" style="color: red;" ></lable>

                        </div>
                      </div>




                        <div class="form-group row">
                        <label for="Pop_Document2" class="col-sm-2 col-form-label">Select&nbsp;Logo:</label>
                        <div class="col-sm-10">
                          
                          <input type="hidden" name="file_documant2"  id="file_documant2" style="display: none;">
                          <input type="file" class="form-control" id="Pop_Document2" name="Pop_Document2"  value="">
                          <lable id="msg2" style="color: red;" ></lable>
                        </div>
                      </div>





             <center>
              <button type="submit" name="Button" id="btn_update" class="btn btn-primary">Update</button>
            </center>

                      
        
        </form>
        


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="myFunction();">Close</button>
        </div>

  </div>
</div>
</div>

</div>
</div>   

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
        var str ="<table id='example' class='table table-bordered table-striped'><thead><tr><th>Manager</th><th>Emp Code</th><th>Exp Customers</th><th>Disbursed Customers</th><th>Disbursed Files</th><th>Disbursed Amount</th><th>Exp.DisbursalFiles</th><th>Exp.Disbursal Amount</th><th>Online.Disbursal Amount</th><th>Online %</th><th>Exp.Billing Amt</th><th>Sanction File</th><th>Sanction Amount</th></tr></thead><tbody>";
       for (var i = 0; i < data.result.length; i++) 
       {




         str = str + "<tr><td><a type='button' class='btn btn-success a-btn-slide-text' onlick='demo("+data.result[i].emp_code+")'>"+data.result[i].Name+"</a></td><td>"+data.result[i].emp_code+"</td><td>"+data.result[i].no_of_customers+"</td><td>"+data.result[i].no_of_disbursed_customers+"</td><td>"+data.result[i].no_of_files_disbursed+"</td><td>"+data.result[i].dis_Amt+"</td><td>"+data.result[i].Exp_dis_files+"</td><td>"+data.result[i].Exp_dis_Amt+"</td><td>"+data.result[i].Online_dis_amt+"</td><td>"+data.result[i].online_percent+"</td><td>"+data.result[i].exp_billing+"</td><td>"+data.result[i].no_of_saction+"</td><td>"+data.result[i].Sanction_amt+"</td></tr>";
       }
       str = str + "</tbody></table>";

       $('#divhistory').html(str);
       //$('#example').DataTable();                
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
    alert();

  // $('#myModal').modal('show');   
    
  //   $.ajax({
  //     url: 'tpa-table-model/'+tpa_id,
  //     type: "GET",
  //     success:function(user)
  //     {
  //       var data=  JSON.parse(user);
  //       $('.error_class').empty();
  //       $('#myModal').modal('show');                   
    



  //       $('#id').val(data[0].id);
  //       $('#tpa_name').val(data[0].tpa_name);
     


  //     }
  //   });
  } 
  </script>





<!-- <script type="text/javascript">

  function demo(this_id){

    alert(this_id);


    var emp_code = $("#" + this_id).attr('data-emp_code');


    $('#myModal').modal('show'); 


    alert(emp_code);

  }



</script> -->




<!-- <script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script> -->



@endsection
