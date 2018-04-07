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
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">alarm</i><span>Set/View Time Frame</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url().'admin/view_time_frame'?>">College</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url().'admin/view_basic_time_frame'?>">Basic</a>
                            </li>
                        </ul>
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
                        <div class="header bg-light-blue">
                            <h2>
                                Time Frames <small>Update the date by each period to set time frames. </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">

                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">alarm_add</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block" data-toggle="modal" data-target="#enableFrame">Enable all time Frame</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block" data-toggle="modal" data-target="#customFrames">Enable Custom Time Frames</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/disable_all_framess" class=" waves-effect waves-block" onclick="return confirm('This will disable all time frames. Continue?');">Disable all Time Frames</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?= $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <!-- <?php echo $this->session->userdata('curr_sy'); ?>
                            <?php echo $this->session->userdata('curr_sem'); ?> -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Period</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($view_basic_time_frame as $view){ ?>
                                          <tr>
                                                <td><?php echo $view['term']; ?></td>
                                                <td>
                                                    <?php if($view['from_date'] != "") { ?>
                                                        <?php echo date('M d, Y', strtotime($view['from_date'])); ?>
                                                    <?php } else{ ?>
                                                        <label class="label label-success">Not Set</label>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($view['from_date'] != "") { ?>
                                                        <?php echo date('M d, Y', strtotime($view['to_date'])); ?>
                                                    <?php } else{ ?>
                                                        <label class="label label-success">Not Set</label>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center"><?php echo ($view['status'] == "true") ? '<label class="label label-info">Active</label>' : '<label class="label label-warning">Disabled</label>' ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-success btn-xs waves-effect"  data-toggle="modal" data-placement="top" data-target="#tf<?php echo $view['tf_id']; ?>" title="Update time Frame"><i class="material-icons">alarm_add</i> <span> Set Date</span></button>
                                              </td>
                                                <div class="modal fade" id="tf<?php echo $view['tf_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content modal-lg">
                                                          <div class="modal-header modal-col-cyan">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                              <h4 class="modal-title" id="mySmallModalLabel"><i class="material-icons">edit</i> <span> Update Time Frame</span></h4>
                                                          </div>
                                                          <div class="modal-body">
                                                          <?php echo form_open("admin/update_basic_time_frame/".$view['tf_id']); ?>
                                                            <div class="col-md-12">
                                                              <div class="panel-body">
                                                                <div class="row">
                                                                  <div class="">
                                                                    <div class="col-md-4">
                                                                      <label for="term">Period </label>
                                                                      <input type="text" class="form-control" name="term" value="<?php echo $view['term']; ?>" readonly="">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                      <label for="sub_name">From</label>
                                                                          <input type="date" class="form-control" value="<?php echo $view['from_date']; ?>" id="from1" name="from_date" required="">
                                                                          <input type="hidden" class="form-control" id="today1" value="<?php echo date('Y-m-d'); ?>">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                      <label>To</label>
                                                                          <input type="date" class="form-control" value="<?php echo $view['to_date']; ?>" id="to1" name="to_date" required="">
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <center>
                                                                <button type="submit" class="btn btn-primary waves-effect" onclick="return validDate1();"><i class="material-icons">check</i> Update</button>
                                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="material-icons">clear</i> Close</button>
                                                            </center>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </form>
                                             </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="customFrames" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content modal-lg">
                              <div class="modal-header modal-col-cyan">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="mySmallModalLabel"><i class="material-icons">edit</i> <span> Update Time Frame</span></h4>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="<?php echo base_url(); ?>admin/enable_custom_framess">
                                <div class="col-md-12">
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="">
                                        <div class="col-md-12 text-center">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" id="md_checkbox_1" class="chk-col-purple" name="term[]" value="FIRST GRADING">
                                                <label for="md_checkbox_1">FIRST GRADING</label>
                                                <input type="checkbox" id="md_checkbox_2" class="chk-col-purple" name="term[]" value="SECOND GRADING">
                                                <label for="md_checkbox_2">SECOND GRADING</label>
                                                <input type="checkbox" id="md_checkbox_3" class="chk-col-purple" name="term[]" value="THIRD GRADING">
                                                <label for="md_checkbox_3">THIRD GRADING</label>
                                                <input type="checkbox" id="md_checkbox_4" class="chk-col-purple" name="term[]" value="FOURTH GRADING">
                                                <label for="md_checkbox_4">FOURTH GRADING</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="sub_name">From</label>
                                              <input type="date" class="form-control" id="from" name="from_date" required="">
                                              <input type="hidden" class="form-control" id="today" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="col-md-6">
                                          <label>To</label>
                                              <input type="date" class="form-control" id="to" name="to_date" required="">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <center>
                                    <button type="submit" class="btn btn-primary waves-effect waves-float" onclick="return validDate();"><i class="material-icons">check</i> Update</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-float" data-dismiss="modal"><i class="material-icons">clear</i> Close</button>
                                </center>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                        
                         <!-- Modal -->
                        <div class="modal fade" id="enableFrame" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content modal-lg">
                              <div class="modal-header modal-col-cyan">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="mySmallModalLabel"><i class="material-icons">alarm</i> <span> Enable all frames</span></h4>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="<?php echo base_url(); ?>admin/enable_all_framess">
                                <div class="col-md-12">
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="">
                                        <div class="col-md-12 text-center">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" id="md_checkbox_1" class="chk-col-purple" value="FIRST GRADING" checked="" disabled="">
                                                <label for="md_checkbox_1">FIRST GRADING</label>
                                                <input type="checkbox" id="md_checkbox_2" class="chk-col-purple" value="SECOND GRADING" checked="" disabled="">
                                                <label for="md_checkbox_2">SECOND GRADING</label>
                                                <input type="checkbox" id="md_checkbox_3" class="chk-col-purple" value="THIRD GRADING" checked="" disabled="">
                                                <label for="md_checkbox_3">THIRD GRADING</label>
                                                <input type="checkbox" id="md_checkbox_4" class="chk-col-purple" value="FOURTH GRADING" checked="" disabled="">
                                                <label for="md_checkbox_4">FOURTH GRADING</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="sub_name">From</label>
                                              <input type="date" class="form-control" id="from2" name="from_date" required="">
                                              <input type="hidden" class="form-control" id="today2" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="col-md-6">
                                          <label>To</label>
                                              <input type="date" class="form-control" id="to2" name="to_date" required="">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <center>
                                    <button type="submit" class="btn btn-primary waves-effect waves-float" onclick="return validDate2();"><i class="material-icons">check</i> Update</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-float" data-dismiss="modal"><i class="material-icons">clear</i> Close</button>
                                </center>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>

                    <div class="footer">
                        <center>
                            <button class="btn btn-warning waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                Teachers who failed to submit the grades <i class="material-icons">swap_vert</i>
                            </button>
                        </center>
                    </div>
                </div>
                    
                    <div class="card collapse" id="collapseExample">
                        <div class="header bg-red">
                            <h2>
                                Teachers who failed to submit the grades
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">First Grading</a></li>
                                <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Second Grading</a></li>
                                <li role="presentation" class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Third Grading</a></li>
                                <li role="presentation" class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Fourth Grading</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home">
                                    <p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Subject</th>
                                                        <th class="text-center">Teacher Name</th>
                                                        <th class="text-center">S.Y.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($late_first_grading_grades as $late){ extract($late); ?>
                                                        <tr class="text-center">
                                                            <td><label class="label label-primary"><?php echo $sub_name; ?></label></td>
                                                            <td><?php echo $lname.', '.$fname; ?></td>
                                                            <td><?php echo $sy; ?></td>
                                                        </tr>
                                                    <?php } ?>
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
                                                        <th class="text-center">Subject</th>
                                                        <th class="text-center">Teacher Name</th>
                                                        <th class="text-center">S.Y.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($late_second_grading_grades as $late){ extract($late); ?>
                                                        <tr class="text-center">
                                                            <td><label class="label label-primary"><?php echo $sub_name; ?></label></td>
                                                            <td><?php echo $lname.', '.$fname; ?></td>
                                                            <td><?php echo $sy; ?></td>                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                    <p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Subject</th>
                                                        <th class="text-center">Teacher Name</th>
                                                        <th class="text-center">S.Y.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($late_third_grading_grades as $late){ extract($late); ?>
                                                        <tr class="text-center">
                                                            <td><label class="label label-primary"><?php echo $sub_name; ?></label></td>
                                                            <td><?php echo $lname.', '.$fname; ?></td>
                                                            <td><?php echo $sy; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">
                                    <p>
                                       <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Subject</th>
                                                        <th class="text-center">Teacher Name</th>
                                                        <th class="text-center">S.Y.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($late_fourth_grading_grades as $late){ extract($late); ?>
                                                        <tr class="text-center">
                                                            <td><label class="label label-primary"><?php echo $sub_name; ?></label></td>
                                                            <td><?php echo $lname.', '.$fname; ?></td>
                                                            <td><?php echo $sy; ?></td>
                                                        </tr>
                                                    <?php } ?>
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

<script>
    function validDate(){
        var from =  $('#from').val();
        var to =  $('#to').val();
        var today =  $('#today').val();

        if(from == "" || to == ""){
            alert('Please select date!');
            return false;
        } 

        if(from >= to){
            alert('Starting date cannot be equal or greater than!');
            return false;
        }

        if(from < today){
            alert('Date has already passed. Please select valid date!');
            return false;
        } 

        return true;
    }

    function validDate1(){
        var from1 =  $('#from1').val();
        var to1 =  $('#to1').val();
        var today1 =  $('#today1').val();

        if(from1 == "" || to1 == ""){
            alert('Please select date!');
            return false;
        } 

        if(from1 >= to1){
            alert('Starting date cannot be equal or greater than!');
            return false;
        } 

        if(from1 < today1){
            alert('Date has already passed. Please select valid date!');
            return false;
        } 

        return true;
    }

    function validDate2(){
        var from2 =  $('#from2').val();
        var to2 =  $('#to2').val();
        var today2 =  $('#today2').val();

        if(from2 == "" || to2 == ""){
            alert('Please select date!');
            return false;
        } 

        if(from2 >= to2){
            alert('Starting date cannot be equal or greater than!');
            return false;
        } 

        if(from2 < today2){
            alert('Date has already passed. Please select valid date!');
            return false;
        } 

        return true;
    }
</script>




