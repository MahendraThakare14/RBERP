@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Break Master</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
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
                  <th>city_id Type</th>
                  <th>city_name</th>
                  <th>state_name</th>
              
                </tr>
              </thead>
              <tbody>
                @foreach($data as $val)
                <tr>
                  <td>{{$val->city_id}}</td>
                  <td>{{$val->city_name}}</td>
                  <td>{{$val->state_name}}</td>
              
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function() {
  $('#example').DataTable();
  } );
  </script>
     
@endsection
