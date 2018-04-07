
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
                    <li class="active">
                        <a href="<?php echo base_url(); ?>student/current_subjects">
                            <i class="material-icons col-red">book</i>
                            <span>Current Subjects</span>
                        </a>
                    </li>
                    <li class="header">Account Settings</li>
                    <li>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i> The following are your current subjects and their corresponding grades. (<b><?php echo $this->session->userdata('curr_sem'); ?>, <?php echo $this->session->userdata('curr_sy'); ?></b>) 
                                <button type="button" class="btn btn-info dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">print</i>
                                    SELECT TERM <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url(); ?>student/print_current_prelim_grades" target="__blank"><i class="material-icons">print</i> Print Prelim Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>student/print_current_midterm_grades" target="__blank"><i class="material-icons">print</i> Print Midterm Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>student/print_current_sfinal_grades" target="__blank"><i class="material-icons">print</i> Print Semi-Final Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>student/print_current_final_grades" target="__blank"><i class="material-icons">print</i> Print Final Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>student/print_present_sub/<?php echo $view['stud_id']; ?>" target="__blank"><i class="material-icons">print</i> Print All</a></li>
                                </ul>
                            </h2>
                            <?php $no_of_fields=0; foreach($view_current_subjects as $view){ 
                                    $no_of_fields++;

                                }
                                if($no_of_fields !=0){
                            ?>
                            <?php } ?>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Teacher</th>
                                            <th>S.Y</th>
                                            <th>Semister</th>
                                            <th>Prelim</th>
                                            <th>Mid</th>
                                            <th>Semi</th>
                                            <th>Final</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sem1 = array(
                                                0, 6, 7, 8, 9, 10
                                            );
                                            $sem2 = array(
                                                0, 11, 12, 1, 2, 3
                                            );
                                            $getsem1 = array_search(date('n'), $sem1);
                                            $getsem2 = array_search(date('n'), $sem2);

                                            foreach($view_current_subjects as $view){ 
                                                if($getsem1){
                                                    if($view['semester'] == '1st Semester'){
                                            ?>
                                            <?php 
                                                if ($view['bin'] == 1) {
                                                    $rating = '<b>DROPPED </b>';
                                                }
                                                else{
                                                    if ($view['final'] == 0 ){
                                                        $rating = '';
                                                    }
                                                    elseif ($view['final'] < 3.0 ){
                                                            $rating = '<b>Passed </b>';
                                                    }else{
                                                        $rating = '<b style="color:red">Failed </b>'; 
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
                                                        <td><?php echo $remarks; ?></td>
                                                    </tr>
                                            <?php
                                                        }   
                                                    }
                                                if($getsem2){
                                                    if($view['semester'] == '2nd Semester'){
                                            ?>
                                            <?php 
                                                if ($view['final'] == 0 ){
                                                        $remarks = '';
                                                }
                                                elseif ($view['final'] < 3.0 ){
                                                        $remarks = '<b>Passed </b>';
                                                }else{
                                                    $remarks = '<b style="color:red">Failed </b>'; 
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
                                                    <td><?php echo $remarks; ?></td>
                                                </tr>
                                        <?php
                                                            }  
                                                        }
                                                     } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

