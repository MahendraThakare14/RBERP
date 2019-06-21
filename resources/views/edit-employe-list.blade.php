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
         <center><h3 class="box-title">Edit Employee List</h3></center> 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

        

 <div class="box-body">
  <!-- <center><h3 style="color: #0099FF;">Edit Employee List</h3></center><hr> -->
          <div class="row">  <!-- for center -->
              <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
              <!-- a -->
            <form class="form-horizontal" name="employee_master_update" id="employee_master_update"  method="post" > 

              {{csrf_field()}}

              <input type="hidden" name="u_EmpId" id="u_EmpId" value="{{$user[0]->EmpId}}">
          

                 <div class="col-md-6">
                    <div class="form-group row">
                        <label for="u_empcode" class="col-sm-4 col-form-label">Employee Code:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_empcode" name="u_empcode" placeholder="Enter a Employee Code" readonly="readonly" value="{{ $user[0]->emp_code}}">
                           <!-- <label id="err_u_empcode" class="error_class"></label> -->
                        </div>
                      </div>
                    </div>



                    <div class="col-md-6">
                     <div class="form-group row">
                        <label for="u_empname" class="col-sm-4 col-form-label">Employee Name:</label>
                        <div class="col-sm-6">
                          <input type="p_u_empname" class="form-control" id="u_empname" name="u_empname" placeholder="Enter a Employee Name" value="{{ $user[0]->emp_name}}">
                          <label id="err_u_empname" class="error_class"></label>
                        </div>
                      </div>
                    </div>




                  <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_companyname" class="col-sm-4 col-form-label">Company Name:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="u_companyname" name="u_companyname"   placeholder="Enter a Company Name" value="">
                   
             <option value="1000">RupeeBoss</option>
                      <option value="1001">PolicyBoss</option>
                   
    
         </select>
                        </div>
                      </div>
                    </div>



                 <div class="col-md-6">
                     <div class="form-group row">
                        <label for="u_address" class="col-sm-4 col-form-label">Address:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_address" name="u_address"   placeholder="Enter a Address" value="{{ $user[0]->Address}}" >
                           <label id="err_u_address" class="error_class"></label>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="u_email" class="col-sm-4 col-form-label">Email Id:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_email" name="u_email"   placeholder="Enter a Email Id" oninput="mail('email')" value="{{ $user[0]->Email_Id}}">
                          <span id="email_id" style="display:none;color: red; font-size: 10px">Please Enter Valid Email Id.</span>
                           <label id="err_u_email" class="error_class"></label>
                        </div>
                      </div>
                    </div>



                 <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_dob" class="col-sm-4 col-form-label">Date&nbsp;Of&nbsp;birth:</label>
                        <div class="col-sm-6">
                          <input type="Date" class="form-control" id="u_dob" name="u_dob"  placeholder="Enter a DOB" value="{{ $user[0]->DOB}}">
                           <label id="err_u_dob" class="error_class"></label>
                        </div>
                      </div>
                    </div>


                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_mobile" class="col-sm-4 col-form-label">Mobile:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_mobile" name="u_mobile"   placeholder="Enter a Mobile Number" minlength="10" maxlength="10" onkeypress="return fnAllowNumeric(event)" value="{{ $user[0]->Mobile}}">
                           <label id="err_u_mobile" class="error_class"></label>
                        </div>
                      </div>
                    </div>



                  <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_department" class="col-sm-4 col-form-label">Department:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="u_department" name="u_department">
                      
                       @foreach ($insert as $insert)
                       @if($insert->Department_Id == $user[0]->Department_Id)
                       <option selected="true" value="{{$insert->Department_Id}}">{{ $insert->Department_Name}}</option>
                       @else
                       <option value="{{$insert->Department_Id}}">{{ $insert->Department_Name}}</option>
                       @endif
                     @endforeach
        
                       </select><!-- 
                                     <label id="err_u_department" class="error_class"></label> -->
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group row">
                        <label for="u_designation" class="col-sm-4 col-form-label">Designation:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="u_designation" name="u_designation" value="">
                     <option value="{{$user[0]->Designation_id}}">{{ $user[0]->Designation}}</option>

                      @foreach ($masters as $master)
                       <option value="{{$master->Designation_Id}}">{{$master->Designation}}</option>
                     @endforeach

                      </select>
                        </div>
                      </div>
                    </div>





                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_reporting_authority" class="col-sm-4 col-form-label">Reporting&nbsp;Authority:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="u_reporting_authority" name="u_reporting_authority" value="{{ $user[0]->Reporting_emp}}">
                     <option value="{{$user[0]->Reporting_emp}}">{{ $user[0]->Reporting_name}}</option>
                      @foreach ($updates as $updates)
                       <option value="{{$updates->emp_code}}">{{$updates->emp_name}}</option>
                     @endforeach
                    
                       </select>
                        </div>
                      </div>
                    </div>




                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_date_of_joining" class="col-sm-4 col-form-label">Date&nbsp;of&nbsp;Joining:</label>
                        <div class="col-sm-6">
                          <input type="Date" class="form-control" id="u_date_of_joining" name="u_date_of_joining"   placeholder="Enter a DOJ" value="{{ $user[0]->DOJ}}">
                        </div>
                      </div>
                    </div>



                   <div class="col-md-6">
                     <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Band:</label>
                        <div class="col-sm-6">
                          <select  class="form-control" id="u_band" name="u_band" value="{{ $user[0]->Band}}">
                             <option disabled selected  value="0">Select Band</option>
                      <option  selected value="0">{{$user[0]->Band}}</option>
                    
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>              
                     </select>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                       <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Variable:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_variable" name="u_variable"  placeholder="Enter a Variable Name" value="{{ $user[0]->Variable}}">
                        </div>
                      </div>
                    </div>                    



                    <div class="col-md-6">
                       <div class="form-ctc row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">CTC:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_ctc" name="u_ctc"  placeholder="Enter a CTC" value="{{$user[0]->CTC}}">
                        </div>
                      </div>
                    </div>

                 

                    <div class="col-md-12">
                        <div class="form-group row">
                        <label for="u_Is_Active" class="col-sm-2 col-form-label">Is&nbsp;Active:</label>
                        <div class="col-sm-4">
                          @if($user[0]->Is_Active != 0)
                          <input type="checkbox" id="u_Is_Active" name="u_Is_Active" value="1" style="zoom:1.5;" checked="true">
                          @else
                             <input type="checkbox" id="u_Is_Active" name="u_Is_Active" value="0" style="zoom:1.5;">
                         @endif
                        </div>
                      </div>
                    </div>
                    
                    <center><div class="col-sm-12">
                   <button type="button" id="sub" class="btn btn-success">Update</button>
           <!--  <button type="reset" value="Reset">Reset</button> -->
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
     var formdata = new FormData($("#employee_master_update")[0]);
     //alert(formdata);
    $.ajax({  
           type: "POST",  
           url: "{{URL::to('update-emp-master')}}",
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