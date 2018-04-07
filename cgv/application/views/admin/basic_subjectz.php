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
                    &copy; CGV <a href="javascript:void(0);"><b>CGV</b> </a> All Rights Reserved.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

     <section class="content">
        <div class="container-fluid">
          <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button> Go Back To Previous Page
            <form method="POST" action="<?php echo base_url(); ?>admin/basic_subjectz">
            <div class="col-md- pull-left" style="width: 15%;">
                <select class="form-control show-tick" name="sy">
                    <option value="<?php echo $school_year ?>"><?php echo $school_year ?></option>
                    <?php foreach($school_yrs as $view){ extract($view);?>
                        <option value="<?php echo $sy ?>"><?php echo $sy ?></option>
                    <?php }?>
                </select>
            </div>
            <!-- <div class="col-md-2 pull-left">
              <select class="form-control show-tick" name="semester">
                  <option>Semester</option>
                  <option value="1st Semester">1st Semester</option>
                  <option value="2nd Semester">2nd Semester</option>
              </select>
            </div> -->
            <div class="pull-left">
                <button type="submit" class="btn bg-cyan waves-effect">
                    <i class="material-icons">search</i>
                    <span>SEARCH</span>
                </button>
            </div>
            </form>
            <div class="pull-right">
              <a href="<?php echo base_url(); ?>admin/add_basic_subject">
                <button type="button" class="btn bg-cyan waves-effect">
                    <i class="material-icons">note_add</i>
                    <span>Open a Subject</span>
                </button>
              </a>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i> The following are list of subjects as of <b><?php echo $sy; ?>.</b>
                                <a class="pull-right" href="<?php echo base_url(); ?>admin/print_current_sub" target="__blank">
                                    <button type="button" class="btn btn-info waves-effect">
                                        <i class="material-icons">print</i>
                                        <span>PRINT</span>
                                    </button>
                                </a>
                            </h2>
                        </div>
                        <div class="body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                        <?= $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <div class="table-responsive">
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <h4><b class="badge label-success"> 1st Semester</b> <b class="badge label-primary pull-right"> S.Y. <?php echo $this->session->userdata('curr_sy'); ?></b></h4>
                                    </div>
                                </div> -->
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Teacher</th>
                                            <th>Schedule</th>
                                            <th>Time</th>
                                            <th>SY</th>
                                            <!-- <th>Semester</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($basic_subjectz as $view){  extract($view); ?>
                                        <tr>
                                          <td><b><?php echo $sub_name; ?></b></td> 
                                          <?php $title = $view['gender'] == 'Male' ? 'Sir' : 'Maam' ?>
                                          <td><?php echo $title.' '.$fname.' '.$middle.' '.$lname; ?></td>
                                          <td><?php echo $sched; ?></td>
                                          <td><?php echo date('h:i', strtotime($time_start)).' - '.date('h:i', strtotime($time_end)) ?></td>
                                          <td><?php echo $sy; ?></td>
                                          <!-- <td><?php echo $semester; ?></td> -->
                                            <td class="text-center">
                                              <a href='<?php echo base_url(); ?>admin/admin_update_basic_subject/<?php echo $basic_subject_id; ?>#' data-placement="top" title="Update Subject" data-toggle="tooltip">
                                                      <button type="button" class="btn btn-warning btn-xs"><i class="material-icons">create</i></button> </a>
                                              <a href='<?php echo base_url(); ?>admin/delete_basic_subject/<?php echo $basic_subject_id; ?>' data-placement="top" title="Delete Subject" data-toggle="tooltip">
                                                      <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this subject?')"><i class="material-icons">delete_sweep</i>
                                                      </button></a>
                                              <a href='<?php echo base_url(); ?>admin/students_of_this_subject/<?php echo $view['basic_subject_id']; ?>/<?php echo $sub_name; ?>' data-placement="top" title="View Students" data-toggle="tooltip">
                                                   <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle</i>
                                                  </button>
                                              </a>
                                            </td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

