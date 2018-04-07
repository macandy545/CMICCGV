<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="bars"></div>
                <div class="navbar-brand"><b>CGV</b> (Computerized Grade Viewer)</div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="<?php echo base_url(); ?>admin/admin_reports">
                            <i class="material-icons">notifications</i>
                            <span id="message_count" class="label-count"></span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">email</i>
                            <span class="label-count">
                                <?php if ($message == 0) {
                                    echo '';
                                }else{
                                    echo $message;
                                }  ?>  
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <?php foreach ($view_all_message as $msg){ extract($msg);
                                        $teacher_name = $lname.', '.$fname.' '.$middle;
                                    ?>
                                    <li >
                                        <a href="<?php echo base_url(); ?>admin/teacher_message">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">email</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Teacher <b><?php echo $lname ?></b> mesage you.</h4>
                                                <!-- <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p> -->
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="<?php echo base_url(); ?>admin/teacher_message">View All Message</a>
                            </li>
                        </ul>
                    </li>
                </ul>    
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url().'webroot/images/'.$view_profile['image']; ?>" width="48" height="48" alt="Admin" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $view_profile['name']; ?></div>
                    <div class="username"><?php echo $view_profile['username']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>admin/admin_profile/<?php echo $this->session->userdata('admin_id');?>"><i class="ti-user m-r-10"></i> Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/admin_logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li>
                        <a href="<?php echo base_url(); ?>admin/admin_index">
                            <i class="material-icons col-red">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">assignment_ind</i>
                            <span>Teachers</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_teacher">Add New Teacher</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_teachers">View all Teachers</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">face</i>
                            <span>Students</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_student"><i class="material-icons col-red">add</i> 
                                  <span>Add Student</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_current_students"><i class="material-icons col-red">group</i> 
                                  <span>College Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/seniorHigh"><i class="material-icons col-red">group</i> 
                                  <span>Senior High School Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/highSchoolStudents"><i class="material-icons col-red">group</i> 
                                  <span>High School Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/elementaryStudents"><i class="material-icons col-red">group</i> 
                                  <span>Elementary Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/preSchoolStudents"><i class="material-icons col-red">group</i> 
                                  <span>Pre-schools</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">import_contacts</i>
                            <span><!-- Opened --> Subjects</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/view_subjects">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>College</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/basic_subjects">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>Basic</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">book</i>
                            <span>Subjects</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_sbjt">
                                    <i class="material-icons col-red">book</i>
                                    <span>View All Subjects</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_sbjt">
                                    <i class="material-icons col-red">note_add</i>
                                    <span>Add Subject</span>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url(); ?>admin/com_laude_candidates">
                            <i class="material-icons col-red">supervisor_account</i>
                            <span>With Honor Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">supervisor_account</i>
                            <span>Dean's List</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url().'admin/prelim_dlist'?>">Prelim</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/midterm_dlist'?>">Midterm</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/sfinal_dlist'?>">Semi-Final</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/final_dlist'?>">Final</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/view_time_frame">
                            <i class="material-icons col-red">alarm</i><span>View Time Frame</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/admin_logout">
                            <i class="material-icons col-red">input</i><span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date("Y"); ?> <a href="javascript:void(0);"><b>CGV</b> </a> All Rights Reserved.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header modal-col-cyan">
                            <h2>
                                <i class="material-icons">library_add</i> Adding subject section.
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <?= $this->session->flashdata('msg') ?>
                                    <?php } ?>
                                    <?php echo form_open("admin/add_subject_validation"); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> Fill out all needed information below.</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="col-md-6">
                                                                <label for="units">&nbsp;</label>
                                                                <div class="form-line">
                                                                    <input style="background-color:white;" type="text" class="form-control filled-in select_sub" id="selectedsub" placeholder="Select Subject" required="" readonly="">
                                                                    <input type="hidden" class="form-control" id="_selectedsub" name="sbjt_id">
                                                                </div>
                                                                <center>
                                                                    <a data-toggle="modal" data-target=".add_sub">
                                                                        <button style="margin-top:5px;" type="button" class="btn btn-info waves-effect btn-sm">
                                                                            <i class="material-icons">add</i>
                                                                            <span>Select Subject</span>
                                                                        </button>
                                                                    </a>
                                                                </center>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="units">&nbsp;</label>
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control filled-in select_teacher" id="selected" placeholder="Select Teacher" required="" readonly="">
                                                                    <input type="hidden" class="form-control" id="_selected" name="teacher_id">
                                                                </div>
                                                                <center>
                                                                    <a data-toggle="modal" data-target=".add_teacher">
                                                                        <button style="margin-top:5px;" type="button" class="btn btn-info waves-effect btn-sm">
                                                                            <i class="material-icons">account_circle</i>
                                                                            <span>Assign Teacher</span>
                                                                        </button>
                                                                    </a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="col-md-6">
                                                                <label>Select Schedule Days*</label>
                                                                <select size="7" multiple="multiple" class="form-control" name="schedule[]">
                                                                    <option value="Monday" selected="selected">Monday</option>
                                                                    <option value="Tuesday">Tuesday</option>
                                                                    <option value="Wednesday" selected="selected">Wednesday</option>
                                                                    <option value="Thursday">Thursday</option>
                                                                    <option value="Friday" selected="selected">Friday</option>
                                                                    <option value="Saturday">Saturday</option>
                                                                    <option value="Sunday">Sunday</option>
                                                                </select>
                                                                <span class="help-block">Please hold "ctrl" to select multiple Days</span>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="time_start">Time Start*</label>
                                                                <div class="form-line">
                                                                    <input type="time" class="form-control filled-in" id="time_start" placeholder="Time Start" name="time_start" required="" id="time_start">
                                                                </div>
                                                                <span class="help-block"><small>Example: 4:00pm</small></span>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="time_end">Time End*</label>
                                                                <div class="form-line">
                                                                    <input type="time" class="form-control" id="time_end" placeholder="Time End" name="time_end" required="" id="time_end">
                                                                </div>
                                                                <span class="help-block"><small>Example: 5:00pm</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-2">
                                                                <label>FROM Year*</label>
                                                                <?php $data = range('2010', '2050'); ?>
                                                                <select class="form-control" name="from"  placeholder="from" required=""  >
                                                                    <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                                                    <?php foreach ($data as $key): ?>
                                                                        <option value="<?php echo $key ?>"><?php echo $key.' ' ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <!-- <div class="form-line">
                                                                    <input type="text" class="form-control filled-in from" name="from" maxlength="4" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" required="" placeholder="<?php echo date('Y'); ?>" id="from">
                                                                </div> -->
                                                                
                                                                <span class="help-block"><small>Example: 2017</small></span>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label>TO*</label>
                                                                <?php $data = range('2010', '2050'); ?>
                                                                <select class="form-control" name="to"  placeholder="to" required=""  >
                                                                    <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                                                                    <?php foreach ($data as $key): ?>
                                                                        <option value="<?php echo $key ?>"><?php echo $key.' ' ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <!-- <div class="form-line">
                                                                    <input type="text" class="form-control filled-in to" name="to" maxlength="4" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" required="" placeholder="<?php echo date('Y') + 1; ?>" id="to">
                                                                </div> -->
                                                                <span class="help-block"><small>Example: 2018</small></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="semister">Semester*</label>
                                                                <select  class="form-control" name="semester">
                                                                    <option value="1st Semester" selected="selected">1st Semester</option>
                                                                    <option value="2nd Semester">2nd Semester</option>
                                                                </select>
                                                                <span class="help-block"><small>Example: 1st Sem</small></span>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group text-center">
                                            <div class="col-md-12 m-b-20">
                                               <button type="submit" class="btn btn-success" onclick="return validateYear();"><i class="material-icons">done</i> <span>Add Subject</span></button>
                                               <button type="reset" class="btn btn-warning"><i class="material-icons">autorenew</i> <span>Reset Field</span></button>
                                            </div>
                                        </div>  
                                    <?php echo form_close(); ?>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <div class="modal fade add_sub" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content modal-lg">
                    <div class="modal-header modal-col-cyan">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="mySmallModalLabel"><i class="material-icons">account_circle</i><span> Add Subject</span></h4>
                    </div>
                    <div class="modal-body">
                       <div class="col-md-12">
                           <div class="m-b-20 table-responsive">
                               <table id="datatable" class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Description</th>
                                            <th>Units</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-hovered">
                                        <?php 
                                            $i = 0;
                                            foreach($view_sbjt as $subject){ 
                                        ?>
                                            <tr id="<?php echo $subject['sbjt_id']; ?>">
                                                <td><?php echo $subject['sub_name']; ?></td>
                                                <td><?php echo $subject['course_description']; ?></td>
                                                <td><?php echo $subject['units']; ?></td>
                                                <td class="center">
                                                    <button data-dismiss="modal" id="subject-btn<?php echo $i++ ?>" class="btn btn-success btn-sm" value="<?php echo $subject['sub_name'].'/'.$subject['sbjt_id']; ?>"><i class="material-icons">add</i><span> Select Subject</span></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>    
                               </table>
                           </div>
                       </div>
                    </div>
                    <div class="modal-footer"> </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <div class="modal fade add_teacher" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content modal-lg">
          <div class="modal-header modal-col-cyan">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="mySmallModalLabel"><i class="material-icons">account_circle</i><span> Add Teacher</span></h4>
          </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="m-b-20 table-responsive">
                  <table id="datatable" class="table table-bordered table-hover js-basic-example dataTable">
                    <thead>
                      <tr>
                        <th>Teacher ID</th>
                        <th>Teacher Image</th>
                        <th>Teacher Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-hovered">
                    <?php 
                      $i = 0;
                      foreach($view_teacher as $teacher){ 
                    ?>
                      <tr id="<?php echo $teacher['teacher_id']; ?>">
                        <td><?php echo $teacher['teacher_id']; ?></td>
                        <td><center><span class="table_image"><img src="<?php echo base_url(); ?>webroot/images/<?php echo $teacher['teacher_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img"></span></center></td>
                        <td><?php echo $teacher['fname']." ".$teacher['lname']; ?></td>
                        <td class="center">
                          <button data-dismiss="modal" id="teacher-btn<?php echo $i++ ?>" class="btn btn-success btn-sm" value="<?php echo $teacher['fname']." ".$teacher['lname'].'/'.$teacher['teacher_id']; ?>"><i class="material-icons">add</i><span> Select Teacher</span></button>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>    
                  </table>
                </div>
             </div>
            </div>
          <div class="modal-footer"> </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
          var count = $('#datatable tbody.table-hovered tr').length;
          for(var i=0; i<count; i++){
              $('#teacher-btn'+i).on('click',function(){
                  var val = $(this).val(),
                      split = val.split('/');
                  $('#selected').val(split[0]).change();
                  $('#_selected').val(split[1]).change();
              });
          }
          for(var i=0; i<count; i++){
              $('#subject-btn'+i).on('click',function(){
                  var val = $(this).val(),
                      split = val.split('/');
                  $('#selectedsub').val(split[0]).change();
                  $('#_selectedsub').val(split[1]).change();
              });
          }


      }); 
      function validateYear(){

          var time_start =  $('#time_start').val();
          var time_end =  $('#time_end').val();
          var from =  $('#from').val();
          var to =  $('#to').val();
          var select_sub =  $('.select_sub').val();
          var select_teacher =  $('.select_teacher').val();

          if(select_sub == ""){
              alert('Please select your subject');
              return false;
          } 

          if(select_teacher == ""){
              alert('Please select your teacher');
              return false;
          } 

          if(time_start >= time_end || time_start == null || time_end == null){
             alert('Please enter valid Time');
              return false;
          } else{
              var day = '1/1/1970 ', // 1st January 1970
              start = $('#time_start').val(), //eg "09:20 PM"
              end = $('#time_end').val(), //eg "10:00 PM"
              diff_in_min = ( Date.parse(day + end) - Date.parse(day + start) ) /1000  / 60;
              var res =(diff_in_min);

              if(res < 0 || res < 60){
                  alert('Please Enter time with 1 hour or 1 and 30 minutes advance.');
                  return false;
              } 
          }

          if(from >= to){
              alert('Please enter valid School Year');
              return false;
          } 

          return true;
      }   
    </script>




