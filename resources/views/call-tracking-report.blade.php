@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
      <h3 class="box-title">Call Tracking Report</h3> 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>      

        <div class="box-body">
          <div class="row">
              <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
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

                 <center>
                  <div class="col-md-12">
                    <a name="btnsubmit"  id="btnsubmit" class="btn btn-primary">Show Report</a>
                  </div>
                </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

     
@endsection
