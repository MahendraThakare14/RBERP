@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
      <h3 class="box-title">Lead Assign Details Report</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

        

 <div class="box-body">
  <!-- <center><h3 style="color: #0099FF;">Break Master</h3></center><hr> -->
          <div class="row">  <!-- for center -->
              <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
                <!-- <div class="col-sm-6 col-sm-offset-2"> -->
            <form class="form-horizontal" name="break_master" id="break_master"  method="post">
           {{csrf_field()}}





              <div class="col-md-6">
                   <div class="form-group row">
                        <label for="empcode" class="col-sm-4 col-form-label">From&nbsp;Date:</label>
                       <div class="col-md-6">
                  <input type="date" class="form-control" id="LeadType" name="LeadType" value="<?php echo date('Y-m-d');?>">
                  </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="empname" class="col-sm-4 col-form-label" >To&nbsp;Date:</label>
                    <div class="col-sm-6">
                  <input type="date" class="form-control"   id="companyname" name="companyname" value="<?php echo date('Y-m-d');?>">
                   </div>
                 </div>
                 </div>




                 <div class="col-md-6">
                  <div class="form-group row">
                    <label for="empname" class="col-sm-4 col-form-label">Select&nbsp;Employee&nbsp; Name:</label>
                    <div class="col-sm-6">
                  <select type="text" class="form-control"   id="companyname" name="companyname">
                  	<option selected disabled value="0">select</option>
                  </select>
                   </div>
                 </div>
                 </div>

                 <div class="col-md-6">
                  <div class="form-group row">
                    <label for="empname" class="col-sm-4 col-form-label">Lead&nbsp;Status:</label>
                    <div class="col-sm-6">
                  <select type="text" class="form-control"   id="companyname" name="companyname">
                  <option selected disabled value="0">select</option>
              </select>
                   </div>
                 </div>
                 </div>

                 <div class="col-md-12">
                  <div class="form-group row">
                    <label for="empname" class="col-sm-2 col-form-label">Business&nbsp;Head:</label>
                    <div class="col-sm-3">
                  <select type="text" class="form-control"   id="companyname" name="companyname">
                  	<option selected disabled value="0">select</option>
                  </select>
                   </div>
                 </div>
                 </div>





            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

     
@endsection
