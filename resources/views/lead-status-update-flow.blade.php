@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
         <h3 class="box-title"> Lead Status Update Flow</h3>
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
            <form class="form-horizontal" name="update_manage_leads" id="update_manage_leads" action="{{url('update_manage_leads')}}"  method="POST">
              {{csrf_field()}}

             <center><h4><b>Personal Details</b></h4></center><hr>
             <div class="col-md-6">
             <div class="form-group row">
                  <label for="Lead_id" class="col-sm-4 col-form-label">Lead Id:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="Lead_id" name="Lead_id" value="{{$user->Lead_id}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
             <div class="form-group row">
                  <label for="dob" class="col-sm-4 col-form-label">Date Of Birth:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="dob" name="dob" value="{{$user->dob}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="name" class="col-sm-4 col-form-label">Name:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="address" class="col-sm-4 col-form-label">Address*:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
                 </div>
               </div>
             </div>



            <div class="col-md-6">
               <div class="form-group row">
                 <label for="pan" class="col-sm-4 col-form-label">PAN No:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="pan" minlength="10" maxlength="10" name="pan" value="{{$user->pan}}">
                 </div>
               </div>
             </div>


            <div class="col-md-6">
             <div class="form-group row">
                  <label for="mobile" class="col-sm-4 col-form-label">Mobile No:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" minlength="10" maxlength="10" id="mobile" name="mobile" value="{{$user->mobile}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="AadharNo" class="col-sm-4 col-form-label">Aadhaar No:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="AadharNo" name="AadharNo" value="{{$user->AadharNo}}">                 
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="email" class="col-sm-4 col-form-label">Email Id:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                 </div>
               </div>
             </div>



            <div class="col-md-6">
               <div class="form-group row">
                 <label for="Pincode" class="col-sm-4 col-form-label">Pincode*:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="Pincode" name="Pincode" value="{{$user->Pincode}}">
                 </div>
               </div>
             </div>



             <div class="col-md-6">
               <div class="form-group row">
               <label for="Designation" class="col-sm-4 col-form-label">Designation:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="Designation" name="Designation" value="{{$user->Designation}}">
                </div>
              </div>
            </div>



            <div class="col-md-6">
               <div class="form-group row">
                 <label for="cityid" class="col-sm-4 col-form-label">City:</label>
                 <div class="col-sm-6">
                   <select type="text" class="form-control" id="cityid" name="cityid">
                    <option selected disabled value="0">Select One</option>                   
                    @foreach ($city as $city)
                     @if($city->City_Id == $user->cityid)
                     <option selected="true" value="{{$user->cityid}}">{{$user->City_Name}}</option>
                     @else
                    <option value="{{$city->City_Id}}">{{$city->City_Name}}</option> 
                    @endif                 
                    @endforeach                   
                 </select>
                 </div>
               </div>
             </div>



             <div class="col-md-6">
             <div class="form-group row">
                  <label for="CompanyName" class="col-sm-4 col-form-label">Company Name:</label>
                  <div class="col-sm-6">
                    <input type="CompanyName" class="form-control" id="CompanyName" name="CompanyName" value="{{$user->CompanyName}}">
                  </div>
                </div>
              </div>


              <center><h4><b>Followup Details</b></h4></center><hr>

            <div class="col-md-6">
             <div class="form-group row">
                  <label for="Lead_Status_id" class="col-sm-4 col-form-label">Main&nbsp;Lead&nbsp;Status*:</label>
                  <div class="col-sm-6">
                    <select type="text" class="form-control" id="Lead_Status_id" name="Lead_Status_id" >

                    @foreach($mlstatus as $val)
                    @if($city->City_Id == $user->cityid)
                     <option  value="{{$user->Lead_Status_id}}">{{$user->Lead_Status}}</option>
                     @else
                    <option value="{{$val->Lead_Status_Id}}">{{$val->Lead_Status}}</option>
                    @endif
                    @endforeach
                 </select>
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="demo_given" class="col-sm-4 col-form-label">Demo Given:</label>
               <div class="col-sm-6">
                 @if($user->demo_given != 0)
                <label >Is Demo Given?<input type="checkbox"  id="demo_given" name="demo_given" value="1" style="zoom:1.5;" checked="true">
                  @else
                  <input type="checkbox"  id="demo_given" name="demo_given" value="0" style="zoom:1.5;">
                    @endif
                </label>
                </div>
              </div>
            </div>


            



            <div class="col-md-6">
               <div class="form-group row">
                 <label for="Lead" class="col-sm-4 col-form-label">Sub Lead Status*:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="Lead" name="Lead">
                 </div>
               </div>
             </div>


            <div class="col-md-6">
              <div class="form-group row">
                <label for="empname" class="col-sm-4 col-form-label">Is Share:</label>
                <div class="col-sm-6">
                  @if($user->Is_share==1)
                  <label for="one">Yes</label>
                  <input type="radio" id="one" name="Is_share" value="1" checked="checked" />
                  <label for="two">No</label>
                   <input type="radio" id="one" name="Is_share" value="2"/> 
                   @else
                  <label for="one">Yes</label>
                   <input type="radio" id="one" name="Is_share" value="1"/>
                   <label for="two">No</label>
                   <input type="radio" id="one" name="Is_share" value="2" checked="checked"/>                 
                  @endif
                </div>
              </div>
            </div>




            <div class="col-md-6">
              <div class="form-group row">
                <label for="empname" class="col-sm-4 col-form-label">Call Type:</label>
                <div class="col-sm-6">
                  @if($user->Call_type==1)
                  <label for="one">Calling</label>
                  <input type="radio" id="one" name="Call_type" value="1" checked="checked" />
                  <label for="two">Field Visit</label>
                   <input type="radio" id="one" name="Call_type" value="2"/> 
                   @else
                  <label for="one">Calling</label>
                   <input type="radio" id="one" name="Call_type" value="1"/>
                   <label for="two">Field Visit</label>
                   <input type="radio" id="one" name="Call_type" value="2" checked="checked"/>                  
                  @endif
                </div>
              </div>
            </div>


 

            <div class="col-md-6">
               <div class="form-group row">
               <label for="ndate" class="col-sm-4 col-form-label">FollowUp Date:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="ndate" name="ndate" value="{{$user->ndate}}"> 
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="sharePercent" class="col-sm-4 col-form-label">Share(%):</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="sharePercent" name="sharePercent" value="{{$user->sharePercent}}">
                 </div>
               </div>
             </div>


             <div class="col-md-6">
               <div class="form-group row">
               <label for="FollowTime" class="col-sm-4 col-form-label">Follow Time:</label>
               <div class="col-sm-6">
                 <select type="text" class="form-control" id="FollowTime" name="FollowTime" value="{{$user->FollowTime}}">
                    <option>Select One</option>
                 </select>
                </div>
              </div>
            </div>


          <!--   <div class="col-md-6">
               <div class="form-group row">
                 <label for="Call_type" class="col-sm-4 col-form-label">Call Type:</label>
                 <div class="col-sm-6">
                   <select type="text" class="form-control" id="Call_type" name="Call_type">
                    <option selected disabled value="0">select</option>
                    <option value="1">Calling</option>
                    <option value="2">Field Visit</option>
                   </select>
                 </div>
               </div>
             </div>

 -->





             <div class="col-md-6">
             <div class="form-group row">
                  <label for="source_id" class="col-sm-4 col-form-label">Source Name:</label>
                  <div class="col-sm-6">
                    <select type="text" class="form-control search_citynm" id="source_id" name="source_id">
                     <option value="{{$user->source_id}}">{{$user->source_name}}</option>
                    @foreach($source as $val)
                    <option value="{{$val->source_id}}">{{$val->source_name}}</option>
                    <@endforeach

                 </select>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
             <div class="form-group row">
                  <label for="ExpctDisbsDate" class="col-sm-4 col-form-label">Exp. disbursal Date:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="ExpctDisbsDate" name="ExpctDisbsDate" value="{{$user->ExpctDisbsDate}}">
                  </div>
                </div>
              </div>

            


            <div class="col-md-6">
               <div class="form-group row">
               <label for="broker_id" class="col-sm-4 col-form-label">Broker Name:</label>
               <div class="col-sm-6">
                 <select type="text" class="form-control" id="broker_id" name="broker_id">
                  <option>Select One</option>                      
                    @foreach($broker as $val) 
                     @if($val->Broker_id == $user->broker_id)
                    <option selected="true" value="{{$val->Broker_id}}">{{$user->Broker_Name}}</option>
                    @else                         
                    <option value="{{$val->Broker_id}}">{{$val->Broker_Name}}</option>
                    @endif
                    @endforeach
                 </select>
                </div>
              </div>
            </div>




<!-- no update --> <div class="col-md-6">
               <div class="form-group row">
                 <label for="Business_M" class="col-sm-4 col-form-label">Business Manager:</label>
                 <div class="col-sm-6">
                   <select type="text" class="form-control" id="Business_M" name="Business_M">
                    <option disabled selected value="0">Select One</option>
                    @foreach($manager as $val)                
                   

                    <option value="{{$val->Emp_Code}}">{{$val->Emp_Name}}</option>
                   
                    @endforeach
                 </select>
                 </div>   
               </div>
             </div>


            <div class="col-md-6">
             <div class="form-group row">
                  <label for="emp_code" class="col-sm-4 col-form-label">Assign To*:</label>
                  <div class="col-sm-6">
                    <select type="text" class="form-control" id="emp_code" name="emp_code">                    
                    <option selected disabled value="0">Select One</option>
                    @foreach($assign as $assign)
                    @if($assign->Emp_Code == $user->emp_code)
                      <option selected="true" value="{{$assign->Emp_Code}}">{{$user->emp_code}}</option>
                      @else              
                    <option value="{{$assign->Emp_Code}}">{{$assign->Emp_Name}}</option>
                    @endif
                    @endforeach               
                 </select>
                  </div>
                </div>
              </div>


<!-- no update --> <div class="col-md-6">
               <div class="form-group row">
               <label for="Relationship_M" class="col-sm-4 col-form-label">Relationship Manager:</label>
               <div class="col-sm-6">
                 <select type="text" class="form-control" id="Relationship_M" name="Relationship_M">
                 <option disabled selected value="0">Select One</option>
                  @foreach($rmanager as $rmanager)
               
                  <option value="{{$rmanager->Emp_Code}}">{{$rmanager->Emp_Name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>


<!-- no update -->   <div class="col-md-6">
               <div class="form-group row">
                 <label for="bh" class="col-sm-4 col-form-label">Business Head:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="bh" name="bh">
               
                 </div>
               </div>
             </div>


             <div class="col-md-6">
               <div class="form-group row">
               <label for="Uploaded_Dt" class="col-sm-4 col-form-label">Upload Disbursed:</label>
               <div class="col-sm-6">
                 <input type="file" class="form-control" id="Uploaded_Dt" name="Uploaded_Dt" value="{{$user->Uploaded_Dt}}">
                </div>
              </div>
            </div>


             <div class="col-md-6">
               <div class="form-group row">
                 <label for="Remark" class="col-sm-4 col-form-label">Remark:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="Remark" name="Remark" value="{{$user->Remark}}">
                 </div>
               </div>
             </div>

 <!-- no update --> <div class="col-md-12">
               <div class="form-group row">
                 <label for="dbm" class="col-sm-2 col-form-label">Disbursed Document :</label>
                <!--  <div class="col-sm-6">
                   <input type="text" class="form-control search_Emp_Name" id="dbm" name="dbm" value="">
                 </div> -->
               </div>
             </div>



              <center><h4><b>Bank Details</b></h4></center><hr>

            <div class="col-md-6">
             <div class="form-group row">
                  <label for="Bank_Id" class="col-sm-4 col-form-label">Bank Name:</label>
                  <div class="col-sm-6">
                    <select type="text" class="form-control" id="Bank_Id" name="Bank_Id">
                      <option>Select One</option>
                      @foreach($bank as $bank)
                      @if($bank->Bank_Id == $user->Bank_Id)
                      <option selected="true" value="{{$bank->Bank_Id}}">{{$user->Bank_Name}}</option>
                      @else
                      <option value="{{$bank->Bank_Id}}">{{$bank->Bank_Name}}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="Bank_RM_Name" class="col-sm-4 col-form-label">Bank RM Name:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="Bank_RM_Name" name="Bank_RM_Name" value="{{$user->Bank_RM_Name}}">
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="productid" class="col-sm-4 col-form-label">Product Name*:</label>
                 <div class="col-sm-6">
                   <select type="text" class="form-control search_Emp_Name" id="productid" name="productid">
                    <option selected disabled= value="0">Select One</option>
                    @foreach($product as $val)
                    @if($val->Product_Id == $user->productid)
                    <option selected="true" value="{{$user->productid}}">{{$user->Product_Name}}</option>
                    @else
                    <option value="{{$val->Product_Id}}">{{$val->Product_Name}}</option>
                    @endif
                    @endforeach
                  </select>
                 </div>
               </div>
             </div>


            <div class="col-md-6">
             <div class="form-group row">
                  <label for="Bank_RM_NO" class="col-sm-4 col-form-label">Bank RM Mobile:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="Bank_RM_NO" name="Bank_RM_NO" value="{{$user->Bank_RM_NO}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="loan_amt" class="col-sm-4 col-form-label">Loan Amount*:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="loan_amt" name="loan_amt" value="{{$user->loan_amt}}">
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="Bank_Login_Id" class="col-sm-4 col-form-label">Bank Login Id:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control search_Emp_Name" id="Bank_Login_Id" name="Bank_Login_Id" value="{{$user->Bank_Login_Id}}">
                 </div>
               </div>
             </div>


             <div class="col-md-6">
               <div class="form-group row">
               <label for="Loan_Acc_No" class="col-sm-4 col-form-label">Loan A/c No:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="Loan_Acc_No" name="Loan_Acc_No" value="{{$user->Loan_Acc_No}}">
                </div>
              </div>
            </div>   



            <center>
              <div class="col-sm-12">
                <button type="submit" id="sub" class="btn btn-primary">Submit</button>
              </div>
           </center>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>

@endsection