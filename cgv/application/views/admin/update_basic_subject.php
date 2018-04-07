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
                    <li class="active">
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
                            <li class="active">
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
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header modal-col-cyan">
                            <h2>
                                <i class="material-icons">create</i> Update Subject Section.
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                            <?= $this->session->flashdata('msg') ?>
                                    <?php } ?>
                                    <div class="col-md-12">
                                    <?php foreach($view_single_basic_subject as $view){ ?>
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin/update_basic_subject_validation/<?php echo $view['basic_subject_id']; ?>" method="post" accept-charset="utf-8">
                                            <div class="col-md-12">
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Fill out all needed information below.</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="">
                                                            <div class="col-md-6">
                                                                <div class="form-line">
                                                                    <input style="background-color:white;" type="text" class="form-control filled-in" name="sub_name" value="<?php echo $view['sub_name'] ?>" placeholder="Enter Subject Name" required="" >
                                                                </div>
                                                                <span class="help-block"><small>Enter Subject Name</small></span>
                                                            </div>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="teacher_id">
                                                              <option value="<?php echo $view['teacher_id']; ?>"><?php echo $view['fname']." ".$view['middle']." ".$view['lname']; ?></option> 
                                                              <?php foreach ($view_teacher as $view1 ): ?>
                                                                  <option value="<?php echo $view1['teacher_id']; ?>"><?php echo $view1['fname']." ".$view1['lname']; ?></option> 
                                                              <?php endforeach ?>
                                                            </select>
                                                            <span class="help-block"><small>Select Teacher</small></span>
                                                        </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="col-md-12">
                                                                <div class="col-md-6">
                                                                    <label>Select Schedule Days</label>
                                                                    <select size="8" multiple="multiple" class="form-control" name="sched[]">
                                                                        <option value="<?php echo $view['sched']; ?>"><?php echo $view['sched']; ?></option>
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
                                                                    <!-- echo date('h:i:s', strtotime($view['time_start'])); -->
                                                                    <label for="time_start">Time Start</label>
                                                                    <input type="text" class="form-control" id="time_start" placeholder="Time Start" name="time_start" value="<?php echo date('h:i a', strtotime($view['time_start'])); ?>" required="">
                                                                    <span class="help-block"><small>Example: 4:00pm</small></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="time_end">Time End </label>
                                                                    <input type="text" class="form-control" id="time_end" placeholder="Time End" name="time_end" value="<?php echo date('h:i a', strtotime($view['time_end'])); ?>" required="">
                                                                    <span class="help-block"><small>Example: 5:00pm</small></span>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <!-- <div class="col-md-2"></div> -->
                                                            <div class="col-md-4">
                                                                <label for="sy">S.Y</label>
                                                                <input type="text" class="form-control" id="sy" placeholder="S.Y" name="sy" value="<?php echo $view['sy']; ?>" required="">
                                                                <span class="help-block"><small>Example: 2017-2018</small></span>
                                                            </div>
                                                           <!--  <div class="col-md-4">
                                                                <label for="semister">Semester </label>
                                                                <select  class="form-control" name="semester">
                                                                    <option value="<?php echo $view['semester']; ?>"><?php echo $view['semester']; ?></option>
                                                                    <option value="1st Semester">1st Semester</option>
                                                                    <option value="2nd Semester">2nd Semester</option>
                                                                </select>
                                                                <span class="help-block"><small>Example: 1st Sem</small></span>
                                                            </div> -->
                                                            <div class="col-md-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <div class="col-md-12 m-b-20">
                                                            <button type="submit" class="btn btn-success"><i class="material-icons">mode_edit</i> Update Subject</button>
                                                            <button type="reset" class="btn btn-warning"><i class="material-icons">autorenew</i> Reset Field</button>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                    </div>        
                                </div>
                            </div>
                        </div>            

                                      
                    </div>
                </div>
            </div>
        </div>      
    </section>




