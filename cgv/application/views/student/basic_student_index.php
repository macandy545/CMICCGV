
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
                    <?php foreach($profile_view as $view){ ?>
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
                        <a href="<?php echo base_url(); ?>student/basic_student_index">
                            <i class="material-icons col-red">book</i>
                            <span>All Subjects Taken</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>student/basic_current_subjects">
                            <i class="material-icons col-red">book</i>
                            <span>Current Subjects</span>
                        </a>
                    </li>
                    <li class="header">Account Settings</li>
                    <li>
                        <a href="<?php echo base_url(); ?>student/basic_profile/<?php echo $this->session->userdata('stud_id'); ?>">
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
            <form method="POST" action="<?php echo base_url(); ?>student/search_sub">
                <div class="pull-right">
                    <button type="submit" class="btn bg-cyan waves-effect">
                        <i class="material-icons">search</i>
                        <span>SEARCH</span>
                    </button>
                </div>
                <div class="col-md-2 pull-right">
                    <select class="form-control show-tick" name="sy">
                        <?php foreach($school_yrs as $view){ extract($view);?>
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
                                <a class="pull-right" href="<?php echo base_url(); ?>student/print_subjects/<?php echo $stud_id; ?>" target="__blank">
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
                                            <th>Subject Name</th>
                                            <th>Teacher</th>
                                            <th>S.Y</th>
                                            <th>First Grading</th>
                                            <th>Second</th>
                                            <th>Third</th>
                                            <th>Fourth</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $total_grades = 0;
                                        $no_of_subjects = 0;
                                        $average_grade = 0;
                                        foreach($view_basic_subjects as $view){ 
                                        $total_grades += $view['fourth_grading'];  
                                        if ($total_grades != 0) {
                                        $no_of_subjects ++;
                                        }
                                        // echo $average_grade = $total_grades / $no_of_subjects;
                                        ?>
                                        <?php 
                                            if ($view['bin'] == 1) {
                                                $remarks = '<b>DROPPED </b>';
                                            }
                                            else{
                                                if ($view['fourth_grading'] == 0 ){
                                                    $remarks = '';
                                                }
                                                elseif ($view['fourth_grading'] >= 75 ){
                                                        $remarks = '<b style="color:green;">Passed </b>';
                                                }else{
                                                    $remarks = '<b style="color:red">Failed </b>'; 
                                                } 
                                            }
                                        ?>
                                            <tr>
                                                <td><b><?php echo $view['sub_name']; ?></b></td>
                                                <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                                                <td><?php echo $view['sy']; ?></td>
                                                <td><?php echo ($view['first_grading'] == 0) ? '' : $view['first_grading']; ?></td>
                                                <td><?php echo ($view['second_grading'] == 0) ? '' : $view['second_grading']; ?></td>
                                                <td><?php echo ($view['third_grading'] == 0) ? '' : $view['third_grading']; ?></td>
                                                <td><?php echo ($view['fourth_grading'] == 0) ? '' : $view['fourth_grading']; ?></td>
                                                <td><?php echo $remarks; ?>
                                                </td> 
                                            </tr>
                                        <?php } ?>
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
    
    

