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
      <h3 class="box-title">Bank Master</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="Absolute-Center is-Responsive">
          <div id="logo-container"></div>
          <div class="col-sm-6 col-sm-offset-2">
            <form class="form-horizontal" name="bank_master" id="bank_master" method="post">
              {{csrf_field()}}


              <div class="form-group row">
                <label for="Bank_Name" class="col-sm-4 col-form-label">Bank&nbsp;Name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Bank_Name" name="Bank_Name"  value="" placeholder="Bank Name"  required>
                     <label id="err_Bank_Name" class="error_class"></label>
                  </div>
              </div>


           

              <div class="form-group row">
                <label for="Product_Name" class="col-sm-4 col-form-label">Address:</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="Bank_Address" name="Bank_Address"  value="" placeholder="Enter a Address"  required></textarea>
                      <label id="err_Bank_Address" class="error_class"></label>
                  </div>
              </div>


              <div class="form-group row">
                <label for="Bank_Code" class="col-sm-4 col-form-label">Bank&nbsp;Code:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Bank_Code" name="Bank_Code"  value="" placeholder="Bank Code"  required>
                      <label id="err_Bank_Code" class="error_class"></label>
                  </div>
              </div>
               <div class="form-group row">
                <label for="Tan_No" class="col-sm-4 col-form-label">TAN&nbsp;No:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Tan_No" name="Tan_No"  value="" placeholder="TAN Number"  required>
                      <label id="err_Tan_No" class="error_class"></label>
                  </div>
              </div>


              <div class="form-group row">
                <label for="Document1" class="col-sm-4 col-form-label">Select&nbsp;File:</label>
                <div class="col-sm-8">
                   <input type="file" name="Document1" id="Document1">
                  <!-- <input type="file" class="form-control" id="UDocument1" name="UDocument1"  value=""> -->
                </div>
              </div>




              <div class="form-group row">
                <label for="Document2" class="col-sm-4 col-form-label">Select&nbsp;Logo:</label>
                <div class="col-sm-8">
                  <input type="file" name="Document2" id="Document2">
                  <!-- <input type="file" class="form-contro2" id="UDocument1" name="UDocument2"  value="">> -->
                </div>
              </div>

              <center>
                <input type="button" name="Button1" value="Submit" id="Button1" class="btn btn-primary">
                <input type="Reset" value="Reset" id="Button2" class="btn btn">
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>

<!-- Table -->
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sr.&nbsp;No.</th>
                  <th>Bank&nbsp;Id</th>
                  <th>Bank&nbsp;Name</th>
                  <th>Bank&nbsp;Address</th>
                  <th>Bank&nbsp;Code</th>
                  <th>Is&nbsp;Active</th>
                  <th>Created&nbsp;Date</th>
                  <th>Document1</th>
                  <th>Document2</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($smsdata as $val)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{$val->Bank_Id}}</td>
                  <td>{{$val->Bank_Name}}</td>
                  <td>{{$val->Bank_Address}}</td>
                  <td>{{$val->Bank_Code}}</td>
                  <td>{{$val->Is_Active}}</td>
                  <td>{{$val->Created_on}}</td>
                  @if($val->Document1 != NULL && $val->Document1 != '')
                  <td align="center"><a href="{{$val->Document1}}">Download</a></td>
                  @else
                  <td></td>
                  @endif
                  @if($val->Document2 != NULL && $val->Document2 != '')
                  <td align="center"><a href="{{$val->Document2}}">Download</a></td>
                  @else
                  <td></td>
                  @endif
                  <td><i  class="fa fa-edit" id="GridView1_lblEdit_4" href="javascript:__doPostBack('GridView1$ctl06$lblEdit','' )"  onclick="demo('{{$val->Bank_Name}}','{{$val->Bank_Code}}','{{$val->Bank_Id}}','{{$val->Bank_Address}}','{{$val->Document1}}','{{$val->Document2}}')"  data-toggle="modal" data-target="#myModal"></i></td>
                </tr>
              @endforeach
            </tbody>
          </table>
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



   @if($val->Document1 != NULL && $val->Document1 != '')
            <td align="center"><a href="{{$val->Document1}}">Download</a></td>
            @else
            <td></td>
            @endif
   
  
<script type="text/javascript">
  $('#Button1').click(function(){
    $(".error_class").empty();
    //alert();
     var formdata = new FormData($("#bank_master")[0]);
     //alert(formdata);
    $.ajax({  
           type: "POST",  
           url: "{{URL::to('bank-master')}}",
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

<script type="text/javascript">
  function demo(Bank_Name,Bank_Code,Bank_Id,Bank_Address,Document1,Document2){
 
    $('#fba_id').val('');
    $('#Pop_Bank_Id').val('');
    $('#Pop_Bank_Name').val('');
    $('#Pop_Bank_Code').val('');
    $('#Pop_Bank_Address').val('');
    $('#Pop_Document1').val('');
    $('#Pop_Document2').val('');

    $('#Pop_Bank_Id').val(Bank_Id);
    $('#Pop_Bank_Name').val(Bank_Name);
    $('#Pop_Bank_Code').val(Bank_Code);
    $('#Pop_Bank_Address').val(Bank_Address);
     





    if(Document1){
    $("#msg").text("Already file exist");
    $('#file_documant1').val(Document1);
    }else{
    $("#msg").text ("Select File");
    }


    if(Document2){
    $("#msg").text("Already file exist");
    $('#file_documant2').val(Document2);
    }else{
    $("#msg2").text("Select File");
    } 
 
    } 
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    function myFunction() {
        window.location.reload();
    }
    
</script>
@endsection