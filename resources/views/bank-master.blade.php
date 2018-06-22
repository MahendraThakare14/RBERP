@extends('include.master')
@section('content')
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
  <!-- <center><h3 style="color: #0099FF;">Bank Master</h3></center><hr> -->
          <div class="row">  <!-- for center -->
              <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
                <div class="col-sm-6 col-sm-offset-2">

             <form class="form-horizontal" name="bank_master" id="bank_master" method="post">
            {{csrf_field()}}
          

                   <div class="form-group row">
                        <label for="Bank_Name" class="col-sm-4 col-form-label">Bank&nbsp;Name:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="Bank_Name" name="Bank_Name"  value="" placeholder="Bank Name"  required>
                        </div>
                      </div>


                    <div class="form-group row">
                        <label for="Product_Name" class="col-sm-4 col-form-label">Address:</label>
                        <div class="col-sm-7">
                          <textarea type="text" class="form-control" id="Bank_Address" name="Bank_Address"  value="" placeholder="Enter a Address"  required></textarea>
                        </div>
                      </div>



                    <div class="form-group row">
                        <label for="Bank_Code" class="col-sm-4 col-form-label">Bank&nbsp;Code:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="Bank_Code" name="Bank_Code"  value="" placeholder="Bank Code"  required>
                        </div>
                      </div>



                    <div class="form-group row">
                        <label for="Document1" class="col-sm-4 col-form-label">Select&nbsp;File:</label>
                        <div class="col-sm-7">
                          <input type="file" class="form-control" id="Document1" name="Document1"  value="">
                        </div>
                      </div>



                        <div class="form-group row">
                        <label for="Document2" class="col-sm-4 col-form-label">Select&nbsp;Logo:</label>
                        <div class="col-sm-7">
                          <input type="file" class="form-control" id="Document2" name="Document2"  value="">
                        </div>
                      </div>






                     <!--  <center>
                        <input type="button" name="Button1" value="Submit" id="Button1" class="btn btn-primary">
                        <input type="Reset" name="Button2" value="Reset" id="Button2" class="btn btn-primary">
                      </center>
 -->

                      <center>
                        <input type="submit" name="Button1" value="Submit" id="Button1" class="btn btn-primary">
                        <input type="Reset" name="Button2" value="Reset" id="Button2" class="btn btn-primary">
                      </center>

                      
        
        </form>
      </div>
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
            <td>{{$val->Document1}}</td>
            <td>{{$val->Document2}}</td>
            <td><i  class="fa fa-edit" id="GridView1_lblEdit_4" href="javascript:__doPostBack('GridView1$ctl06$lblEdit','' )"  onclick="demo('{{$val->Bank_Name}}','{{$val->Bank_Code}}','{{$val->Bank_Id}}','{{$val->Bank_Address}}','{{$val->Document1}}','{{$val->Document2}}')"  data-toggle="modal" data-target="#myModal"></i></td>
        
 
        </tr>
          @endforeach
        </tbody>
      </table>
     </div> 
</div>
</div>





 

<script type="text/javascript">
  function demo(Bank_Name,Bank_Code,Bank_Id,Bank_Address,Document1,Document2){
    //alert(Designation_Id);
    // document.getElementById("fba_id").value.empty();
   document.getElementById('Pop_Bank_Id').value="";
   document.getElementById('Pop_Bank_Name').value="";
   document.getElementById('Pop_Bank_Code').value="";
   document.getElementById('Pop_Bank_Address').value="";
   //document.getElementById('Pop_Document1').value="";
   //document.getElementById('Pop_Document2').value="";
    

   document.getElementById("Pop_Bank_Id").value += Bank_Id;
   document.getElementById("Pop_Bank_Name").value += Bank_Name;
   document.getElementById("Pop_Bank_Code").value += Bank_Code;
   document.getElementById("Pop_Bank_Address").value += Bank_Address;
   //document.getElementById("Pop_Document1").value += Document1;
   // document.getElementById("Pop_Document2").value += Document2;
   
   if(Document1 != null)
   {
      $("#msg").append("File already exists");
      document.getElementById("Pop_Document1").value += Document1;
   }
   else
   {
      $("#msg").append("Choose file");
   }

   if(Document2 != null && Document2 != '')
   {
      $("#msg2").append("File already exists");
      document.getElementById("Pop_Document2").value += Document2;
   }
   else
   {
       $("#msg2").append("Choose file");
   }
  // document.getElementById("Pop_Document2").value += Document2; 
}
</script>
 



 
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


  
          <form id="demo_form" name="demo_form" method="POST" action="{{url('update_bank_master')}}"> 
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
                          <input type="text" class="form-control" id="Pop_Bank_Code" name="Pop_Bank_Code"  value="" placeholder="Enter a Bank Code"  required>
                        </div>
                      </div>



                        <div class="form-group row">
                        <label for="Pop_Document1" class="col-sm-2 col-form-label">Select&nbsp;File:</label>
                        <div class="col-sm-10">
                          <lable id="msg"></lable>
                          <input type="file" class="form-control" id="Pop_Document1" name="Pop_Document1"  value="" placeholder="Enter a Product Name">
                        </div>
                      </div>




                        <div class="form-group row">
                        <label for="Pop_Document2" class="col-sm-2 col-form-label">Select&nbsp;Logo:</label>
                        <div class="col-sm-10">
                          <lable id="msg2"></lable>
                          <input type="text" class="form-control" id="Pop_Document2" name="Pop_Document2"  value="" placeholder="Enter a Product Name">
                        </div>
                      </div>





             <center>
              <button type="submit" name="Button" id="Button" class="btn btn-primary">Update</button>
            </center>

                      
        
        </form>
        


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

  </div>
</div>
</div>
</div>
</div>



     
 

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>


@endsection