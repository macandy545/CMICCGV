
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
            <div class="pull-left">
                <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i> The Followng are list of Subjects you have taken and their corresponding grades.
                            </h2>
                        </div>
                        <br/>
                        <div class="body">
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
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($_POST['sy']) && isset($_POST['semester'])): ?>
                                            <?php foreach($view_search as $view){ extract($view); 
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
                                                    <td><?php echo $sub_name; ?></td>
                                                    <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                                                    <td><?php echo $sy; ?></td>
                                                    <td><?php echo $semester; ?></td>
                                                    <td><?php echo $prelim; ?></td>
                                                    <td><?php echo $midterm; ?></td>
                                                    <td><?php echo $semi_final; ?></td>
                                                    <td><?php echo $final; ?></td>
                                                    <td><?php echo $remarks ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php endif ?>
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

