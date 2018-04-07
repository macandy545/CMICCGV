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
                    <li class="active">
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
                &copy; 2017 <a href="#"><b>WEBOGS</b> </a> All Rights Reserved.
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
                            <i class="material-icons">assignment</i> <b><?php echo $sub_name; ?></b> Students
                        <a class="pull-right" href="#" data-toggle="modal" data-target=".add_student">
                            <button type="button" class="btn btn-info waves-effect">
                                <i class="material-icons">add</i>
                                <span>Add Student</span>
                            </button>
                        </a>
                        <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">print</i>
                            SELECT TERM <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>admin/print_current_prelim_grades/<?php echo $sub_id; ?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Prelim Grades</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/print_current_midterm_grades/<?php echo $sub_id; ?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Midterm Grades</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/print_current_semi_final_grades/<?php echo $sub_id; ?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Semi-Final Grades</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/print_current_final_grades/<?php echo $sub_id; ?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Final Grades</a></li>
                            <li><a href="<?php echo base_url().'admin/print_students_under_this_subject/'.$sub_id.'/'.$sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print All</a>
                            </li>
                        </ul>    
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
                                        <th>Year</th>
                                        <th>Prelim</th>
                                        <th>Midterm</th>
                                        <th>Semi</th>
                                        <th>Final</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($join_grades as $view){ ?>
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
                                        <td><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></td>
                                        <td><?php echo $view['course']; ?></td>
                                        <td><?php echo $view['year']; ?></td>
                                        <td><?php echo ($view['prelim'] == 0) ? '' : $view['prelim']; ?></td>
                                        <td><?php echo ($view['midterm'] == 0) ? '' : $view['midterm']; ?></td>
                                        <td><?php echo ($view['semi_final'] == 0) ? '' : $view['semi_final']; ?></td>
                                        <td><b><?php echo ($view['final'] == 0) ? '' : $view['final']; ?></b></td>
                                        <td><?php echo $rating ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-xs form-control"  data-toggle="modal" data-placement="top" data-target="#myModal<?php echo $view['stud_id']; ?>" title="Add/Update Student Grade"><i class="material-icons">create </i>Add Grade</button>
                                             <a href='<?php echo base_url(); ?>admin/delete_subjects_student/<?php echo $view['stud_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name?>'>   
                                            <button type="button" class="btn btn-danger btn-xs form-control" data-placement="top" title="Drop Student" onclick="return confirm('Are you sure you want to delete this Student?')"><i class="material-icons">delete_sweep</i>Drop
                                            </button>
                                            </a> 
                                            <!-- <a href="<?php echo base_url(); ?>admin/print_single_student_grade_under_this_subject/<?php echo $view['sub_id']; ?>/<?php echo $sub_name; ?>/<?php echo $view['stud_id']; ?>">
                                                <button type="button" class="btn btn-info btn-xs" data-placement="top" title="Print Single Grade">
                                                    <i class="material-icons">print</i>
                                                </button>
                                            </a> -->
                                        </td>
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
<?php foreach($join_grades as $view){ ?>  
<div class="">
        <div class="modal fade" id="myModal<?php echo $view['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-col-cyan">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Update Grade</h4>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open("admin/update_student_grade/".$view['stud_id']."/".$view['sub_id']."/".$sub_name."/".$view['cl_qualified']); ?>
                        <div class="form-group">
                            <label>Name:</label>
                            <input class="form-control" value="<?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?>" readonly="" name="stud_name">
                            <input type="hidden" class="form-control" value="<?php echo $view['sy']; ?>" name="sy">
                            <input type="hidden" class="form-control" value="<?php echo $view['semester']; ?>" name="semester">
                        </div>
                        <div class="form-group">
                            <label>Select Period:</label>
                            <select class="form-control" name="period">
                                <option value="prelim">Prelim Grade</option>
                                <option value="midterm">Midterm Grade</option>
                                <option value="semifinal">Semi-Final Grade</option>
                                <option value="final">Final Grade</option>
                            </select>
                        </div>
                        <div class="">
                            <label>Input Grade:</label>
                            <input class="form-control grade" placeholder="Enter grade here.." name="grade" id="grade" maxlength="3" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
                        </div>
                    </div>
                    <div class="modal-footer  modal-col-white">
                        <button type="submit" class="btn btn-primary">Save changes</button></form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                 <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="modal fade add_student" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="mySmallModalLabel">Add Student</h4>
            </div>
            <div class="modal-body">
               <div class="col-md-12">
                   <div class="m-b-20 table-responsive">
                       <table id="datatable" class="table table-bordered table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <!-- <th>Student ID</th> -->
                                    <th>Student Image</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-hovered">
                                    <?php foreach($view_students as $student){ ?>
                                        <tr id="<?php echo $student['stud_id']; ?>">
                                            <!-- <td><?php echo $student['stud_id']; ?></td> -->
                                            <td><center><span class="table_image"><img src="<?php echo base_url(); ?>webroot/images/<?php echo $student['stud_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img"></span></center></td>
                                            <td><?php echo $student['lname'].", ".$student['fname']." ".$student['middle']; ?></td>
                                            <td><?php echo $student['course']; ?></td>
                                            <td class="center">
                                                <a href='<?php echo base_url(); ?>admin/add_student_to_subject_validation/<?php echo $student['stud_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name?>'>
                                                    <button class="btn btn-success btn-xs"><i class="material-icons">add</i> Add Student</button>
                                                </a>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </tbody>    
                       </table>
                   </div>
               </div>
            </div>
            <div class="modal-footer"> </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
   
     <?php foreach($view_students_of_this_subject as $sub){ ?>  
        document.getElementById('<?php echo $sub['stud_id']; ?>').remove();
     <?php } ?>

</script>



