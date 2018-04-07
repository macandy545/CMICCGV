
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
                <div class="navbar-brand"><b>CGV</b> (Computerized Grade Viewer)</div>
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
                    <li class="active">
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
            <div id="show_message"><?php echo $message; ?></div>
            <!-- <?php echo $dl_message; ?> -->
            <?php foreach($check_if_part_of_deans_list as $dl){ extract($dl);}?>
                <div id="show_dl" class="alert alert-icon alert bg-pink alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><i class="material-icons">thumb_up</i> Congratulations!</strong> You are a part of  <b><?php echo strtoupper($period); ?></b> Dean's List.
                </div>
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel"><i class="material-icons">stars</i> Legend for Honor Student</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-icon alert-danger fade in" role="alert"><i class="material-icons">turned_in</i> Suma Cum Laude = <b>1.0 - 1.04</b></div>
                            <div class="alert alert-icon alert-info fade in" role="alert"><i class="material-icons">turned_in</i> Magna Cum Laude Grade =  <b>1.04 - 1.34</b></div>
                            <div class="alert alert-icon alert-success fade in" role="alert"><i class="material-icons">turned_in</i> Cum Laude Grade = <b>1.35 - 1.54</b></div>
                            <div class="alert alert-icon alert-warning fade in" role="alert"><i class="material-icons">turned_in</i> Grades must not below <b>1.7</b></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>student/student_search">
                <div class="pull-right">
                    <button type="submit" class="btn bg-cyan waves-effect">
                        <i class="material-icons">search</i>
                        <span>SEARCH</span>
                    </button>
                </div>
                <div class="col-md-2 pull-right">
                    <select class="form-control show-tick" name="semester">
                        <option value="All Semester">All Semester</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                    </select>
                </div>
                <div class="col-md-2 pull-right">
                    <select class="form-control show-tick" name="sy">
                        <?php foreach($school_years as $view){ extract($view);?>
                            <option value="<?php echo $sy ?>"><?php echo $sy ?></option>
                        <?php }?>
                    </select>
                </div>
            </form>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i> The Followng are list of all subjects you have taken and their corresponding grades.
                                <a class="pull-right" href="<?php echo base_url(); ?>student/student_print_subjects/<?php echo $stud_id; ?>" target="__blank">
                                    <button type="button" class="btn btn-info waves-effect">
                                        <i class="material-icons">print</i>
                                        <span>PRINT</span>
                                    </button>
                                </a>
                            </h2>
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
                                            <th>Units</th>
                                            <th>Remarks</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach($view_all_subjects as $view){ 
                                        ?>
                                        <?php 
                                            if ($view['bin'] == 1) {
                                                $remarks = '<b>DROPPED </b>';
                                            }
                                            else{
                                                if ($view['final'] == 0 ){
                                                    $remarks = '';
                                                }
                                                elseif ($view['final'] < 3.0 ){
                                                        $remarks = '<b>Passed </b>';
                                                }else{
                                                    $remarks = '<b style="color:red">Failed </b>'; 
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
                                                <td><?php echo $view['units'] ?></td>
                                                <td><?php echo $remarks; ?>
                                                </td> 
                                            </tr>
                                        <?php } ?>
                                        <?php 
                                            foreach($view_sub_taken as $sub_taken){ 
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <?php echo $sub_taken['sub_name']; ?> <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:void(0);"><?php echo $sub_taken['course_description']; ?></a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo ($sub_taken['prelim'] == 0) ? '' : $sub_taken['prelim']; ?></td>
                                                <td><?php echo ($sub_taken['midterm'] == 0) ? '' : $sub_taken['midterm']; ?></td>
                                                <td><?php echo ($sub_taken['semi_final'] == 0) ? '' : $sub_taken['semi_final']; ?></td>
                                                <td><?php echo ($sub_taken['final'] == 0) ? '' : $sub_taken['final']; ?></td>
                                                <td><?php echo $sub_taken['units'] ?></td> 
                                            </tr>
                                        <?php } ?>
                                        <?php 
                                            $no_of_subjects = 0;
                                            $no_of_subjects1 = 0;
                                            $no_of_subjects2 = 0;
                                            $final = 0;
                                            $final1 = 0;
                                            $final2 = 0;
                                            $avrg_grade = 0;
                                            $total_units = 0;
                                            $units = 0; 

                                            foreach($sub_taken_ave as $sub_taken){  
                                                $final1 += $sub_taken['final'];
                                                 $units += $sub_taken['units'];
                                                if ($final1 != 0) {
                                                    $no_of_subjects1 ++;
                                                }
                                            }
                                            foreach($ave_grade as $view){  
                                                $final2 += $view['final'];
                                                if ($final2 != 0) {
                                                    $no_of_subjects2 ++;
                                                }
                                            }
                                            $final = $final1 + $final2;
                                            $no_of_subjects = $no_of_subjects1 + $no_of_subjects2;
                                            if ($final != 0) {
                                                $avrg_grade = $final / $no_of_subjects; 
                                            }
                                            foreach($view_students_units as $view1){  
                                                $total_units = $view1['total_units'] + $units;
                                            }        
                                        ?>
                                        <center>
                                            <button type="button" class="btn btn-info waves-effect">
                                                <i class="material-icons">stars</i>
                                                <span>Total Units Taken: <?php echo ($total_units == 0) ? '' : $total_units; ?></span>
                                            </button>
                                            <button type="button" class="btn btn-success waves-effect">
                                                <i class="material-icons">stars</i>
                                                <span>Average Grade: <?php echo substr(($total_units == 0) ? '' : $avrg_grade, 0, 4); ?></span>
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#smallModal">
                                                <i class="material-icons">turned_in</i>
                                                <span>Legend for Honor Students</span>
                                            </button>

                                        </center>
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
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $('#show_message').fadeOut();
                $('#show_dl').fadeOut();
            },5000);
        });
    </script>
    
    

