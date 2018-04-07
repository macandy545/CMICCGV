
<body class="theme-cyan">
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
                        <option value="<?php echo $sy ?>"><?php echo $sy ?></option>
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
                                <i class="material-icons">assignment</i> The following are the list of subjects you have handled.
                            </h2>
                        </div>
                        <div class="body">
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
                                      <?php if (isset($_POST['sy']) && isset($_POST['semester'])): ?>
                                        <?php foreach($view_search as $view){ extract($view); ?>     
                                          <tr>
                                            <td><?php echo $sub_name; ?></td>
                                            <td><?php echo $schedule; ?></td>
                                            <td><?php echo $time_start.' - '.$time_end; ?></td>
                                            <td><?php echo $sy; ?></td>
                                            <td><?php echo $semester; ?></td>
                                            <td class="text-center"></button>
                                              <a href='<?php echo base_url(); ?>teacher/teacher_view_student/<?php echo $view['sub_id'] ?>/<?php echo $view['sub_name']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students">
                                                <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle </i><span>View Students</span>
                                                </button>
                                                </a>
                                            </td>
                                          </tr>
                                        <?php } ?>
                                      <?php endif ?>
                                      <?php foreach($view_searchss as $view){?>
                                        <tr>
                                          <td><?php echo $view['sub_name']; ?></td>
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

