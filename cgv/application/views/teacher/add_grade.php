
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
                    <!-- <li class="active">
                        <a href="<?php echo base_url(); ?>teacher/add_grade">
                            <i class="material-icons col-red">note_add</i>
                            <span>Add Grade</span>
                        </a>
                    </li> -->
                    <li class="header">Account Settings</li>
                    <li>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i> Select the subject you want to add grade by clicking the corresponding button. 
                                <!-- <a href="<?php echo base_url(); ?>teacher/teacher_print_subjects/<?php echo $view['teacher_id']; ?>" class="btn btn-info pull-right">
                                    <i style="color:white;" class="material-icons">print</i>
                                    <span>Print</span>
                                </a> -->
                            </h2>
                            <?php $no_of_fields=0; foreach($view_subjects as $view){ 
                                    $no_of_fields++;

                                }
                                if($no_of_fields !=0){
                            ?>
                            <?php } ?>
                        </div>
                        <div class="body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                    <?= $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Schedule</th>
                                            <th>Time</th>
                                            <th>S.Y</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($view_subjects as $view){ ?>
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
                                            <td><?php echo $view['schedule']; ?></td>
                                            <td><?php echo $view['time_start'].' - '.$view['time_end']; ?></td>
                                            <td><?php echo $view['sy']; ?></td>
                                            <td><?php echo $view['semester']; ?></td>
                                            <td class="text-center">
                                                <a href='<?php echo base_url(); ?>teacher/teacher_view_student/<?php echo $view['sub_id'] ?>/<?php echo $view['sub_name']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students">
                                                    <button type="button" class="btn btn-info waves-effect">
                                                        <i class="material-icons">edit</i>
                                                        <span>Input Grade</span>
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

