
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
                    <li class="active">
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
                    <div id="show_message"><?= $this->session->flashdata('msg') ?></div>
            <?php }else { ?>
            <div id="show_message"><?= $this->session->flashdata('alert') ?></div>
                <!-- <?= $this->session->flashdata('alert') ?> -->
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
                <h4 style="color:black;"><b><i class="fa fa-warning"></i> NOTICE: </b> Submission of <b style="color:white;"><?php echo $listterm; ?></b> &nbsp;Grade is from <b style="color:white;"><?php echo date("M d, Y", strtotime($from_date)); ?></b> to <b style="color:white;"><?php echo date("M d, Y", strtotime($to_date)); ?></b>. Please submit on time.</h4>
              </div>
            <?php  
                } 
              }
            ?> 
            <?php
            $listterm = "";
            $date_today ="";
            $from_date ="";
            $to_date ="";
             foreach($basic_time_frame as $tf){ extract($tf); 
                $date_today = date('Y-m-d');
                $listterm = $listterm.$term;
            }
            if($listterm != "" && $date_today != "" && $from_date != "" && $to_date != ""){
              if($date_today <= $to_date){
          ?>
          <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 style="color:black;"><b><i class="fa fa-warning"></i> NOTICE: </b> Submission of <b style="color:white;"><?php echo $listterm; ?></b> &nbsp; Grade is from <b style="color:white;"><?php echo date("M d, Y", strtotime($from_date)); ?></b> to <b style="color:white;"><?php echo date("M d, Y", strtotime($to_date)); ?></b>. Please submit it on time.</h4>
          </div>
          <?php  
              } 
            }
          ?>  
            <form method="POST" action="<?php echo base_url(); ?>teacher/teacher_search">
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
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header">
                    <h2>
                      <i class="material-icons">assignment</i> The following are the list of all the subjects you have handled. 
                      <a href="<?php echo base_url(); ?>teacher/teacher_print_all_subjects/<?php echo $this->session->userdata('teacher_id'); ?>" class="btn btn-info pull-right" target="__blank">
                        <i style="color:white;" class="material-icons">print</i>
                        <span>Print</span>
                      </a>
                    </h2>
                    <?php 
                      $no_of_fields=0; foreach($view_all_subjects as $view){ 
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
                            <th>Subject</th>
                            <th>Schedule</th>
                            <th>Time</th>
                            <th>S.Y</th>
                            <th>Semester</th>
                            <th><center>Action</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($view_all_subjects as $view){?>
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
                            <td><?php echo date('h:i', strtotime($view['time_start'])).' - '.date('h:i', strtotime($view['time_end'])) ?></td>
                            <td><?php echo $view['sy']; ?></td>
                            <td><?php echo $view['semester']; ?></td>
                            <td class="text-center">
                              <a href='<?php echo base_url(); ?>teacher/teacher_view_student/<?php echo $view['sub_id'] ?>/<?php echo $view['sub_name']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students">
                              <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle</i>
                                <span>View Students</span>
                              </button>
                              </a></td>
                          </tr>
                          <?php }?>
                          <?php foreach($view_basic_subjects as $view){?>
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
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $('#show_message').fadeOut();
            },3000);
        });
    </script>

