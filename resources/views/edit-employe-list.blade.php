@extends('include.master')
@section('content')
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
            <form class="form-horizontal" name="employee_form" id="employee_form"  method="post"  action="{{url('update_employe_list')}}"> 

              {{csrf_field()}}

              <input type="hidden" name="u_EmpId" id="u_EmpId" value="{{ $user->EmpId}}">
          

                 <div class="col-md-6">
                    <div class="form-group row">
                        <label for="u_empcode" class="col-sm-4 col-form-label">Employee Code:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_empcode" name="u_empcode" placeholder="Enter a Employee Code" disabled="true" readonly="readonly" value="{{ $user->Emp_Code}}">
                        </div>
                      </div>
                    </div>



                    <div class="col-md-6">
                     <div class="form-group row">
                        <label for="u_empname" class="col-sm-4 col-form-label">Employee Name:</label>
                        <div class="col-sm-6">
                          <input type="p_u_empname" class="form-control" id="u_empname" name="u_empname" placeholder="Enter a Employee Name" value="{{ $user->Emp_Name}}">
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
                   
        @endforeach
         </select>
                        </div>
                      </div>
                    </div>



                 <div class="col-md-6">
                     <div class="form-group row">
                        <label for="u_address" class="col-sm-4 col-form-label">Address:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_address" name="u_address"   placeholder="Enter a Address" value="{{ $user->Address}}" >
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="u_email" class="col-sm-4 col-form-label">Email Id:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_email" name="u_email"   placeholder="Enter a Email Id" oninput="mail('email')" value="{{ $user->Email_Id}}">
                          <span id="email_id" style="display:none;color: red; font-size: 10px">Please Enter Valid Email Id.</span>
                        </div>
                      </div>
                    </div>



                 <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_dob" class="col-sm-4 col-form-label">Date&nbsp;Of&nbsp;birth:</label>
                        <div class="col-sm-6">
                          <input type="Date" class="form-control" id="u_dob" name="u_dob"  placeholder="Enter a DOB" value="{{ $user->DOB}}">
                        </div>
                      </div>
                    </div>


                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_mobile" class="col-sm-4 col-form-label">Mobile:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_mobile" name="u_mobile"   placeholder="Enter a Bank Name" minlength="10" maxlength="10" onkeypress="return fnAllowNumeric(event)" value="{{ $user->Mobile}}">
                        </div>
                      </div>
                    </div>



                  <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_department" class="col-sm-4 col-form-label">Department:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="u_department" name="u_department">
                      
                       @foreach ($insert as $insert)
                       @if($insert->Department_Id == $user->Department_Id)
                       <option selected="true" value="{{$insert->Department_Id}}">{{ $insert->Department_Name}}</option>
                       @else
                       <option value="{{$insert->Department_Id}}">{{ $insert->Department_Name}}</option>
                       @endif
                     @endforeach
                       </select>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group row">
                        <label for="u_designation" class="col-sm-4 col-form-label">Designation:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="u_designation" name="u_designation" value="">
                     <option value="">{{ $user->Designation}}</option>

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
                          <select type="text" class="form-control" id="u_reporting_authority" name="u_reporting_authority" value="{{ $user->Reporting_emp}}">
                      <option selected value="">{{ $user->Emp_Name}}</option>
                       @foreach($updates as $update)
                       <option value="{{$update->EmpId}}">{{$update->Emp_Name}}</option>
                       @endforeach 
                       </select>
                        </div>
                      </div>
                    </div>




                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="u_date_of_joining" class="col-sm-4 col-form-label">Date&nbsp;of&nbsp;Joining::</label>
                        <div class="col-sm-6">
                          <input type="Date" class="form-control" id="u_date_of_joining" name="u_date_of_joining"   placeholder="Enter a DOJ" value="{{ $user->DOJ}}">
                        </div>
                      </div>
                    </div>



                   <div class="col-md-6">
                     <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Band:</label>
                        <div class="col-sm-6">
                          <select  class="form-control" id="u_band" name="u_band" value="{{ $user->Band}}">
                      <option  selected value="0">{{$user->Band}}</option>
                      @foreach($band as $band)
                      <option value="">{{$band->Band}}</option>
                       @endforeach                    
                     </select>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                       <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Variable:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_variable" name="u_variable"  placeholder="Enter a Variable Name" value="{{ $user->Variable}}">
                        </div>
                      </div>
                    </div>                    



                    <div class="col-md-6">
                       <div class="form-ctc row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">CTC:</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="u_ctc" name="u_ctc"  placeholder="Enter a CTC" value="{{$user->CTC}}">
                        </div>
                      </div>
                    </div>

                 

                    <div class="col-md-12">
                        <div class="form-group row">
                        <label for="u_Is_Active" class="col-sm-2 col-form-label">Is&nbsp;Active::</label>
                        <div class="col-sm-4">
                          @if($user->Is_Active != 0)
                          <input type="checkbox" id="u_Is_Active" name="u_Is_Active" value="1" style="zoom:1.5;" checked="true">
                          @else
                             <input type="checkbox" id="u_Is_Active" name="u_Is_Active" value="0" style="zoom:1.5;">
                         @endif
                        </div>
                      </div>
                    </div>
                    
                    <center><div class="col-sm-12">
                   <button type="submit" id="sub" class="btn btn-primary">Submit</button>
            <button type="reset" value="Reset">Reset</button>
          </div></center>
        </form>
  </div>
</div>
</div>
</div>
</div>  



<!-- <script type="text/javascript">
  if(Is_Active!=0){
      $("#u_Is_Active").attr("checked", true);
    }else{
      $("#u_Is_Active").attr("checked", false);
    }
</script> -->
@endsection