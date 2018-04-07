
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
            <?php echo $message; ?>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i> The Following are your present subjects and their corresponding grades.
                            </h2>
                            <?php $no_of_fields=0; foreach($view_all_subjects as $view){ 
                                    $no_of_fields++;

                                }
                                if($no_of_fields !=0){
                            ?>
                            <?php } ?>
                        </div>
                        <div class="body">
                            <center>
                            <div class="container-fluid">
                                <form method="POST" action="<?php echo base_url(); ?>student/student_search">
                                    <div class="row clearfix">
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="sy" class="form-control" placeholder="Ex. 2017-2018" autofocus="" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" name="semester">
                                                        <option value="All Semester">All Semester</option>
                                                        <option value="1st Semester">1st Semester</option>
                                                        <option value="2nd Semester">2nd Semester</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect"><i class="material-icons">search</i> SEARCH</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </center>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Teacher</th>
                                            <th>S.Y</th>
                                            <th>Semister</th>
                                            <th>Prelim</th>
                                            <th>Mid</th>
                                            <th>Semi</th>
                                            <th>Final</th>
                                            <th>Action</th>
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

                                            $date = date('Y');
                                            $date2=date('Y', strtotime('+1 Years'));
                                                $sy = $date.'-'.$date2;

                                            foreach($view_all_subjects as $view){ 
                                                if($getsem1){
                                                    if($view['semester'] == '1st Semester' && $view['sy'] == $sy){
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
                                                        <td><?php echo $view['prelim']; ?></td>
                                                        <td><?php echo $view['midterm']; ?></td>
                                                        <td><?php echo $view['semi_final']; ?></td>
                                                        <td><?php echo $view['final']; ?></td>
                                                        <td class="text-center">
                                                            <a href="<?php echo base_url(); ?>student/print_single_stud_grade/<?php echo $view['stud_id']; ?>/<?php echo $view['sub_id']; ?>">
                                                                <button type="button" class="btn btn-info btn-sm waves-effect">
                                                                    <i class="material-icons">print</i>
                                                                    <span>PRINT</span>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                        }   
                                                    }
                                                if($getsem2){
                                                    if($view['semester'] == '2nd Semester' && $view['sy'] == $sy){
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
                                                    <td><?php echo $view['prelim']; ?></td>
                                                    <td><?php echo $view['midterm']; ?></td>
                                                    <td><?php echo $view['semi_final']; ?></td>
                                                    <td><?php echo $view['final']; ?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url(); ?>student/print_single_stud_grade/<?php echo $view['stud_id']; ?>/<?php echo $view['sub_id']; ?>">
                                                            <button type="button" class="btn btn-info btn-sm waves-effect">
                                                                <i class="material-icons">print</i>
                                                                <span>PRINT</span>
                                                            </button>
                                                        </a>
                                                    </td>
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
        </div>
    </section>

