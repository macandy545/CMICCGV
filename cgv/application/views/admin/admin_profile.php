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
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/admin_index">
                            <i class="material-icons col-red">account_circle</i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header modal-col-cyan">
                            <h2 style="color:white;">
                               <i class="material-icons">star</i> Admin Profile
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?= $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i> PROFILE
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">account_box</i> Update Info
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a data-toggle="tab">
                                        <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#smallModal">
                                            <i class="material-icons">settings</i>Change User/Password
                                        </button>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_with_icon_title">
                                    <div class="thumb-xl member-thumb m-b-10 center-block">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading ">
                                                        <h3 class="panel-title"><center>Profile Image</center></h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="thumb-xl member-thumb m-b-10 center-block pic">
                                                                    <center>
                                                                        <img src="<?php echo base_url().'webroot/images/'.$view_profile['image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img">
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Personal Information</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="m-b-20">
                                                            <strong>Full Name</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view_profile['name']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Mobile</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view_profile['mobile']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Email</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view_profile['email']; ?></p>
                                                        </div>
                                                        <div class="about-info-p m-b-0">
                                                            <strong>Address</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view_profile['address']; ?></p>
                                                        </div>
                                                        <div class="about-info-p m-b-0">
                                                            <strong>Biography</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view_profile['about']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    <div class="thumb-xl member-thumb m-b-10 center-block">
                                        <div class="row">
                                            <form class="form-horizontal" action="<?php echo base_url(); ?>admin/update_profile_validation/<?php echo $view_profile['admin_id']; ?>" method="post" accept-charset="utf-8" >
                                                <div class="col-md-5">
                                                    <div class="panel panel-default panel-fill">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title"><center>Profile Image</center></h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="thumb-xl member-thumb m-b-10 center-block pic">
                                                                        <center>
                                                                            <img src="<?php echo base_url().'webroot/images/'.$view_profile['image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="imgadmin">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label for="student_image" class="control-label col-lg-2"><b>Profile Image</b></label>
                                                                    <div class="col-lg-8">
                                                                        <input class="form-control btn btn-success" onchange="previewFile();" id="img2" name="image"  type="file" />
                                                                        <input type="hidden" id="_imagename" name="_imagename"  value="<?php echo $view_profile['image']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="panel panel-default panel-fill">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Personal Information</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="m-b-20">
                                                                <label>Name:</label>
                                                                <input type="text" name="name" class="form-control" value="<?php echo $view_profile['name']; ?>">
                                                            </div>  
                                                            <div class="m-b-20">
                                                                <label>Contact Number:</label>
                                                                <input type="text" name="mobile" class="form-control" value="<?php echo $view_profile['mobile']; ?>">
                                                            </div>  
                                                            <div class="m-b-20">
                                                                <label>Email Address:</label>
                                                                <input type="text" name="email" class="form-control" value="<?php echo $view_profile['email']; ?>">
                                                            </div> 
                                                            <div class="m-b-20">
                                                                <label>Address:</label>
                                                                <input type="text" name="address" class="form-control" value="<?php echo $view_profile['address']; ?>">
                                                            </div>  
                                                            <div class="m-b-20">
                                                                <label>Biography:</label>
                                                                <input type="text" name="about" class="form-control" value="<?php echo $view_profile['about']; ?>">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <div class="col-md-12 m-b-20">
                                                       <button type="submit" class="btn btn-success waves-effect waves-light w-md"><i class="material-icons">done</i> Update Account</button>
                                                       <button type="reset" class="btn btn-warning waves-effect waves-light w-md"><i class="material-icons">autorenew</i> Reset Field</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header modal-col-red">
                    <h4 class="modal-title" id="smallModalLabel"><i class="material-icons">settings</i> Update Username/Password</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/update_user_pass/<?php echo $view_profile['admin_id']; ?>" method="post" accept-charset="utf-8" > 
                        <div class="m-b-20">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control" value="<?php echo $this->session->userdata('password'); ?>" name="password" required="" ></input>
                            <input id="pass_hide" type="text" class="form-control" value="<?php echo $this->session->userdata('password'); ?>" name="password" required="" ></input>
                        </div>
                        <div class="m-b-20">
                            <label>Confirm Password</label>
                            <input id="password2" type="password" class="form-control" value="<?php echo $this->session->userdata('password'); ?>" name="confirm_pass" required="" ></input>
                            <input id="pass_hide2" type="text" class="form-control" value="<?php echo $this->session->userdata('password'); ?>" name="confirm_pass" required="" ></input>
                        </div>
                        <button id="show_pass" type="button" class="btn btn-danger btn-xs waves-effect">
                            <i class="material-icons">visibility</i> 
                        </button>
                        <button id="hide_pass" type="button" class="btn btn-danger btn-xs waves-effect">
                            <i class="material-icons">visibility_off</i> 
                        </button> Show Password
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#pass_hide').hide();
            $('#pass_hide2').hide();
            $('#hide_pass').hide();
            $('#show_pass').on('click', function(){
            $('#password').hide();
            $('#password2').hide();
            $('#show_pass').hide();
            $('#pass_hide').show();
            $('#pass_hide2').show();
            $('#hide_pass').show();
          });
            $('#hide_pass').on('click', function(){
            $('#password').show();
            $('#password2').show();
            $('#show_pass').show();
            $('#pass_hide').hide();
            $('#pass_hide2').hide();
            $('#hide_pass').hide();
          });
        });
    </script>