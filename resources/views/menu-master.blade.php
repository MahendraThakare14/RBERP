@extends('include.master')
@section('content')
  <div class="content">
  <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>


        <div class="box-body">
          <center><h3 style="color: #0099FF;">Menu Master</h3></center><hr>
          <div class="row">  <!-- for center -->
            <div class="Absolute-Center is-Responsive">
              <div id="logo-container"></div>
              <!-- a -->

            <form class="form-horizontal" name="menu_master_form" id="menu_master_form"  method="post">
                {{csrf_field()}}


                <div class="col-md-6">
                   <div class="form-group row">
                        <label for="Module_name" class="col-sm-4 col-form-label">Module&nbsp;Name:</label>
                        <div class="col-sm-6">
                          <select type="text" class="form-control" id="Module_name" name="Module_name" required>
                          <option disabled selected  value="0">Select One</option>
                         @foreach ($module as $module)
                          <option value="{{$module->Module_name}}">{{ $module->Module_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="mname" class="col-sm-4 col-form-label">Menu&nbsp;Name:</label>
                    <div class="col-sm-6">
                     <input type="text" class="form-control" id="mname" name="mname"   placeholder="Enter a Menu Name"  required>
                   </div>
                 </div>
                 </div>



                 <div class="col-md-6">
                  <div class="form-group row">
                    <label for="pname" class="col-sm-4 col-form-label">Parent&nbsp;Name:</label>
                    <div class="col-sm-6">
                      <select type="text" class="form-control" id="pname" name="pname" required>
                        <option disabled selected  value="0">Select One</option>
                         @foreach ($menu_parent as $menu_parent)
                          <option value="{{$menu_parent->MenuMasterID}}">{{ $menu_parent->Menu_Name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group row">
                  <label for="mlevel" class="col-sm-4 col-form-label">Menu&nbsp;Level::</label>
                  <div class="col-sm-6">
                    <select type="text" class="form-control" id="mlevel" name="mlevel"   placeholder="Enter Level"  required>
                      <option disabled selected  value="0">Select One</option>
                      @foreach ($menu_level as $menu_level)
                          <option value="{{$menu_level->id}}">{{$menu_level->id}}</option>
                        @endforeach
                  </select>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group row">
                <label for="msequence" class="col-sm-4 col-form-label">Menu&nbsp;Sequence:</label>
                <div class="col-sm-6">
                  <select type="text" class="form-control" id="msequence" name="msequence" required>
                    <option disabled selected  value="0">Select One</option>
                     @foreach ($menu_sequence as $menu_sequence)
                          <option value="{{$menu_sequence->id}}">{{$menu_sequence->id}}</option>
                        @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="dob" class="col-sm-4 col-form-label">Menu&nbsp;Type:</label>
              <div class="col-sm-6">
                <select type="Date" class="form-control" id="mtype" name="mtype"  placeholder="Select"  required>
                 <option value="URL">URL</option>
<option value="POPUP">POPUP</option>

              </select>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group row">
            <label for="maction" class="col-sm-4 col-form-label">Menu&nbsp;Action::</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="maction" name="maction"   placeholder="Enter a Menu Action "   required>
               </div>
             </div>
           </div>


           <div class="col-md-6">
            <div class="form-group row">
              <label for="mdisplay" class="col-sm-4 col-form-label">Menu&nbsp;Display::</label>
               <div class="col-sm-6">
                     <input type="text" class="form-control" id="mdisplay" name="mdisplay"   placeholder="Enter a Menu Display"  required>
                   </div>
            </div>
          </div>


          <center>
            <button type="button" id="submit" class="btn btn-primary">Submit</button>
            <button type="reset" value="Reset">Reset</button>
         </center>
       </form>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $('#submit').click(function(){
     var formdata = new FormData($("#menu_master_form")[0]);
    $.ajax({  
           type: "POST",  
           url: "{{URL::to('menu-master-insert')}}",
            //data : $('#project_m').serialize(),
            data : formdata,
           processData: false,
             contentType : false,
             success: function(msgdata){
              if(msgdata[0].id >0){
                  alert(msgdata[0].msg);
                  location.reload();
              }else{
                  alert('failure');
                 location.reload();
              }
             
        //            var response = JSON.parse(msg);
        //             if(response.status == "success"){

        //                $("#success_response").html(response.msg);
        //                alert(response.msg);
        //   window.location = response.redirectUrl;
        // }
        // else if(response.messege == "error"){
        //   window.location = response.redirectUrl;
        // }
        // else{
        //   $.each(response , function(key , value){
        //     $("#err_" + key).text(value);
        //   });
        // }
           //console.log(msg);
              //location.reload();
            }
        }); 
  });
</script>

 @endsection
