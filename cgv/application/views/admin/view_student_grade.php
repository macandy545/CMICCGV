<?php if(isset($_POST['abc'])){ 
// Authorisation details. 
$username = $_POST['username']; 
$hash = $_POST['hash']; 
// Config variables. Consult http://api.txtlocal.com/docs for more info. 
$test = "0"; 
// Data for text message. This is the text message data. 
$sender = $_POST['sender']; // This is who the message appears to be from. 
$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers 
$message = $_POST['mess']; 
// 612 chars or less 
// A single number or a comma-seperated list of numbers 
$message = urlencode($message); 
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test; 
$ch = curl_init('http://api.txtlocal.com/send/?'); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$result = curl_exec($ch); // This is the result from the API 
curl_close($ch); 
$arry = json_decode($result);
$res = '';
//$res = new Array($arry);
foreach ($arry as $key) {
    $res = $key;
    //array_push($key, $res);
}
var_dump($res);
$popmsg = '';
if ($res == 'success') {
    $popmsg = 'Message Sent successfully!';
}else{
    $popmsg = 'Error in sending message!';
}
} 
?>
<body class="theme-cyan">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
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
    </div> -->
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
                                <a href="<?php echo base_url(); ?>admin/view_current_teachers">View Current Teachers</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_teacher">Add New Teacher</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_teachers">View all Teachers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
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
                            <li>
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
                    <li>
                        <a href="<?php echo base_url().'admin/com_laude_candidates'?>">
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
                            <i class="material-icons col-red">alarm</i><span>Set/View Time Frame</span>
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
            <form method="POST" action="<?php echo base_url(); ?>admin/admin_search_stud_sub/<?php echo $stud_id; ?>">
                <div class="pull-right">
                    <button type="submit" class="btn bg-cyan waves-effect">
                        <i class="material-icons">search</i>
                        <span>SEARCH</span>
                    </button>
                </div>
                <div class="col-md-2 pull-right">
                    <select class="form-control show-tick" name="semester">
                        <option value="All Semester">All Semester</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                    </select>
                </div>
                <div class="col-md-2 pull-right">
                    <select class="form-control show-tick" name="sy">
                        <?php foreach($school_years as $view){ extract($view);?>
                            <option value="<?php echo $sy ?>"><?php echo $sy ?></option>
                        <?php }?>
                    </select>
                </div>
            </form>
            <div class="pull-left">
                <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div>
                        <center>
                            <h1>
                                <?php  
                                    if (isset($popmsg)) {
                                ?>
                                <div id="modal" class="modal fade in" id="smallModal" tabindex="-1" role="dialog" style="display: block;">
                                  <div class="modal-dialog modal-sm" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                          </div>
                                          <div class="modal-body">
                                              <h5><?php echo $popmsg; ?></h5>
                                          </div>
                                          <div class="modal-footer">
                                              <center><button id="hideModal" type="button" class="btn btn-info waves-effect" data-dismiss="modal">Ok!</button></center>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                <!-- <div class="alert bg-green alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <?php echo $popmsg; ?>
                                </div> -->
                                <?php }?>
                            </h1>
                        </center>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php 
                                    foreach($view_single_student as $stud){ extract($stud);
                                    $stud_name = $lname.', '.$fname.' '.$middle;
                                    $student_name = $fname.' '.$middle.' '.$lname;
                                    //$stud_id = $stud_id;
                                }
                                ?> 
                                <i class="material-icons"></i><b><?php echo $stud_name ?></b> Subjects
                                <div id="show_buttons" class="pull-right">
                                  <a class="pull-right" href="<?php echo base_url(); ?>admin/add_bulk_sub/<?php echo $stud_id;?>">
                                    <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">add_box</i>
                                        <span>Add Taken Subjects</span>
                                    </button>
                                </a>
                                <a class="pull-right" href="<?php echo base_url(); ?>admin/print_student_grade/<?php echo $stud_id;?>/<?php echo $student_name;?>/<?php echo $year;?>/<?php echo $course;?>" target="__blank">
                                    <button type="button" class="btn btn-info waves-effect">
                                        <i class="material-icons">print</i>
                                        <span>PRINT ALL</span>
                                    </button>
                                </a>
                                </div>
                                <button id="sendButton" onclick="sendMsg(<?php echo $studinfo['stud_id']; ?>)" type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#defaultModal<?php echo $stud_id; ?>"><i class="material-icons">email</i> <span> Send Grade To Parent</span></button>
                          </div>
                            <div class="body">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li id="hide_again" role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Current Subjects</a></li>
                                <li id="hide_buttons" role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">All Subjects Taken</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home">
                                    <p>
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Teacher</th>
                                                    <th>S.Y</th>
                                                    <th>Semester</th>
                                                    <th>Prelim</th>
                                                    <th>Mid</th>
                                                    <th>Semi</th>
                                                    <th>Final</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                                <?php if ($this->session->flashdata('msg')) { ?>
                                                    <?= $this->session->flashdata('msg') ?>
                                                <?php } ?>
                                            <tbody>
                                                <?php 
                                                    foreach($student_current_subjects as $view){   
                                                ?>
                                                <?php 
                                                    if ($view['bin'] == 1) {
                                                        $remarks = '<b>DROPPED </b>';
                                                    }
                                                    else{
                                                        if ($view['final'] == 0 ){
                                                            $remarks = '';
                                                        }
                                                        elseif ($view['final'] < 3.0 ){
                                                                $remarks = '<b>Passed </b>';
                                                        }else{
                                                            $remarks = '<b style="color:red">Failed </b>'; 
                                                        } 
                                                    }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <?php echo $view['sub_name']; ?> <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="javascript:void(0);"><?php echo $view['course_description']; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                                                    <td><?php echo $view['sy']; ?></td>
                                                    <td><?php echo $view['semester']; ?></td>
                                                    <td><?php echo ($view['prelim'] == 0) ? '' : $view['prelim']; ?></td>
                                                    <td><?php echo ($view['midterm'] == 0) ? '' : $view['midterm']; ?></td>
                                                    <td><?php echo ($view['semi_final'] == 0) ? '' : $view['semi_final']; ?></td>
                                                    <td><?php echo ($view['final'] == 0) ? '' : $view['final']; ?></td>
                                                    <td><?php echo $remarks ?></td> 
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <p>
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Teacher</th>
                                                    <th>S.Y</th>
                                                    <th>Semester</th>
                                                    <th>Prelim</th>
                                                    <th>Mid</th>
                                                    <th>Semi</th>
                                                    <th>Final</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                                <?php if ($this->session->flashdata('msg')) { ?>
                                                    <?= $this->session->flashdata('msg') ?>
                                                <?php } ?>
                                            <tbody>
                                                <?php 
                                                    foreach($view_all_subjects as $view){   
                                                ?>
                                                <?php 
                                                    if ($view['bin'] == 1) {
                                                        $remarks = '<b>DROPPED </b>';
                                                    }
                                                    else{
                                                        if ($view['final'] == 0 ){
                                                            $remarks = '';
                                                        }
                                                        elseif ($view['final'] < 3.0 ){
                                                                $remarks = '<b>Passed </b>';
                                                        }else{
                                                            $remarks = '<b style="color:red">Failed </b>'; 
                                                        } 
                                                    }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <?php echo $view['sub_name']; ?> <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="javascript:void(0);"><?php echo $view['course_description']; ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                                                    <td><?php echo $view['sy']; ?></td>
                                                    <td><?php echo $view['semester']; ?></td>
                                                    <td><?php echo ($view['prelim'] == 0) ? '' : $view['prelim']; ?></td>
                                                    <td><?php echo ($view['midterm'] == 0) ? '' : $view['midterm']; ?></td>
                                                    <td><?php echo ($view['semi_final'] == 0) ? '' : $view['semi_final']; ?></td>
                                                    <td><?php echo ($view['final'] == 0) ? '' : $view['final']; ?></td>
                                                    <td><?php echo $remarks ?></td> 
                                                </tr>
                                                <?php }?>
                                                <?php 
                                                    foreach($view_sub_taken as $sub_taken){ 
                                                    if ($sub_taken['final'] == 0 ){
                                                            $remarks = '';
                                                    }
                                                    elseif ($sub_taken['final'] < 3.0 ){
                                                            $remarks = '<b>Passed </b>';
                                                    }else{
                                                        $remarks = '<b style="color:red">Failed </b>'; 
                                                    } 
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <?php echo $sub_taken['sub_name']; ?> <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="javascript:void(0);"><?php echo $sub_taken['course_description']; ?></a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo ($sub_taken['prelim'] == 0) ? '' : $sub_taken['prelim']; ?></td>
                                                        <td><?php echo ($sub_taken['midterm'] == 0) ? '' : $sub_taken['midterm']; ?></td>
                                                        <td><?php echo ($sub_taken['semi_final'] == 0) ? '' : $sub_taken['semi_final']; ?></td>
                                                        <td><?php echo ($sub_taken['final'] == 0) ? '' : $sub_taken['final']; ?></td>
                                                        <!-- <td><?php echo $sub_taken['units'] ?></td>  -->
                                                        <td><?php echo $remarks; ?></td> 
                                                    </tr>
                                                <?php } ?>
                                                <?php 
                                                    $no_of_subjects = 0;
                                                    $no_of_subjects1 = 0;
                                                    $no_of_subjects2 = 0;
                                                    $final = 0;
                                                    $final1 = 0;
                                                    $final2 = 0;
                                                    $avrg_grade = 0;
                                                    $total_units = 0;
                                                    $units = 0;

                                                    foreach($sub_taken_ave as $sub_taken){  
                                                        $final1 += $sub_taken['final'];
                                                        $units += $sub_taken['units'];
                                                        if ($final1 != 0) {
                                                            $no_of_subjects1 ++;
                                                        }
                                                    }
                                                    foreach($ave_grade as $view){  
                                                        $final2 += $view['final'];
                                                        if ($final2 != 0) {
                                                            $no_of_subjects2 ++;
                                                        }
                                                    }
                                                    $final = $final1 + $final2;
                                                    $no_of_subjects = $no_of_subjects1 + $no_of_subjects2;
                                                    if ($final != 0) {
                                                        $avrg_grade = $final / $no_of_subjects; 
                                                    }
                                                    foreach($view_students_units as $view1){  
                                                        $total_units = $view1['total_units'] + $units;
                                                    }        
                                                ?>
                                                <center>
                                                    <button type="button" class="btn btn-info waves-effect">
                                                        <i class="material-icons">stars</i>
                                                        <span>Total Units Taken: <?php echo $total_units?></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger waves-effect">
                                                        <i class="material-icons">stars</i>
                                                        <span>Average Grade: <?php echo substr($avrg_grade, 0, 4); ?></span>
                                                    </button>
                                                </center>
                                            </tbody>
                                        </table>
                                    </div>  
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="defaultModal<?php echo $view['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header bg-cyan">
              <h4 class="modal-title" id="defaultModalLabel">Send Grade to Parent</h4>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
              <?php foreach ($api_info as $api) { ?>
              <form method="post" action="<?php echo base_url(); ?>admin/view_student_grade/<?php echo $stud_id; ?>">
             <!--  <div class="col-md-6">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $api['username']; ?>" class="form-control" readonly>
                <br/>
                <label>Hash:</label>
                <input type="text" name="hash" value="<?php echo $api['hash']; ?>" class="form-control" readonly>
                <br/>
                <label>Sender:</label>
                <input type="text" name="sender" value="<?php echo $api['sender']; ?>" class="form-control" readonly>
                <br/>
                <?php foreach ($parent_number as $num) { ?>
                <label>Send to:</label>
                <input type="text" name="num" value="<?php echo $num['contact_num']; ?>" class="form-control" readonly>
                <?php } ?>
              </div> -->
              <div class="col-md-12">
                <input type="hidden" name="username" value="<?php echo $api['username']; ?>" class="form-control">
                <input type="hidden" name="hash" value="<?php echo $api['hash']; ?>" class="form-control">
                <input type="hidden" name="sender" value="<?php echo $api['sender']; ?>" class="form-control">
                <?php foreach ($parent_number as $num) { ?>
                <div class="col-md-12">
                    <label>Send to: <b><?php echo $num['fname'].' '.$num['middle'].' '.$num['lname']; ?></b></label>
                    <input type="text" name="num" value="<?php echo $num['contact_num']; ?>" class="form-control" readonly>
                    <span> </span>
                </div>
                <?php } ?>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Message:</label>
                      <div class="form-line">
                        <textarea  cols="8" rows="12" name="mess" required="" id="txtmsg" class="form-control no-resize" readonly></textarea>
                      </div>
                    </div>
                </div>
                <!-- <textarea  rows="1" class="form-control no-resize" style="overflow: hidden; word-wrap: break-word; height: 267px;"></textarea> -->
              </div>
            
              <?php } ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="abc" value="send" class="btn btn-info waves-effect"><i class="material-icons">email</i> SEND</button></form>
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="material-icons">cancel</i> CANCEL</button>
          </div>
      </div>
  </div>
</div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sendButton').show();
          $('#show_buttons').hide();
          $('#hide_buttons').on('click', function(){
            $('#show_buttons').show();
            $('#sendButton').hide();
          });
          $('#hide_again').on('click', function(){
            $('#show_buttons').hide();
            $('#sendButton').show();
          });
          $('#hideModal').on('click', function(){
            $('#modal').fadeOut();
          });
      });
    </script>
