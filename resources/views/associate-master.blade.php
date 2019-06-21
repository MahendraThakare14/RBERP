@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Associate Master</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
                <form class="form-horizontal" name="break_master" id="break_master"  method="post">
                  <input type="hidden" name="txtallproduct" id="txtallproduct">
                  <input type="hidden" name="txtpayout" id="txtpayout">
           {{csrf_field()}}

                     <div class="col-sm-6">
                        <div class="form-group row">
                         <label for="Broker_Name" class="col-sm-5 col-form-label">Associate&nbsp;Name:</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="Broker_Name" name="Broker_Name"  value="" placeholder="Enter a Associate Name"  required>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group row">
                        <label for="Contact_No" class="col-sm-5 col-form-label">Contact&nbsp;No:</label>
                         <div class="col-sm-7">
                          <input type="Mobile" class="form-control" id="Contact_No" name="Contact_No"  maxlength="10" minlength="10" placeholder="Entar a Contact No" onkeypress="return fnAllowNumeric(event)" required>                    
                         </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group row">
                         <label for="Break_Type" class="col-sm-5 col-form-label">PAN&nbsp;No:</label>
                         <div class="col-sm-7">
                          <input type="text" class="form-control" id="PanNo" name="PanNo"   oninput="pancard('PanNo')" maxlength="10" minlength="10" placeholder=" Enter a Pancard*" required>
                           <div id="pannumber" style="display:none;color: red; font-size: 10px">Oops.Please Enter Valid Pan Number.!!</div>
                         </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label for="Break_Type" class="col-sm-5 col-form-label">Email&nbsp;Id:</label>
                           <div class="col-sm-7">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter a Email*" oninput="mail('email')" required>
                            <div id="email_id" style="display:none;color:red;font-size: 10px">Please Enter Valid Email Id.</div>
                           </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group row">
                         <label for="Emp_Code" class="col-sm-5 col-form-label">Assign&nbsp;Employee:</label>
                           <div class="col-sm-7">
                            <select  class="form-control" id="Emp_Code" name="Emp_Code">
                             <option value="-1">Select One</option>
                             @foreach($assign as $val)
                             <option value="{{$val->emp_code}}">{{$val->emp_name}}</option>
                             @endforeach
                            </select>
                           </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label for="city_Id" class="col-sm-5 col-form-label">Select&nbsp;City:</label>
                          <div class="col-sm-7">
                            <select  class="form-control" id="city_Id" name="city_Id">
                              <option disabled selected  value="0">Select&nbsp;City</option>
                              @foreach($lead as $lead)
                              <option value="{{$lead->city_id}}">{{$lead->city_name}}</option>
                              @endforeach
                            </select>
                           </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label for="parentBrokerId" class="col-sm-5 col-form-label">Parent&nbsp;Name:</label>
                          <div class="col-sm-7">
                            <select  class="form-control" id="parentBrokerId" name="parentBrokerId">
                              <option disabled selected  value="0">Select&nbsp;Parent Associate</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label for="remark" class="col-sm-5 col-form-label">Remark:</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="remark" name="remark"  value="" placeholder="Enter Remark"  required>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-12">
                        <div class="form-group row">
                          <label for="Is_Active" class="col-sm-3 col-form-label">Is&nbsp;Active:</label>
                          <div class="col-sm-4">
                           <input type="checkbox"  id="Is_Active" name="Is_Active" value="Yes" style="zoom:1.5;">
                          </div>
                        </div>
                      </div>



  <table id="tblproduct" class="table table-striped table-bordered" role="grid" aria-describedby="otp-details-id_info">
    <thead>
         <tr>
                <th>Sr No</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Payout %</th>
                <th><input type="checkbox"  id="checkAll" name="check" style="width: auto; float: left; display: inline-block; margin-right: 16px;"></th>
            </tr>


          </thead>
            <tbody>
             @foreach($smsdata as $val)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{$val->product_id}}</td>
                <td>{{$val->product_name}}</td>
                <td> <input class="in" type="text" name="{{$val->product_id}}"></td>
                <input class="in" type="text" value="{{$val->product_id}}" name="product_id[]">

                <td><input name="check[]" id="checkAll" class="txtchk" type="checkbox" value="{{$val->product_id}}"></td>
            </tr>
          @endforeach
        </tbody>
      </table>

               <center> 
                 <div class="col-sm-12">
                   <input type="submit" name="Button1" value="Submit" id="Button1" class="btn btn-primary">
                   <input type="Reset" value="Reset" class="btn btn">
                   <input onclick="window.location.href='associate-list'" class="btn btn-info" value="View Associate List">
                   </div>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


    <script type="text/javascript">

      $("#checkAll").click(function(){
     $('.txtchk').not(this).prop('checked', this.checked);
     $(".txtchk:checkbox:checked");
     var txtchk = [];    
     $.each($("input[class='txtchk']:checked"), function(){            
      txtchk.push($(this).val());
    });      
      alert(txtchk);
    $("#txtallproduct").val('');
    $("#txtallproduct").val(txtchk)
    });


$(".txtchk").click(function(){
      var txtchk = [];
      $.each($("input[class='txtchk']:checked"), function(){            
        txtchk.push($(this).val());
      });
    alert(txtchk);
    $("#txtallproduct").val('');
    $("#txtallproduct").val(txtchk);   
  });

  $(document).ready(function(){
    $('#tblproduct').DataTable({
      "paging":   false,      
    });

     $('.in').on('input',function(){
    var allvals = $('.in').map(function() { 
        return this.value; 
    }).get().join(',');
    $('#txtpayout').val(allvals);
  });
  });


</script>
@endsection