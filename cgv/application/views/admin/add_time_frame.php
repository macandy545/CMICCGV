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
                    <li class="header">MAIN NAVIGATION</li>
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
                    </li>
                    <li class="header">Com Laude/Deanslist</li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/com_laude_candidates">
                            <i class="material-icons col-red">supervisor_account</i>
                            <span>Com Laude Candidates</span> 
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
                    <li class="header">Time Frame for Grade Submission</li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/view_time_frame">
                            <i class="material-icons col-red">alarm</i><span>View Time Frame</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/add_time_frame">
                            <i class="material-icons col-red">alarm_add</i><span>Add Time Frame</span>
                        </a>
                    </li>
                    <li class="header">Logout</li>
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
                    <div class="card">
                        <div class="header modal-col-cyan">
                            <h2>
                                <i class="material-icons">alarm_add</i> Creating time frame section for submission of grades.
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php echo form_open("admin/add_time_frame_validation"); ?>
                                    <!-- <p></p><br/> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> Input time frame for submission of grades. Make sure to fill-up the informations needed.</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="col-md-4">
                                                                <label for="sub_name">From</label>
                                                                    <input type="datetime-local" class="form-control" id="from" name="from_date" required="">
                                                                <!-- <span class="help-block"><small>Example: IT101</small></span> -->
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>To</label>
                                                                    <input type="datetime-local" class="form-control" id="to" name="to_date" required="">
                                                                <!-- <span class="help-block"><small>Example: IT101</small></span> -->
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="term">Period </label>
                                                                <select class="form-control" id="term" name="term">
                                                                    <option value="prelim">Prelim</option>
                                                                    <option value="midterm">Midterm</option>
                                                                    <option value="semi-final">Semi-Final</option>
                                                                    <option value="final">Final</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group text-center">
                                            <div class="col-md-12 m-b-20">
                                               <button type="submit" class="btn btn-success"><i class="material-icons">done</i> <span>Add Subject</span></button>
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





