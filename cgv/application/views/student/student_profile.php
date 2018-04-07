
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
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><b>CGV</b> (Computerized Grade Viewer)</a>
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
                    <?php foreach($view_profile as $view){ ?>
                    <img src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>" width="48" height="48" alt="User" />
                    <?php } ?>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('student_name'); ?></div>
                    <i>Student</i>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>student/student_profile/<?php echo $this->session->userdata('stud_id'); ?>"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>student/student_logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">SUBJECTS</li>
                    <li>
                        <a href="<?php echo base_url(); ?>student/student_index">
                            <i class="material-icons col-red">book</i>
                            <span>All Subjects Taken</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>student/current_subjects">
                            <i class="material-icons col-red">book</i>
                            <span>Current Subjects</span>
                        </a>
                    </li>
                    <li class="header">Account Settings</li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>student/student_profile/<?php echo $this->session->userdata('stud_id'); ?>">
                            <i class="material-icons col-red">assignment_ind</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>student/student_logout">
                            <i class="material-icons col-red">input</i>
                            <span>Logout</span>
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
            <!-- #END# Basic Example | Vertical Layout -->
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header modal-col-cyan">
                            <h2 style="color:white;"><i class="material-icons">assignment</i> Below are your Personal Information.</h2>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home-b1" data-toggle="tab">
                                        <i class="material-icons">face</i> PROFILE
                                    </a>
                                </li>
                            </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-b1">
                                        <div class="row">
                                            <?php foreach($view_profile as $view){ ?>
                                            <div class="col-md-6">
                                                <!-- Personal-Information -->
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Profile Image </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="thumb-xl member-thumb m-b-10 center-block pic">
                                                                    <center>
                                                                        <img src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?> ?>" class="img-circle img-thumbnail " alt="profile-image">
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Personal-Information -->
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Personal Information</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                         <div class="m-b-20">
                                                            <strong>Student ID</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['stud_id']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Firstname</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['fname']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Middle</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['middle']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Lastname</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['lname']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Age</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['age']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Gender</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['gender']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Contact Number</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['contact_num']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Address</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['address']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Course</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['course']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Year</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['year']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>

