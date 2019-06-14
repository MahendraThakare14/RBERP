<?php  use App\Http\Controllers\InitialController; $cl=new InitialController(); ?>
 <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
 <ul class="treeview-menu">
<!--   <?php 
// echo $cl->user_right_group_menu();

   ?>  -->
<?php
 $session_id = Session::get('groupid');
 $menu=DB::select(DB::raw("exec usp_Load_menu :groupid"),[
    ':groupid' => $session_id,
   
]);

  // $menu = DB::select('exec usp_Load_menu(?)' , array(Session::get('groupid')));
  //echo $menu;
  $menu_array = array();
  foreach($menu as $menu_val){
    $menu_array[$menu_val -> parent_menu_name][$menu_val -> id]['menu_name'] = $menu_val -> menu_name;
    $menu_array[$menu_val -> parent_menu_name][$menu_val -> id]['url_link'] = $menu_val -> url_link;
  }
?>
   
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
     
      <ul class="nav side-menu">

        <li><a href="{{url('dashboard')}}"><i class="fa fa-home fa-fw"></i> Home</a></li> 


      @foreach($menu_array as $parent_menu => $child_menu)
        
        <li><a><span class="ic1"></span>&nbsp;&nbsp; {{ $parent_menu }}<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach($child_menu as $menu_id => $menu_elements)
            <li> <a href="{{URL::to($menu_elements['url_link'])}}">{{ $menu_elements['menu_name'] }}</a></li>
            @endforeach
          </ul>
        </li>

      @endforeach
           </ul> 
        </li> 

       
     <!--   
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>