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
    <!-- #END# Page Loader -->
    <!-- Top Bar -->
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
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">email</i>
                            <span class="label-count">
                                <?php if ($message == 0) {
                                    echo '';
                                }else{
                                    echo $message;
                                }  ?>  
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <?php foreach ($view_all_message as $msg){ extract($msg);
                                        $teacher_name = $lname.', '.$fname.' '.$middle;
                                    ?>
                                    <li >
                                        <a href="<?php echo base_url(); ?>admin/teacher_message">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">email</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Teacher <b><?php echo $lname ?></b> mesage you.</h4>
                                                <!-- <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p> -->
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="<?php echo base_url(); ?>admin/teacher_message">View All Message</a>
                            </li>
                        </ul>
                    </li>
                </ul>    
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
            <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/admin_reports">
                            <i class="material-icons col-red">notifications</i>
                            <span>Reports</span>
                        </a>
                    </li>
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
                                <a href="<?php echo base_url(); ?>admin/view_current_teachers">View Current Teachers</a>
                            </li>
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
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_subjects">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>College</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/basic_subjects">
                                    <i class="material-icons col-red">import_contacts</i>
                                    <span>Basic</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/com_laude_candidates'?>">
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
                            <i class="material-icons col-red">alarm</i><span>Set/View Time Frame</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/admin_logout">
                            <i class="material-icons col-red">input</i><span>Sign Out</span>
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
                            <i class="material-icons">assignment</i>List of Student grades that need to be update.
                        </h2>
                    <br/>    
                    </div>
                    <div class="body">
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <?= $this->session->flashdata('msg') ?>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Subject</th>
                                        <th>Period</th>
                                        <th>Teacher</th>
                                        <th>Old Grade</th>
                                        <th>Update to</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach($view_all_reports as $view){ ?>
                                    <tr>
                                        <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                                        <td><?php echo $view['course']; ?></td>
                                        <td><?php echo $view['sub_name']; ?></td>
                                        <td><?php echo ucwords($view['period']); ?></td>
                                        <?php  $this->db->where('teacher_id', $view['teacher_id']);
                                             $query = $this->db->get('teacher');
                                             foreach($query->result() as $rows){
                                        ?>
                                            <td><?php echo $rows->fname.', '.$rows->lname; ?></td>
                                        <?php } ?>
                                        <td><?php echo $view['old_grade']; ?></td>
                                        <td><?php echo $view['grade']; ?></td>
                                        <td><?php echo $view['message']; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-xs"  data-toggle="modal" data-placement="top" data-target="#myModal<?php echo $view['stud_id']; ?>" title="Add/Update Student Grade"><i class="material-icons">create</i></button>
                                        </td>
                                    </tr>
                                <?php } ?> 
                                </tbody>
                            </table>
                           <!--- <div class="text-center">
                                <div class="row">
                                    <a href="<?php echo base_url(); ?>admin/print_students_under_this_subject/<?php echo $view['sub_id']; ?>/<?php echo $view['sub_name']; ?>/<?php echo $view['stud_id']; ?>">
                                        <button type="button" class="btn btn-info waves-effect">
                                            <i class="material-icons">print</i>
                                            <span>PRINT ALL STUDENT UNDER THIS SUBJECT </span>
                                        </button>
                                    </a>
                                </div>
                            </div><br/>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php foreach($view_all_reports as $view){ ?>  
<div class="panel panel-default">
        <div class="modal fade" id="myModal<?php echo $view['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Update Grade</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open("admin/update_student_grade2/".$view['stud_id']."/".$view['sub_id']."/".$view['sub_name']."/".$view['cl_qualified']); ?>
                        <div class="form-group">
                            <label>Name:</label>
                            <input class="form-control" value="<?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?>" readonly="" name="stud_name">
                            <input type="hidden" class="form-control grade" name="teacher_id" id="teacher_id" readonly="" value="<?php echo $view['teacher_id']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Subject</label>
                          <input class="form-control grade" name="sub_name" id="sub_name" readonly="" value="<?php echo $view['sub_name']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Period</label>
                          <input class="form-control grade" name="period" id="period" readonly="" value="<?php echo $view['period']; ?>">
                        </div>
                        <div class="form-group">
                          <label>S.Y.</label>
                          <input class="form-control grade" name="sy" id="sy" readonly="" value="<?php echo $view['sy']; ?>">
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                              <label>Old Grade:</label>
                              <input class="form-control grade" placeholder="Enter grade here.." name="old_grade" id="grade" readonly="" value="<?php echo $view['old_grade']; ?>">
                          </div>
                          <div class="col-md-6">
                              <label>New Grade:</label>
                              <input class="form-control grade" placeholder="Enter grade here.." name="grade" id="grade" readonly="" value="<?php echo $view['grade']; ?>">
                          </div>
                        </div>

                    </div>
                    <div class="modal-footer"> <br/><br/><br/>
                        <button type="submit" class="btn btn-primary">Update Grade</button></form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                 </form> 

            </div>
        </div>
    </div>
</div>
<?php } ?>

