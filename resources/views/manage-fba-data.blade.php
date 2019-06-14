@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Manage FBA Data</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="Absolute-Center is-Responsive">
          <div id="logo-container"></div>
          <!-- <div class="col-sm-6 col-sm-offset-2"> -->
            <form class="form-horizontal" name="break_master" id="break_master"  method="post">
              {{csrf_field()}}

              
              <div class="col-sm-6">
              	<div class="form-group row">              	
                <label for="txtfdate" class="col-sm-4 col-form-label">From&nbsp;Date:</label>
                <div class="col-md-6">
                  <input type="text" class="form-control datepicker_id" id="txtfdate" name="txtfdate" placeholder="From Date">
                </div>
              </div>
          </div> 	

              
              <div class="col-sm-6">
              	<div class="form-group row">              	
                <label for="txttdate" class="col-sm-4 col-form-label">To Date:</label>
                <div class="col-md-6">
                  <input type="text" name="txttdate" id="txttdate" class="form-control datepicker_id" placeholder="To Date" >
                  </div>
                </div>
              </div>

              <!-- <center>
                <input type="submit" name="Button1" value="Submit" id="Button1" class="btn btn-primary">
                <input type="reset" class="btn" value="Reset">
              </center> -->
              </form>
              <center>
          <div class="col-sm-12">
                
                <a class="btn btn-primary" id="btnshowlead">show lead</a>
              </div>
            </center>
      
        </div>
      </div>
    </div>



     <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

         <div class="box-body">

           
<div class="table-responsive" id="divhistory">  
  </div>
</div> 
</div>




  </div>
</div>

<script type="text/javascript">
	$("#btnshowlead").click(function(){ 
var fdate=$('#txtfdate').val();
var tdate=$('#txttdate').val();
  $.ajax({  
         type: "GET",  
         url:'manage-fba-get/'+fdate+'/'+tdate,
         success: function(leaddata)
         {   
           alert(leaddata);
           var data = JSON.parse(leaddata);
           var str ="<table id='example'class='table table-bordered table-striped'><thead><tr><th>Edit</th><th>View History</th><th>FBA Name</th><th>FBA City Name</th><th>Emp Name</th><th>Contact No.</th><th>Email Id</th><th>PAN No.</th><th>FBA Status</th><th>Remark</th></tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tr><td><a href='edit-fba-data/"+data[i].Broker_id+"'>"+data[i].Lead_id+"</a><td><a href='Select/"+data[i].Lead_id+"'>"+data[i].Lead_id+"</a></td><td>"+data[i].Broker_Name+"</td><td>"+data[i].city_Id+"</td><td>"+data[i].Emp_Code+"</td><td>"+data[i].Contact_No+"</td><td>"+data[i].Email_Id+"</td><td>"+data[i].PAN_No+"</td><td>"+data[i].FBA_Status+"</td><td>"+data[i].remark+"</td></tr>";
       }
         str = str + "</tbody></table>";
           $('#divhistory').html(str);
           $('#example').DataTable();
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
