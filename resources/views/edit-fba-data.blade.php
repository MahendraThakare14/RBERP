@extends('include.master')
@section('content')
  <div class="content">
   <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">FBA Followup Detail Update</h3>
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
                <label for="Broker_id" class="col-sm-4 col-form-label">FBA&nbsp;Id:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Broker_id" name="Broker_id"  value="{{$user->Broker_id}}" placeholder="FBA Id"  required>
                  </div>
              </div>

              <div class="form-group row">
                <label for="Broker_Name" class="col-sm-4 col-form-label">FBA&nbsp;Name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Broker_Name" name="Broker_Name"  value="{{$user->Broker_Name}}" required>
                  </div>
              </div>

              <div class="form-group row">
                <label for="FBA_Status" class="col-sm-4 col-form-label">Fba&nbsp;Status:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="FBA_Status" name="FBA_Status" value="{{$user->FBA_Status}}">
                  </div>
              </div>


              <div class="form-group row">
                <label for="Product_Name" class="col-sm-4 col-form-label">Remark:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="remark" name="remark"  value="{{$user->remark}}">
                  </div>
              </div>
              


              <div class="form-group row">
                <label for="Document1" class="col-sm-4 col-form-label">FollowUp&nbsp;Date:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control datepicker_id" id="date" name="date" value="{{$user->date}}">
                </div>
              </div>


              <div class="form-group row">
                <label for="time" class="col-sm-4 col-form-label">FollowUp&nbsp;time:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="time" name="time"  value="{{$user->time}}">
                </div>
              </div>

              <div class="form-group row">
                <label for="PAN_No" class="col-sm-4 col-form-label">PAN&nbsp;No:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="PAN_No" name="PAN_No"  value="{{$user->PAN_No}}">
                </div>
              </div>

              <center>
                <input type="submit" name="Button1" value="Submit" id="Button1" class="btn btn-primary">
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>


@endsection

