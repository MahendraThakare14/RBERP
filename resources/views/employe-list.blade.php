 @extends('include.master')
@section('content')
  <div class="content">
    <div class="box box-default">
        <div class="box-header with-border">
         <center><h3 class="box-title">Employee list</h3></center> 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>

         <div class="box-body">
   <!-- <center><h3 style="color: #0099FF;">Employee list</h3></center><hr> -->
<div class="table-responsive">
  
   <table id="example" class="table table-bordered table-striped">
    
     <thead>
      <tr>  
            <th>Sr.No</th>
            <th>Employee&nbsp;Name</th>
            <th>EmpCode</th>
            <th>Company</th>
            <th>Email</th>
            <th>Department</th>
            <th>Reporting&nbsp;Emp</th>
            <th>EmpId</th>
            <th>Actions</th>
    </tr>
  </thead>

        <tbody>
           @foreach($smsdata as $val)
        <tr>
              <td>{{ $no++ }}</td>
              <td>{{$val->emp_name}}</td>
              <td>{{$val->emp_code}}</td>
              <td>{{$val->Company_Id}}</td>
              <td>{{$val->Email_Id}}</td>
              <td>{{$val->Department_Name}}</td>
              <td>{{$val->Reporting_emp}}</td>
              <td>{{$val->EmpId}}</td>
              <td><a class="btn btn-primary" href="edit-employe-listtt/{{ $val->EmpId }}">Edit</a></td>
        </tr>

          @endforeach
        </tbody>
    </table>
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