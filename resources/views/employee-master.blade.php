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
         <h3 class="box-title">Employee Master</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

        

 <div class="box-body">
  <!-- <center><h3 style="color: #0099FF;">Employee Master</h3></center><hr> -->
          <div class="row">  <!-- for center -->
              <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
              <!-- a -->
            <form class="form-horizontal" name="employee_master_form" id="employee_master_form"  method="post">
              {{csrf_field()}}
          

                  <div class="col-md-6">
                   <div class="form-group row">
                        <label for="empcode" class="col-sm-4 col-form-label">Employee&nbsp;Code:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="empcode" name="empcode" placeholder="Employee Code"  required>
                          <label id="err_empcode" class="error_class"></label>
                        </div>
                      </div>
                  </div>



                  <div class="col-md-6">
                   <div class="form-group row">
                        <label for="empname" class="col-sm-4 col-form-label">Employee&nbsp;Name:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="empname" name="empname"   placeholder="Employee Name"  required>
                                        <label id="err_empname" class="error_class"></label>
                        </div>
                      </div>
                    </div>




                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="companyname" class="col-sm-4 col-form-label">Company&nbsp;Name:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="companyname" name="companyname"   placeholder="Enter a Company Name"  required>
                           <option value="1000">RupeeBoss</option>
                      <option value="1001">PolicyBoss</option>
                   
                         </select>
                         <label id="err_companyname" class="error_class"></label>
                        </div>
                      </div>
                    </div>



                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label">Address:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="address" name="address"   placeholder="Address"  required>
                             <label id="err_address" class="error_class"></label>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email Id:</label>
                         <div class="col-sm-6">
                          <input type="text" class="form-control" id="email" name="email"   placeholder="Email Id" oninput="mail('email')"  required>
                         <label id="err_email" class="error_class"></label>
                        </div>
                      </div>
                    </div>



                   <div class="col-md-6">
                     <div class="form-group row">
                        <label for="DOB" class="col-sm-4 col-form-label">Date Of&nbsp;Birth:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control datepicker_id" id="DOB" name="DOB"  placeholder="DOB"  required>
                           <label id="err_DOB" class="error_class"></label>
                        </div>
                      </div>
                    </div>

                    

                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="mobile" class="col-sm-4 col-form-label">Mobile:</label>
                        <div class="col-sm-6">
                          <input type="mobile" class="form-control" id="mobile" name="mobile"   placeholder="Mobile No" minlength="10" maxlength="10" onkeypress="return fnAllowNumeric(event)" required>
                           <label id="err_mobile" class="error_class"></label>
                        </div>
                      </div>
                    </div>



                       <div class="col-md-6">
                   <div class="form-group row">
                        <label for="department" class="col-sm-4 col-form-label">Department:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="department" name="department" required>
                          <option disabled selected  value="">Select One</option>
                       @foreach ($insert as $insert)
                       <option value="{{ $insert->Department_Id}}">{{ $insert->Department_Name}}</option>
                     @endforeach


                   </select>
                    <label id="err_department" class="error_class"></label>
                        </div>
                      </div>
                    </div>





                  <div class="col-md-6">
                   <div class="form-group row">
                        <label for="designation" class="col-sm-4 col-form-label">Designation:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="designation_id" name="designation_id" required>
                          <option disabled selected  value="">Select One</option>
                      @foreach ($selects as $select)
                       <option value="{{ $select->Designation_Id}}">{{ $select->Designation}}</option>
                     @endforeach
                   </select>
                    <label id="err_designation_id" class="error_class"></label>
                        </div>
                      </div>
                    </div>



                       <div class="col-md-6">
                   <div class="form-group row">
                        <label for="reporting_authority" class="col-sm-4 col-form-label">Reporting&nbsp;Authority:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="reporting_authority" name="reporting_authority" required>
                            <option disabled selected value="">Select One</option>
                      @foreach($users as $user)
                       <option value="{{$user->emp_code}}">{{$user->emp_name}}</option>
                       @endforeach 
                       </select>
                             <label id="err_reporting_authority" class="error_class"></label>
                        </div>
                      </div>
                    </div>




                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="date_of_joining" class="col-sm-4 col-form-label">Date&nbsp;Of&nbsp;Joining:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control datepicker_id" id="date_of_joining" name="date_of_joining"  placeholder="DOJ"  required>
                                     <label id="err_date_of_joining" class="error_class"></label>
                        </div>
                      </div>
                    </div>



                       <div class="col-md-6">
                   <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Band:</label>
                        <div class="col-sm-6">
                          <select  class="form-control" id="band" name="band"  required>
                      <option disabled selected  value="0">Select Band</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                     
                     </select>
                             <label id="err_band" class="error_class"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                   <div class="form-group row">
                       <label for="inputPassword" class="col-sm-4 col-form-label">Variable:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="variable" name="variable"  value="" placeholder="Variable"  required>
                                 <label id="err_variable" class="error_class"></label>
                      </div>
                    </div>
                  </div>
                    

                    <div class="col-md-6">
                   <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">CTC:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="ctc" name="ctc"  value="" placeholder="CTC"  required>
                               <label id="err_ctc" class="error_class"></label>
                        </div>
                      </div>
                    </div>




                      <div class="col-md-12">
                        <div class="form-group row">
                        <label for="Is_Active" class="col-sm-2 col-form-label">Is&nbsp;Active:</label>
                        <div class="col-sm-4">
                         <label><input id="Is_Active" name="Is_Active" type="checkbox" value="Yes" style="zoom:1.5;"></label>
                        </div>
                      </div>
                    </div> 



                    <center><div class="col-sm-12">
                   <button type="button" id="sub" class="btn btn-primary">Submit</button>
                  <input type="Reset" value="Reset" class="btn btn">
          </div></center>
        </form>
      </div>
    </div>
  </div>
</div>
</div>



<script type="text/javascript">
  $('#sub').click(function(){
    $(".error_class").empty();
    //alert();
     var formdata = new FormData($("#employee_master_form")[0]);
     //alert(formdata);
    $.ajax({  
           type: "POST",  
           url: "{{URL::to('employee-master_submit')}}",
            //data : $('#project_m').serialize(),
            data : formdata,
           processData: false,
             contentType : false,
             success: function(msgdata){

              // if(msgdata[0].id >0){
              //     alert(msgdata[0].msg);
              //     location.reload();

              var response = JSON.parse(msgdata);

              if (response.status == "success") {

                alert(response.messege);

              }else
                    if(response.messege == "error"){

                  window.location = response.redirectUrl;
               }
               else{
                  $.each(response , function(key , value){
                     $("#err_" + key).text(value);
                  });
               }
             
             
  
           }
        }); 
  });
</script>




  


        


       @endsection

