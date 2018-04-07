<body class="theme-cyan">
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
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="bars"></div>
                <div class="navbar-brand"><b>CGV</b> (Computerized Grade Viewer)</div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="<?php echo base_url(); ?>admin/admin_reports">
                            <i class="material-icons">notifications</i>
                            <span id="message_count" class="label-count"></span>
                        </a>
                    </li>
                </ul>    
            </div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url().'webroot/images/'.$view_profile['image']; ?>" width="48" height="48" alt="Admin" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $view_profile['name']; ?></div>
                    <div class="username"><?php echo $view_profile['username']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>admin/admin_profile/<?php echo $this->session->userdata('admin_id');?>"><i class="ti-user m-r-10"></i> Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/admin_logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <a href="<?php echo base_url(); ?>admin/admin_index">
                            <i class="material-icons col-red">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">assignment_ind</i>
                            <span>Teachers</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_teacher">Add New Teacher</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_teachers">View all Teachers</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">face</i>
                            <span>Students</span>
                        </a>
                        <ul class="ml-menu">
                        <li>
                                <a href="<?php echo base_url(); ?>admin/add_student"><i class="material-icons col-red">add</i> 
                                  <span>Add Student</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_current_students"><i class="material-icons col-red">group</i> 
                                  <span>College Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/seniorHigh"><i class="material-icons col-red">group</i> 
                                  <span>Senior High School Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/highSchoolStudents"><i class="material-icons col-red">group</i> 
                                  <span>High School Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/elementaryStudents"><i class="material-icons col-red">group</i> 
                                  <span>Elementary Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/preSchoolStudents"><i class="material-icons col-red">group</i> 
                                  <span>Pre-schools</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">import_contacts</i>
                            <span><!-- Opened --> Subjects</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/view_subjects">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>Current Subjects Opened</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_all_sub">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>View All Opened Subjects</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/admin_add_subject">
                                    <i class="material-icons col-red">note_add</i>
                                    <span>Open Subject</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/com_laude_candidates">
                            <i class="material-icons col-red">supervisor_account</i>
                            <span>With Honor Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">supervisor_account</i>
                            <span>Dean's List</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url().'admin/prelim_dlist'?>">Prelim</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/midterm_dlist'?>">Midterm</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/sfinal_dlist'?>">Semi-Final</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'admin/final_dlist'?>">Final</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/view_time_frame">
                            <i class="material-icons col-red">alarm</i><span>View Time Frame</span>
                        </a>
                    </li>                    <li>
                        <a href="<?php echo base_url(); ?>admin/admin_logout">
                            <i class="material-icons col-red">input</i><span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date("Y"); ?> <a href="javascript:void(0);"><b>CGV</b> </a> All Rights Reserved.
                </div>
            </div>
        </aside>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header">
                <h2>
                  <?php 
                  foreach($view_single_student as $stud){ extract($stud);
                  $stud_name = $lname.', '.$fname.' '.$middle;
                  $stud_id = $stud_id;
                  }
                  ?> 
                  <i class="material-icons">assignment</i> <b>Add Subjects Taken by <?php echo $stud_name ?></b>
                  <a class="pull-right" data-toggle="modal" data-target=".add_sub">
                  <button style="margin-top:5px;" type="button" class="btn btn-info waves-effect btn-sm">
                  <i class="material-icons">add</i>
                  <span>Add Subject</span>
                  </button>
                  </a>
                </h2>
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
                                <th>Course Description</th>
                                <th>Units</th>
                                <th>Final Grade</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($view_sub_taken as $view){ extract($view);   
                            ?> 
                            <tr>
                              <td><?php echo $sub_name ?></td>
                              <td><?php echo $course_description ?></td>
                              <td><?php echo $units ?></td>
                              <td><?php echo $final ?></td> 
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
    <div class="modal fade add_sub" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content modal-lg">
          <div class="modal-header modal-col-cyan">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="mySmallModalLabel"><i class="material-icons">account_circle</i><span> Add Subject</span></h4>
          </div>
            <div class="modal-body">
            <div class="col-md-12">
               <div class="m-b-20 table-responsive">
                 <table id="datatable" class="table table-bordered table-hover js-basic-example dataTable">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Description</th>
                      <th>Units</th>
                      <th>Grade</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-hovered">
                    <?php 
                        $i = 0;
                        foreach($view_sbjt as $subject){extract($subject); 
                    ?>
                    <tr id="<?php echo $subject['sbjt_id']; ?>">
                      <td><?php echo $subject['sub_name']; ?></td>
                      <td><?php echo $subject['course_description']; ?></td>
                      <td><?php echo $subject['units']; ?></td>
                      <td>
                      <form method="post" action="<?php echo base_url(); ?>admin/add_sub_taken">
                      <input style="width: 50px; text-align: center;" maxlength="3" type="text" class="form-control form-control filled-in col-md-1" name="final" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" placeholder="0.0" required="">
                      <input type="hidden" name="stud_id" value="<?php echo $stud_id ?>">
                      <input type="hidden" name="sbjt_id" value="<?php echo $sbjt_id ?>">
                      </td>
                      <td class="center">
                      <button type="submit" class="btn btn-success btn-sm" ><i class="material-icons">add</i><span></span></button> </form>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>    
                 </table>
               </div>
            </div>
            </div>
            <div class="modal-footer"> </div>
        </div>
      </div>
    </div>


