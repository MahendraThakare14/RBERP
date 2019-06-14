@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
         <h3 class="box-title">Manage Leads</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

        

 <div class="box-body">
 <!--  <center><h3 style="color: #0099FF;">Manage Leads</h3></center><hr> -->
          <div class="row">  <!-- for center -->
              <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
              <!-- a -->
            <form class="form-horizontal" name="employee_form" id="employee_form"  method="POST">
              {{csrf_field()}}




           <div class="col-md-12">
            <div class="form-group row">
                 <label for="empcode" class="col-sm-2 col-form-label">Lead&nbsp;Date:</label>
                 <div class="col-sm-3">
                   <select  class="form-control" id="empcode" name="empcode">
                    <option selected disabled="0">select</option>
                    <option value="1">Updated Datewise</option>
                    <option value="2">Created Datewise</option>
                   </select>
               </div>
             </div>
            </div>



            <div class="col-md-6">
             <div class="form-group row">
                  <label for="empcode" class="col-sm-4 col-form-label">From Date:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control datepicker_id" id="txtfdate" name="txtfdate" placeholder="From Date">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
             <div class="form-group row">
                  <label for="empname" class="col-sm-4 col-form-label">To Date:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control datepicker_id"" id="txttdate" name="txttdate" placeholder="To Date">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="City" class="col-sm-4 col-form-label">City Name:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control search_citynm" id="City" name="City">
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="mobile" class="col-sm-4 col-form-label">Employee Name :</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control search_Emp_Name" id="mobile" name="mobile">
                 </div>
               </div>
             </div>


             <div class="col-md-6">
              <div class="form-group row">
                  <label for="companyname" class="col-sm-4 col-form-label">Status:</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control inp-fld search_Status" id="companyname" name="companyname">
               </div>
               </div>
             </div>


             <div class="col-md-6">
                <div class="form-group row">
                  <label for="companyname" class="col-sm-4 col-form-label">Vertical Name:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control inp-fld search_vartical" id="companyname" name="companyname">
                  </div>
                </div>
              </div>                 


                  <div class="col-md-6">
                   <div class="form-group row">
                        <label for="dob" class="col-sm-4 col-form-label">Source&nbsp;Name:</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control inp-fld search_Source_Name" id="dob" name="dob">
                        </div>
                      </div>
                    </div>



            
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
$(document).ready(function(){
    
    $(".search_Status").autocomplete({
      source: function(request, response) {
        
        $.ajax({
          url: "{{ route('searchajax-status') }}",
          dataType: "json",
          data: {
            term : request.term
          },
          success: function(data) {
            response(data);            
          }
        });
      },
      change: function (event, ui) {
        if (ui.item == null || ui.item == undefined || ui.item.value=='No Result Found') {
          $(".search_Status").val("");
          $(".search_Status").attr("disabled", false);
         
        }else{         
         $(".Q6").show();
       }
     }
   });
  });

$("#btnshowlead").click(function(){ 
var fdate=$('#txtfdate').val();
var tdate=$('#txttdate').val();
  $.ajax({  
         type: "GET",  
         url:'manage-leads-get/'+fdate+'/'+tdate,
         success: function(leaddata)
         {   

           var data = JSON.parse(leaddata);
           var str ="<table id='example'class='table table-bordered table-striped'><thead><tr><th>Lead Id</th><th>Lead Create Date</th><th>Customer Name</th><th>Mobile No</th><th>Email Id</th><th>City</th><th>Product Name</th><th>Emp Name</th><th>Company Name</th><th>followup Date</th><th>Last Update Date</th><th>Status</th><th>Source Name</th><th>Campaign Name</th><th>Vertical Name</th><th>Bank Name</th><th>Remark</th><th>Credit Score</th><th>Created By</th><th>Broker Name</th><th>FBA Employee Name</th></tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {

         str = str + "<tr><td><a href='lead-status-update-flow/"+data[i].Lead_id+"'>"+data[i].Lead_id+"</a></td><td>"+data[i].Created_Datetime+"</td><td>"+data[i].name+"</td><td>"+data[i].mobile+"</td><td>"+data[i].email+"</td><td>"+data[i].City_Name+"</td><td>"+data[i].Product_Name+"</td><td>"+data[i].Emp_Name+"</td><td>"+data[i].CompanyName+"</td><td>"+data[i].ndate+"</td><td>"+data[i].sysdate+"</td><td>"+data[i].Lead_Status+"</td><td>"+data[i].source_name+"</td><td>"+data[i].campaignName+"</td><td>"+data[i].Vertical_Name+"</td><td>"+data[i].Bank_Name+"</td><td>"+data[i].Remark+"</td><td>"+data[i].Credit_Score+"</td><td>"+data[i].Created_By+"</td><td>"+data[i].Broker_Name+"</td><td></td></tr>";
       }
         str = str + "</tbody></table>";
           $('#divhistory').html(str);
           $('#example').DataTable();
         }  
      });
 });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
 $(document).ready(function(){
    src = "{{ route('searchajax') }}";
    console.log(src);
    $(".search_citynm").autocomplete({
      source: function(request, response) {        
        $.ajax({
          url: src,
          dataType: "json",
          data: {
            term : request.term
          },
          success: function(data) {      

            response(data);            
          }
        });
      },
      change: function (event, ui) {
        if (ui.item == null || ui.item == undefined || ui.item.value=='No Result Found') {
          $(".search_citynm").val("");
          $(".search_citynm").attr("disabled", false);
         
        }else{
         
         $(".Q6").show();        
          
             }
           }        
      });
   });
</script>
<script type="text/javascript">
$(document).ready(function(){    
    $(".search_Emp_Name").autocomplete({
      source: function(request, response) {        
        $.ajax({
          url: "{{ route('searchajax-Emp-Name') }}",
          dataType: "json",
          data: {
            term : request.term
          },
          success: function(data) {         

            response(data);            
          }
        });
      },
      change: function (event, ui) {
        if (ui.item == null || ui.item == undefined || ui.item.value=='No Result Found') {
          $(".search_Emp_Name").val("");
          $(".search_Emp_Name").attr("disabled", false);         
        }else{         
         $(".Q6").show();        
          
             }
           }        
      });
      });
</script>
<script type="text/javascript">
$(document).ready(function(){    
    $(".search_vartical").autocomplete({
      source: function(request, response) {
        
        $.ajax({
          url: "{{ route('searchajax-vertical') }}",
          dataType: "json",
          data: {
            term : request.term
          },
          success: function(data) {           
            response(data);            
          }
        });
      },
      change: function (event, ui) {
        if (ui.item == null || ui.item == undefined || ui.item.value=='No Result Found') {
          $(".search_vartical").val("");
          $(".search_vartical").attr("disabled", false);        
        }else{         
         $(".Q6").show();        
          
             }
           }        
      });
   });
</script>
<script type="text/javascript">
$(document).ready(function(){    
    $(".search_Source_Name").autocomplete({
      source: function(request, response) {        
        $.ajax({
          url: "{{ route('searchajax-source-name') }}",
          dataType: "json",
          data: {
            term : request.term
          },
          success: function(data) {
            response(data);            
          }
        });
      },
      change: function (event, ui) {
        if (ui.item == null || ui.item == undefined || ui.item.value=='No Result Found') {
          $(".search_Source_Name").val("");
          $(".search_Source_Name").attr("disabled", false);         
        }else{         
         $(".Q6").show();        
          
             }
           }        
      });
   });

</script>

@endsection 
