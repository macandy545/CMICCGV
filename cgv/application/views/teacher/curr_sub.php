
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
                    <li class="active">
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
            <?php if ($this->session->flashdata('msg')) { ?>
                    <?= $this->session->flashdata('msg') ?>
            <?php }else { ?>
                <?= $this->session->flashdata('alert') ?>
            <?php } ?>
            <?php
                $listterm = "";
                $date_today ="";
                $from_date ="";
                $to_date ="";
                 foreach($time_frame as $tf){ extract($tf); 
                    $date_today = date('Y-m-d');
                    $listterm = $listterm.$term;
                }
                if($listterm != "" && $date_today != "" && $from_date != "" && $to_date != ""){
                    if($date_today <= $to_date){
             ?>
                <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4 style="color:black;"><b><i class="fa fa-warning"></i> NOTICE: </b> Submssion of <b style="color:white;"><?php echo $listterm; ?></b> &nbsp; Grade is from <b style="color:white;"><?php echo date("M d, Y", strtotime($from_date)); ?></b> to <b style="color:white;"><?php echo date("M d, Y", strtotime($to_date)); ?></b>. Please submit it on time.</h4>
                </div>
             <?php  } } ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i> The following are the list of all the subjects you have handled as of <b><?php echo $this->session->userdata('curr_sem'); ?>, <?php echo $this->session->userdata('curr_sy'); ?></b>. 
                                <a href="<?php echo base_url(); ?>teacher/teacher_print_subjects/<?php echo $view['teacher_id']; ?>" class="btn btn-info pull-right" target="__blank">
                                    <i style="color:white;" class="material-icons">print</i>
                                    <span>Print</span>
                                </a>
                            </h2>
                            <!-- <?php 
                                $no_of_fields=0; foreach($view_subjects as $view){ 
                                    $no_of_fields++;
                                }
                                if($no_of_fields !=0){
                            ?>
                            <?php } ?> -->
                        </div>
                        <div class="body">
                            <!-- <center>
                            <div class="container-fluid">
                                <form method="POST" action="<?php echo base_url(); ?>teacher/teacher_search">
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
                            </center> -->
                            <div class="table-responsive">
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <h4><b class="badge label-success"> 1st Semester</b> <b class="badge label-primary pull-right"> S.Y. <?php echo $this->session->userdata('curr_sy'); ?></b></h4>
                                    </div>
                                </div> -->
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Schedule</th>
                                            <th>Time</th>
                                            <th>S.Y</th>
                                            <th>Semester</th>
                                            <th><center>Action</center></th>
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
                                            
                                            foreach($view_subjects as $view){ extract($view); 
                                            if($getsem1){
					                               if($view['semester'] == '1st Semester'){
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
					                                            <td><?php echo $view['schedule']; ?></td>
					                                            <td><?php echo $view['time_start'].' - '.$view['time_end']; ?></td>
					                                            <td><?php echo $view['sy']; ?></td>
					                                            <td><?php echo $view['semester']; ?></td>
					                                            <td class="text-center">
					                                                <a href='<?php echo base_url(); ?>teacher/teacher_view_student/<?php echo $view['sub_id'] ?>/<?php echo $view['sub_name']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students">
					                                                    <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle</i>
					                                                    </button>
					                                                </a>
					                                            </td>
					                                        	</tr>
					                            <?php
					                                   } 
                                                    }
                                                if($getsem2){
                                                   if($view['semester'] == '2nd Semester'){ 
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
                                                    <td><?php echo $view['schedule']; ?></td>
                                                    <td><?php echo $view['time_start'].' - '.$view['time_end']; ?></td>
                                                    <td><?php echo $view['sy']; ?></td>
                                                    <td><?php echo $view['semester']; ?></td>
                                                    <td class="text-center">
                                                        <a href='<?php echo base_url(); ?>teacher/teacher_view_student/<?php echo $view['sub_id'] ?>/<?php echo $view['sub_name']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students">
                                                            <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle</i><span>View Students</span>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php         
					                                    }
                                                    }
                                                }

					                            ?>
                                      <?php foreach($view_current_basic_subjects as $view){?>
                                      <tr>
                                        <td>
                                          <div class="btn-group">
                                            <button type="button" class="btn btn-info">
                                              <?php echo $view['sub_name']; ?>
                                            </button>
                                          </div>
                                        </td>
                                        <td><?php echo $view['sched']; ?></td>
                                        <td><?php echo date('h:i', strtotime($view['time_start'])).' - '.date('h:i', strtotime($view['time_end'])) ?></td>
                                        <td><?php echo $view['sy']; ?></td>
                                        <td></td>
                                        <td class="text-center">
                                          <a href='<?php echo base_url(); ?>teacher/view_basic_students/<?php echo $view['basic_subject_id'] ?>/<?php echo $view['sub_name']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students">
                                          <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle</i>
                                            <span>View Students</span>
                                          </button>
                                          </a></td>
                                      </tr>
                                      <?php }?>
                                      
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

