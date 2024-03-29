@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
         <h3 class="box-title"> Manage Leads</h3>
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
                    <input type="text" class="form-control" id="Lead_id" name="Lead_id" value="{{$user[0]->Lead_id}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
             <div class="form-group row">
                  <label for="dob" class="col-sm-4 col-form-label">Date Of Birth:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="dob" name="dob" value="{{$user[0]->dob}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="name" class="col-sm-4 col-form-label">Name:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="name" name="name" value="{{$user[0]->name}}">
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="address" class="col-sm-4 col-form-label">Address*:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="address" name="address" value="{{$user[0]->address}}">
                 </div>
               </div>
             </div>



            <div class="col-md-6">
               <div class="form-group row">
                 <label for="pan" class="col-sm-4 col-form-label">PAN No:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="pan" minlength="10" maxlength="10" name="pan" value="{{$user[0]->pan}}">
                 </div>
               </div>
             </div>


            <div class="col-md-6">
             <div class="form-group row">
                  <label for="mobile" class="col-sm-4 col-form-label">Mobile No:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" minlength="10" maxlength="10" id="mobile" name="mobile" value="{{$user[0]->mobile}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="AadharNo" class="col-sm-4 col-form-label">Aadhaar No:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="Aadhaar_Card" name="Aadhaar_Card" value="{{$user[0]->Aadhaar_Card}}">                 
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="email" class="col-sm-4 col-form-label">Email Id:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="email" name="email" value="{{$user[0]->email}}">
                 </div>
               </div>
             </div>



            <div class="col-md-6">
               <div class="form-group row">
                 <label for="Pincode" class="col-sm-4 col-form-label">Pincode*:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="Pincode" name="Pincode" value="{{$user[0]->Pincode}}">
                 </div>
               </div>
             </div>



             <div class="col-md-6">
               <div class="form-group row">
               <label for="designation" class="col-sm-4 col-form-label">Designation:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="designation" name="designation" value="{{$user[0]->designation}}">
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
                     @if($city->city_id == $user[0]->cityid)
                     <option selected="true" value="{{$user[0]->cityid}}">{{$city->city_name}}</option>
                     @else
                    <option value="{{$city->city_id}}">{{$city->city_name}}</option> 
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
                    <input type="CompanyName" class="form-control" id="CompanyName" name="CompanyName" value="{{$user[0]->companyname}}">
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
                    @if($val->lead_Status_id == $user[0]->lead_status_id)
                     <option  value="{{$user[0]->lead_status_id}}">{{$val->Lead_Status}}</option>
                     @else
                    <option value="{{$val->lead_Status_id}}">{{$val->Lead_Status}}</option>
                    @endif
                    @endforeach
                 </select>
                  </div>
                </div>
              </div>

            <div class="col-md-6">
               <div class="form-group row">
                 <label for="Lead" class="col-sm-4 col-form-label">Sub Lead Status*:</label>
                 <div class="col-sm-6">
                   <select type="text" class="form-control" id="Lead" name="Lead">
                     <option></option>
                   </select>
                 </div>
               </div>
             </div>


            <div class="col-md-6">
              <div class="form-group row">
                <label for="empname" class="col-sm-4 col-form-label">Is Share:</label>
                   <div class="col-sm-6">
                  <div class="form-control">
              
                  @if($user[0]->is_share==1)
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
            </div>



  <div class="col-md-6">
               <div class="form-group row">
                 <label for="sharePercent" class="col-sm-4 col-form-label">Share(%):</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="sharePercent" name="sharePercent" value="{{$user[0]->sharepercent}}">
                 </div>
               </div>
             </div>
      <div class="col-md-6">
               <div class="form-group row">
               <label for="ndate" class="col-sm-4 col-form-label">FollowUp Date:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="ndate" name="ndate" value="{{$user[0]->ndate}}"> 
                </div>
              </div>
            </div>


          
             <div class="col-md-6">
               <div class="form-group row">
               <label for="FollowTime" class="col-sm-4 col-form-label">Follow Time:</label>
               <div class="col-sm-6">
                 <select type="text" class="form-control" id="FollowTime" name="FollowTime" value="{{$user[0]->FollowTime}}">
                    <option>Select One</option>
                   
     
      <option value="9:00 AM">9:00 AM</option>
      <option value="9:15 AM">9:15 AM</option>
      <option value="9:30 AM">9:30 AM</option>
      <option value="9:45 AM">9:45 AM</option>
      <option value="10:00 AM">10:00 AM</option>
      <option value="10:15 AM">10:15 AM</option>
      <option value="10:30 AM">10:30 AM</option>
      <option value="10:45 AM">10:45 AM</option>
      <option value="11:00 AM">11:00 AM</option>
      <option value="11:15 AM">11:15 AM</option>
      <option value="11:30 AM">11:30 AM</option>
      <option value="11:45 AM">11:45 AM</option>
      <option value="12:00 PM">12:00 PM</option>
      <option value="12:15 PM">12:15 PM</option>
      <option value="12:30 PM">12:30 PM</option>
      <option value="12:45 PM">12:45 PM</option>
      <option value="1:00 PM">1:00 PM</option>
      <option value="1:15 PM">1:15 PM</option>
      <option value="1:30 PM">1:30 PM</option>
      <option value="1:45 PM">1:45 PM</option>
      <option value="2:00 PM">2:00 PM</option>
      <option value="2:15 PM">2:15 PM</option>
      <option value="2:30 PM">2:30 PM</option>
      <option value="2:45 PM">2:45 PM</option>
      <option value="3:00 PM">3:00 PM</option>
      <option value="3:15 PM">3:15 PM</option>
      <option value="3:30 PM">3:30 PM</option>
      <option value="3:45 PM">3:45 PM</option>
      <option value="4:00 PM">4:00 PM</option>
      <option value="4:15 PM">4:15 PM</option>
      <option value="4:30 PM">4:30 PM</option>
      <option value="4:45 PM">4:45 PM</option>
      <option value="5:00 PM">5:00 PM</option>
      <option value="5:15 PM">5:15 PM</option>
      <option value="5:30 PM">5:30 PM</option>
      <option value="5:45 PM">5:45 PM</option>
      <option value="6:00 PM">6:00 PM</option>
      <option value="6:15 PM">6:15 PM</option>
      <option value="6:30 PM">6:30 PM</option>
      <option value="6:45 PM">6:45 PM</option>
      <option value="7:00 PM">7:00 PM</option>
      <option value="7:15 PM">7:15 PM</option>
      <option value="7:30 PM">7:30 PM</option>
      <option value="7:45 PM">7:45 PM</option>
      <option value="8:00 PM">8:00 PM</option>
      <option value="8:15 PM">8:15 PM</option>
      <option value="8:30 PM">8:30 PM</option>
      <option value="8:45 PM">8:45 PM</option>

                 </select>
                </div>
              </div>
            </div>




             <div class="col-md-6">
             <div class="form-group row">
                  <label for="source_id" class="col-sm-4 col-form-label">Source Name:</label>
                  <div class="col-sm-6">
                    <select type="text" class="form-control search_citynm" id="source_id" name="source_id">
                         @foreach($source as $val)
                     <!-- <option value="{{$user[0]->source_id}}">{{$val->source_name}}</option> -->
                <!-- 
                    <option value="{{$val->source_id}}">{{$val->source_name}}</option> -->
                    <option value="{{$val->source_id}}" {{$user[0]->source_id == $val->source_id  ? 'selected' : ''}}>{{$val->source_name}}</option>

                    <@endforeach

                 </select>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
             <div class="form-group row">
                  <label for="ExpctDisbsDate" class="col-sm-4 col-form-label">Exp. disbursal Date:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="ExpctDisbsDate" name="ExpctDisbsDate" value="{{$user[0]->ExpctDisbsDate}}">
                  </div>
                </div>
              </div>

            

<div class="col-md-6">
              <div class="form-group row">
                <label for="rba_type" class="col-sm-4 col-form-label">Associate Type:</label>
                <div class="col-sm-6">
                  <div class="form-control">
              
                  @if($user[0]->rba_type=='RBA')
                  <label for="RBA">RBA</label>
                  <input type="radio" id="rba_type" name="associate_type" class="associate" value="RBA" checked="checked" />
                  <label for="FBA">FBA</label>
                   <input type="radio" id="fba_type" name="associate_type" class="associate"  value="FBA"/> 
                   @else
                  <label for="RBA">RBA</label>
                   <input type="radio" id="rba_type" name="associate_type" class="associate"  value="RBA"/>
                   <label for="FBA">FBA</label>
                   <input type="radio" id="fba_type" name="associate_type" value="FBA" class="associate"  checked="checked"/>                 
                  @endif
                </div>
              </div>
           
              </div>
            </div>
            
            <div class="col-md-6">
               <div class="form-group row">
                 <label for="Broker_name" class="col-sm-4 col-form-label">Broker Name:</label>
                 <div class="col-sm-6">
                   <select type="text" class="form-control" id="Broker_name" name="Broker_name">
                    <option disabled selected value="0">Select One</option>
                    @foreach($rdata as $val)
                   <option value="{{$val->Broker_id}}">{{$val->Broker_Name}} </option>
                   @endforeach 
                 </select>
                 </div>   
               </div>
             </div>
              
             <div class="col-md-6">
              <div class="form-group row">
                <label for="empname" class="col-sm-4 col-form-label">Emp Type:</label>


                 <div class="col-sm-6">
                  <div class="form-control">
                  <label for="Internal">Internal</label>
                  <input type="radio" id="Internal" name="Internal" value="Internal" class="emp_type" checked="checked" />
                  <label for="Other">Other</label>
                   <input type="radio" id="Other" name="Internal" value="Other" class="emp_type"/> 
                   </div>
                 
           
              </div>
            </div>
          </div>

            <div class="col-md-6">
             <div class="form-group row">
                  <label for="emp_code" class="col-sm-4 col-form-label">Assign To*:</label>
                  <div class="col-sm-6">
                     <select type="text" class="form-control" id="emp" name="emp">
                 <option disabled selected value="0">Select One</option>
           
                  @foreach($empdata as $val)

<option value="{{$val->emp_code}}" {{$user[0]->emp_code == $val->emp_code  ? 'selected' : ''}}>{{$val->name}}</option>

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
               
                  <option value="{{$rmanager->emp_code}}">{{$rmanager->Emp_Name}}</option>
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
               <label for="demo_given" class="col-sm-4 col-form-label">Demo Given:</label>
            
                 @if($user[0]->demo_given != 0)
                <label >Is Demo Given?<input type="checkbox"  id="demo_given" name="demo_given" value="1" style="zoom:1.5;" checked="true">
                  @else
                  <input type="checkbox"  id="demo_given" name="demo_given" value="0" style="zoom:1.5;">
                    @endif
                </label>
       
              </div>
            </div>

 <div class="col-md-6">
               <div class="form-group row">
               <label for="Business_M" class="col-sm-4 col-form-label">Business Manager:</label>
               <div class="col-sm-6">
                 <select type="text" class="form-control" id="Business_M" name="Business_M">
                 <option disabled selected value="0">Select One</option>
               
                </select>
              </div>
            </div>
          </div>


             <div class="col-md-6">
               <div class="form-group row">
                 <label for="Remark" class="col-sm-4 col-form-label">Remark:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control" id="Remark" name="Remark" value="{{$user[0]->remark}}">
                 </div>
               </div>
             </div>

 <!-- no update --> <div class="col-md-12">
               <div class="form-group row">
                 <label for="dbm" class="col-sm-2 col-form-label">Disbursed Document :</label>
                   <input type="file" name="Document1" id="Document1">
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
                      @if($bank->Bank_Id == $user[0]->bank_id)
                      <option selected="true" value="{{$bank->Bank_Id}}">{{$bank->Bank_Name}}</option>
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
                 <input type="text" class="form-control" id="Bank_RM_Name" name="Bank_RM_Name" value="{{$user[0]->Bank_RM_Name}}">
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
                    @if($val->Product_Id == $user[0]->productid)
                    <option selected="true" value="{{$user[0]->productid}}">{{$val->Product_Name}}</option>
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
                    <input type="text" class="form-control" id="Bank_RM_NO" name="Bank_RM_NO" value="{{$user[0]->Bank_RM_NO}}">
                  </div>
                </div>
              </div>


            <div class="col-md-6">
               <div class="form-group row">
               <label for="loan_amt" class="col-sm-4 col-form-label">Loan Amount*:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="loan_amt" name="loan_amt" value="{{$user[0]->loan_amt}}">
                </div>
              </div>
            </div>


            <div class="col-md-6">
               <div class="form-group row">
                 <label for="Bank_Login_Id" class="col-sm-4 col-form-label">Bank Login Id:</label>
                 <div class="col-sm-6">
                   <input type="text" class="form-control search_Emp_Name" id="Bank_Login_Id" name="Bank_Login_Id" value="{{$user[0]->Bank_Login_Id}}">
                 </div>
               </div>
             </div>


             <div class="col-md-6">
               <div class="form-group row">
               <label for="Loan_Acc_No" class="col-sm-4 col-form-label">Loan A/c No:</label>
               <div class="col-sm-6">
                 <input type="text" class="form-control" id="Loan_Acc_No" name="Loan_Acc_No" value="{{$user[0]->Loan_Acc_No}}">
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

<script type="text/javascript">
  $(function(){
   $('#Lead_Status_id').change(function() {
    var id = $('#Lead_Status_id').val();

<<<<<<< HEAD
    alert(id);


        $.ajax({
         url: '/lead_sub_status/'+id,
=======
      // alert(id);
        $.ajax({
         url: "{{url('lead_sub_status')}}/"+id,
>>>>>>> ecf84bfacab0a976ef46b8094c1443e98d2545ed
          type: 'GET',
          data: "",
          success: function(response)
          {

            

           var d = JSON.parse(response);
           $('#Lead').empty();
           for(var i=0;i<d.length;i++)
           {
            $('#Lead').append("<option value="+d[i].lead_Status_id+">"+d[i].Lead_Status+"</option>");
          }


        }
      });
      });
 });    
</script>

<script type="text/javascript">
    $(document).ready(function(){
   $('.associate').change(function() {

     if ($("input[name='associate_type']:checked").val() == 'RBA') {
                 var id ='RBA'

                 }
            if ($("input[name='associate_type']:checked").val() == 'FBA') {
              var id ='FBA'
            }
   // var id = $('.associate').val();

          var Lead_id= $("#Lead_id").val();
     //alert(Lead_id);
        $.ajax({
         url: "{{url('rba_load_status')}}/"+id + '/' + Lead_id,
          type: 'GET',
          data: "",
          success: function(response)
          {

            

           var d = JSON.parse(response);
           $('#Broker_name').empty();
           for(var i=0;i<d.length;i++)
           {
            $('#Broker_name').append("<option value="+d[i].Broker_id+">"+d[i].Broker_Name+"</option>");
          }


        }
      });
      });
 });    
</script>


<script type="text/javascript">
    $(document).ready(function(){
   $('.emp_type').change(function() {

     if ($("input[name='Internal']:checked").val() == 'Internal') {
                 var id ='Internal'

                 }
            if ($("input[name='Internal']:checked").val() == 'Other') {
              var id ='Other'
            }
   // var id = $('.associate').val();

          var Lead_id= $("#Lead_id").val();
    // alert(id);
        $.ajax({
         url: "{{url('emp_load_status')}}/"+id + '/' + Lead_id,
          type: 'GET',
          data: "",
          success: function(response)
          {

            

           var d = JSON.parse(response);
           $('#emp').empty();
           for(var i=0;i<d.length;i++)
           {
            $('#emp').append("<option value="+d[i].emp_code+">"+d[i].name+"</option>");
          }


        }
      });
      });
 });    
</script>


@endsection