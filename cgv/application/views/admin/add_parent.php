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
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">person_outline</i>
                            <span>Parents</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add_parent"><i class="material-icons col-red">add</i> 
                                  <span>Add Parent</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_parents"><i class="material-icons col-red">group</i> 
                                  <span>View All Parents</span>
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
                            <!-- <li>
                                <a href="<?php echo base_url(); ?>admin/view_subjects">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>Current Subjects Opened</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_all_sub">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>View All Opened Subjects</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/admin_add_subject">
                                    <i class="material-icons col-red">note_add</i>
                                    <span>Open Subject</span>
                                </a>
                            </li> -->
                        </ul>
                    </li>
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
                            <h2 style="color:white;">
                                <i class="material-icons">person_add</i> Adding Parent. Fill up all informations needed below.
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-12">
                                      <?php if ($this->session->flashdata('msg')) { ?>
                                            <?= $this->session->flashdata('msg') ?>
                                      <?php } ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="<?php echo base_url(); ?>admin/parent_validation" method="post" accept-charset="utf-8">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <div class="p-0 text-center">
                                                        <div class="member-card">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="thumb-xl member-thumb m-b-10 center-block pic">
                                                                        <img src="<?php echo base_url(); ?>webroot/images/user.png ?>" class="img-circle img-thumbnail " alt="profile-image" id="imgadmin">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                      <label for="student_image" class="control-label col-lg-2"><b>Profile Image</b></label>
                                                                      <div class="col-lg-8">
                                                                        <input class="form-control btn btn-success" id="img" name="stud_image" type="file" />
                                                                        <input type="hidden" id="_studimagename" name="_studimagename" value="user.png">
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-default panel-fill">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Personal Information</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-4">
                                                                    <label for="lastname">Last Name*</label>
                                                                    <div class="form-line">
                                                                        <input type="text" class="form-control" id="lastname" placeholder="lastname" name="lname" required="">
                                                                    </div>
                                                                    <span class="help-block"><small>Ex. Delacruz</small></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="firstname">First Name*</label>
                                                                    <div class="form-line">
                                                                        <input type="text" class="form-control" id="firstname" placeholder="firstname" name="fname" required="">
                                                                    </div>
                                                                    <span class="help-block"><small>Ex. Juan</small></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Middle*</label>
                                                                        <?php $data = range('A', 'Z'); ?>
                                                                        <select class="form-control" name="middle"  placeholder="middle" required=""  >
                                                                            <option>-</option>
                                                                            <?php foreach ($data as $key): ?>
                                                                                <option value="<?php echo $key.'.' ?>"><?php echo $key.'.' ?></option>
                                                                            <?php endforeach ?>
                                                                         </select>
                                                                    </div>
                                                                </div><div class="col-md-1"></div>
                                                            </div>
                                                           <!--  <button type="button" class="btn btn-default waves-effect">
                                                                        <i class="material-icons"></i>+63
                                                            </button> -->
                                                            <div class="col-md-12">
                                                              <div class="col-md-1"></div>
                                                              <div class="col-md-6">
                                                                <label for="address">Address*</label>
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" id="address" placeholder="address" name="address" required="">
                                                                </div>
                                                                <span class="help-block"><small>Ex. Talamban, Cebu City</small></span>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <label>Contact Number*</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">+63</span>
                                                                    <div class="form-line">
                                                                        <input type="text" class="form-control" placeholder="Contact Number" name="contact_num" maxlength="10" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" required="">
                                                                    </div>
                                                                </div>
                                                                <!-- <label for="contact_num">Contact Number*</label>
                                                                <div class="form-line">
                                                                  <input type="text" class="form-control" id="contact_num" placeholder="Contact Number" name="contact_num" maxlength="10" required="" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                                                                </div>
                                                                <span class="help-block"><small>Ex. +63 9123456789</small></span> -->
                                                              </div>
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="form-group text-center">
                                                    <div class="col-md-12 m-b-20">
                                                       <button type="submit" class="btn btn-success"><i class="material-icons">person_add</i> Add Parent</button>
                                                       <button type="reset" class="btn btn-warning"><i class="material-icons">autorenew</i> Reset Field</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#units_field').hide();
            $('#year').change(function(){
                var val = $(this).val();
                if(val!='1st Year'){
                    $('#units_field').show();
                    $('#total_units').attr('required', 'required');
                }else{
                    $('#units_field').hide();
                }
            });
        });
    </script>