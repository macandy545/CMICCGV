
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
                        <img src="<?php echo base_url(); ?>webroot/images/<?php echo $view['teacher_image']; ?>" width="48" height="48" alt="Teacher" />
                    <?php } ?>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('teacher_name'); ?></div>
                    <i>Teacher</i>    
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>teacher/teacher_profile/<?php echo $this->session->userdata('teacher_id'); ?>"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>teacher/teacher_logout"><i class="material-icons">input</i>Sign Out</a></li>
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
                        <a href="<?php echo base_url(); ?>teacher/teacher_all_subjects">
                            <i class="material-icons col-red">book</i>
                            <span>All Subjects Handled</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>teacher/curr_sub">
                            <i class="material-icons col-red">import_contacts</i>
                            <span>Current Subjects Handled</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url(); ?>teacher/add_grade">
                            <i class="material-icons col-red">note_add</i>
                            <span>Add Grade</span>
                        </a>
                    </li> -->
                    <li class="header">Account Settings</li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>teacher/teacher_profile/<?php echo $this->session->userdata('teacher_id'); ?>">
                            <i class="material-icons col-red">assignment_ind</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>teacher/teacher_logout">
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
            <?php if ($this->session->flashdata('msg')) { ?>
                    <?= $this->session->flashdata('msg') ?>
            <?php }else { ?>
                <?= $this->session->flashdata('alert') ?>
            <?php } ?>
            <?php if ($this->session->flashdata('msg_acc')) { ?>
                <?= $this->session->flashdata('msg_acc') ?>
            <?php } ?>
            <!-- #END# Basic Example | Vertical Layout -->
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header modal-col-cyan">
                            <h2 style="color:white;"><i class="material-icons">assignment</i> Below are your Personal Information. You can view and edit the information below.</h2>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home-b1" data-toggle="tab">
                                        <i class="material-icons">face</i> PROFILE
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a data-toggle="tab">
                                        <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#smallModal">
                                            <i class="material-icons">settings</i>Change Password
                                        </button>
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
                                                         <div class="m-b-20">
                                                            <img src="<?php echo base_url(); ?>webroot/images/<?php echo $view['teacher_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img">
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
                                                            <strong>Teacher ID</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['teacher_id']; ?></p>
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
                                                            <strong>Mobile</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['contact_num']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Email_Address</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['email_address']; ?></p>
                                                        </div>
                                                        <div class="m-b-20">
                                                            <strong>Address</strong>
                                                            <br>
                                                            <p class="text-muted"><?php echo $view['address']; ?></p>
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
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header modal-col-red">
                    <h4 class="modal-title" id="smallModalLabel"><i class="material-icons">settings</i> Change Password</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>teacher/update_teacher_pass/<?php echo $view['teacher_id']; ?>" method="post" accept-charset="utf-8" > 
                        <div class="m-b-20">
                            <label>New Password</label>
                            <input id="password" type="password" class="form-control" value="<?php echo $this->session->userdata('teacher_pass'); ?>" name="teacher_pass" required="" ></input>
                            <input id="pass_hide" type="text" class="form-control" value="<?php echo $this->session->userdata('teacher_pass'); ?>" name="teacher_pass" required="" ></input>
                        </div>
                        <div class="m-b-20">
                            <label>Confirm New Password</label>
                            <input id="password2" type="password" class="form-control" value="<?php echo $this->session->userdata('teacher_pass'); ?>" name="confirm_teacher_pass" required="" ></input>
                            <input id="pass_hide2" type="text" class="form-control" value="<?php echo $this->session->userdata('teacher_pass'); ?>" name="confirm_teacher_pass" required="" ></input>
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
