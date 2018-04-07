
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
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
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
                            <h4 style="color:black;"><b><i class="fa fa-warning"></i> NOTICE: </b> Submission of <b style="color:white;"><?php echo $listterm; ?></b> &nbsp; Grade is from <b style="color:white;"><?php echo date("M d, Y", strtotime($from_date)); ?></b> to <b style="color:white;"><?php echo date("M d, Y", strtotime($to_date)); ?></b>. Please submit it on time.</h4>
                        </div>
                     <?php  } } ?>
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons">assignment</i>Students under <b><?php echo $sub_name; ?></b>.
                                <a data-toggle="modal" data-target=".add_student">
                                    <button type="button" class="btn btn-info waves-effect pull-right">
                                        <i class="material-icons">library_add</i>
                                        <span>Add Student</span>
                                    </button> 
                                </a> 
                                <!-- <a href="<?php echo base_url(); ?>teacher/print_students_under_this_sub/<?php echo $view['teacher_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name; ?>" target="__blank">
                                    <button type="button" class="btn btn-info waves-effect pull-right">
                                        <i class="material-icons">print</i>
                                        <span>Print Students under this Subject</span>
                                    </button>
                                </a> -->
                                <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">print</i>
                                    SELECT TERM <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url(); ?>teacher/print_current_prelim_grades/<?php echo $view['teacher_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Prelim Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>teacher/print_current_midterm_grades/<?php echo $view['teacher_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Midterm Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>teacher/print_current_semi_final_grades/<?php echo $view['teacher_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Semi-Final Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>teacher/print_current_final_grades/<?php echo $view['teacher_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Final Grades</a></li>
                                    <li><a href="<?php echo base_url(); ?>teacher/print_students_under_this_sub/<?php echo $view['teacher_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print All</a></li>
                                </ul>
                            </h2>
                        <br/>    
                        </div>
                        <div class="body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?= $this->session->flashdata('msg') ?>
                            <?php } ?>

                            <?php if ($this->session->flashdata('msg_to_admin')) { ?>
                                <?= $this->session->flashdata('msg_to_admin') ?>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable" id="stud_persub">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Student Name</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Prelim</th>
                                            <th>Midterm</th>
                                            <th>Semi-Final</th>
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
                                            
                                                $this->db->where('stud_id', $view['stud_id']);
                                                $this->db->where('sub_id', $view['sub_id']);
                                                $this->db->where('teacher_id', $view['teacher_id']);
                                                $this->db->where('sy', $view['sy']);
                                                $query = $this->db->get('reports');

                                                if($query->num_rows() > 0){
                                                    echo "<tr class='bg-purple'>";
                                                }else{
                                                    echo "<tr>";
                                                }
                                            ?>
                                                <td><center><span class="table_image"><img src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img"></span></center></td>
                                                <td><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></td>
                                                <td><?php echo $view['course']; ?></td>
                                                <td><?php echo $view['year']; ?></td>
                                                <td><?php echo ($view['prelim'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['prelim'].'</b>'; ?></td>

                                                <td><?php echo ($view['midterm'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['midterm'].'</b>'; ?></td>
                                                <td><?php echo ($view['semi_final'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['semi_final'].'</b>'; ?></td>
                                                <td><?php echo ($view['final'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['final'].'</b>'; ?></td>
                                                <td><?php echo $rating ?></td>
                                                <td class="text-center">

                                                <?php 
                                                  $date_today = "";
                                                  $from_date = "";
                                                  $to_date = "";
                                                  foreach($time_frame as $tf){ extract($tf); 
                                                      $date_today = date('Y-m-d');
                                                  }
                                                  if($date_today != "" && $date_today != "" && $to_date != ""){
                                                      if($date_today >= $from_date && $date_today <= $to_date){
                                                ?>
                                                  <button type="button" class="btn btn-success btn-xs"  data-toggle="modal" data-placement="top" data-target="#myModal<?php echo $view['stud_id']; ?>" title="Add Student Grade"><i class="material-icons">add</i></button>
                                                <?php }} ?>
                                                  <a href='<?php echo base_url(); ?>teacher/delete_subjects_student/<?php echo $view['stud_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name?>'>   
                                                  <button type="button" class="btn btn-danger btn-xs" data-placement="top" title="Drop Student" onclick="return confirm('Are you sure you want to remove this Student?')"><i class="material-icons">delete_sweep</i>
                                                  </button>
                                                  </a>

                                                  <button data-toggle="modal" data-target="#approved_grade" type="button" onclick="approvalGrades(<?php echo $view['sub_id'].','.$view['stud_id']?>);" class="btn btn-warning btn-xs" data-placement="top" title="Send Update Grade To admin">
                                                      <i class="material-icons">mail</i>
                                                  </button>
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
                                <h4 class="modal-title" id="myModalLabel"><i class="material-icons">edit</i> Add Grade</h4>
                            </div>
                            <div class="modal-body">
                            <?php echo form_open("teacher/update_student_grade/".$view['stud_id']."/".$view['sub_id']."/".$sub_name."/".$view['cl_qualified']); ?>
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input class="form-control" value="<?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?>" readonly="" name="stud_name">
                                   <input type="hidden" class="form-control" value="<?php echo $view['sy']; ?>" name="sy">
                                   <input type="hidden" class="form-control" value="<?php echo $view['semester']; ?>" name="semester">
                                </div>
                                <div class="form-group">
                                  <label>Select Period:</label>
                                  <select class="form-control period" name="period">
                                  <?php foreach ($term_avail as $key) { extract($key); ?>    
                                      <?php if($term == 'PRELIM'){ ?>
                                          <option value="prelim" id="PRELIM">PRELIM GRADE</option>
                                      <?php } ?>
                                      <?php if($term == 'MIDTERM'){ ?>
                                          <option value="midterm" id="MIDTERM">MIDTERM GRADE</option>
                                      <?php } ?>
                                      <?php if($term == 'SEMI-FINAL'){ ?>
                                          <option value="semifinal" id="SEMI-FINAL">SEMI-FINAL GRADE</option>
                                      <?php } ?>
                                      <?php if($term == 'FINAL'){ ?>
                                          <option value="final" id="FINAL">FINAL GRADE</option>
                                      <?php }?>
                                  <?php } ?>    
                                  </select>
                                        <!-- <?php if($view['prelim'] != 0 || $view['midterm'] != 0 ||$view['semi_final'] != 0 ||$view['final'] != 0){?> -->
                                  <div class="form-group">
                                    <div class="form-control">
                                      <label>Input Grade*</label>
                                      <input class="form-control grade" placeholder="Enter grade here.." name="grade" id="grade" maxlength="3" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
                                    </div>
                                  </div>
                                        <!-- <?php } else{ ?> -->
                                           <!-- <div class="form-group">
                                            <div class="form-control">
                                              <label>Input Grade*</label>
                                              <input class="form-control grade" placeholder="Enter grade here.." name="grade" id="grade" maxlength="3" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
                                            </div>
                                        </div>
                                        <?php } ?> -->
                                        <!-- <div class="form-group">
                                            <div class="form-control">
                                              <label>Input Grade*</label>
                                              <input class="form-control grade" placeholder="Enter grade here.." name="grade" id="grade" required>
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <?php if($view['prelim'] != 0 || $view['midterm'] != 0 ||$view['semi_final'] != 0 ||$view['final'] != 0){?> -->
                                   <button type="submit" class="btn btn-primary">Save changes</button></form>
<!--                                 <?php } else{ ?>
                                   <button type="submit" class="btn btn-primary">Save changes</button></form>
                                <?php } ?> -->
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                         </form> 

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

        <div class="modal fade add_student" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content modal-lg">
                    <div class="modal-header modal-col-cyan">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="mySmallModalLabel">Add Student</h4>
                    </div>
                    <div class="modal-body">
                       <div class="col-md-12">
                           <div class="m-b-20 table-responsive">
                               <table id="datatable" class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Image</th>
                                            <th>Student Name</th>
                                            <th>Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-hovered">
                                        <?php foreach($view_student as $student){ ?>
                                            <tr id="<?php echo $student['stud_id']; ?>">
                                                <td><?php echo $student['stud_id']; ?></td>
                                                <td><center><span class="table_image"><img src="<?php echo base_url(); ?>webroot/images/<?php echo $student['stud_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img"></span></center></td>
                                                <td><?php echo $student['fname']." ".$student['lname']; ?></td>
                                                <td><?php echo $student['course']; ?><input type="hidden" name="delete"></td>
                                                <td class="center">
                                                    <a href='<?php echo base_url(); ?>teacher/add_student_to_subject_validation/<?php echo $student['stud_id']; ?>/<?php echo $sub_id?>/<?php echo $sub_name?>'>
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



<!--Modal for send approval to admin-->
<div class="modal fade" id="approved_grade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Admin Reports</h4>
                </div>
                <div class="modal-body">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home_only_icon_title" data-toggle="tab">
                                    <i class="material-icons">border_color</i>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#messages_only_icon_title" data-toggle="tab">
                                    <i class="material-icons">email</i>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home_only_icon_title">
                                <h5 class="text-center">Send Update Grade</h5>
                                <form method="post" action="" id="form_approval">
                                    <div class="form-group">
                                        <label>Subject:</label>
                                        <input class="form-control" value="" name="sub_name" id="sub_name" readonly>
                                        <input type="hidden" class="form-control" value="" readonly="" name="sub_id" id="sub_id">
                                        <input type="hidden" class="form-control" value="" name="teacher_id" id="teacher_id">
                                    </div>
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input class="form-control" id="stud_name" value="" readonly="" name="stud_name">
                                       <input type="hidden" class="form-control" value="" name="sy" id="sy">
                                       <input type="hidden" class="form-control" value="" name="semester" id="semester">
                                       <input type="hidden" class="form-control" value="" name="stud_id" id="stud_id">
                                    </div>
                                    <div class="form-group">
                                      <label>Enter Period</label> 
                                        <select class="form-control" name="grade_period" id="grade_period">
                                            <option value="">Select Period</option>
                                            <option value="prelim">Prelim Grade</option>
                                            <option value="midterm">Midterm Grade</option>
                                            <option value="semifinal">Semi-Final Grade</option>
                                            <option value="final">Final Grade</option>
                                        </select>
                                        <input type="hidden" id="_period" name="_period" value="" />
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-6">
                                          <label>Old Grade:</label>
                                          <input class="form-control grade" placeholder="Old" name="old_grade" id="old_grade" readonly>
                                          <input type="hidden" name="_prelim" id="_prelim">
                                          <input type="hidden" name="_midterm" id="_midterm">
                                          <input type="hidden" name="_semifinal" id="_semifinal">
                                          <input type="hidden" name="_final" id="_final">
                                      </div>
                                      <div class="col-md-6">
                                          <label>New Grade:</label>
                                          <input class="form-control grade" placeholder="New" name="grade" id="grade" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Message:</label>
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Write message here"  required="" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" onclick="return validateUpdate();">Send Report</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form> 
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages_only_icon_title">
                                <h5 class="text-center">Send Message to Admin</h5>
                                <form method="post" action="<?php echo base_url(); ?>teacher/message_to_admin/<?php echo $sub_id; ?>/<?php echo $sub_name; ?>">
                                    <div class="form-group">
                                        <label>Message:</label>
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Write message here"  required="" name="message_to_admin"></textarea>
                                        </div>
                                        <input type="hidden" name="teacher_id" value="<?php echo $this->session->userdata('teacher_id'); ?>">
                                    </div>
                                    <div class="modal-footer">  
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                                                       
                </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
   
     <?php foreach($view_students_of_this_subject as $sub){ ?>  
        document.getElementById('<?php echo $sub['stud_id']; ?>').remove();
     <?php } ?>

     function validateUpdate(){

        var old_grade = $("#old_grade").val();
        if (old_grade == "" || old_grade == 0) {
            alert("Old Grade is required for this action.");
            return false;
        }
        return true;
     }    
     
</script>