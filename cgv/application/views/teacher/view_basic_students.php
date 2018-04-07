
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
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><b>CGV</b> (Computerized Grade Viewer)</a>
      </div>
    </div>
  </nav>
  <section>
    <aside id="leftsidebar" class="sidebar">
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
        <div class="col-md-12 col-sm-12 col-xs-12">
          <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
          <!-- <?php
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
          <?php  
              } 
            }
          ?>  -->
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
                <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">print</i>
                  SELECT TERM <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li><a href="<?php echo base_url(); ?>teacher/print_current_first_grading_grades/<?php echo $view['teacher_id']; ?>/<?php echo $basic_subject_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print First Grading Grades</a></li>
                  <li><a href="<?php echo base_url(); ?>teacher/print_current_second_grading_grades/<?php echo $view['teacher_id']; ?>/<?php echo $basic_subject_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Second Grading Grades</a></li>
                  <li><a href="<?php echo base_url(); ?>teacher/print_current_third_grading_grades/<?php echo $view['teacher_id']; ?>/<?php echo $basic_subject_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Third Grading Grades</a></li>
                  <li><a href="<?php echo base_url(); ?>teacher/print_current_fourth_grading_grades/<?php echo $view['teacher_id']; ?>/<?php echo $basic_subject_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print Fourth Grading Grades</a></li>
                  <li><a href="<?php echo base_url(); ?>teacher/print_basic_students_under_this_sub/<?php echo $view['teacher_id']; ?>/<?php echo $basic_subject_id?>/<?php echo $sub_name; ?>" target="__blank"><i class="material-icons">print</i> Print All</a></li>
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
                      <th>Grade/Year Level</th>
                      <th>First Grading</th>
                      <th>Second</th>
                      <th>Third</th>
                      <th>Fourth</th>
                      <th>Remarks</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php foreach($basic_grades as $view){ ?>
                      <?php 
                        if ($view['bin'] == 1) {
                          $rating = '<b>DROPPED </b>';
                        }
                        else{
                          if ($view['fourth_grading'] == 0 ){
                            $rating = '';
                          }
                          elseif ($view['fourth_grading'] >= 75 ){
                            $rating = '<b>Passed </b>';
                          }else{
                            $rating = '<b style="color:red">Failed </b>'; 
                          } 
                        }
                        // $this->db->where('stud_id', $view['stud_id']);
                        // $this->db->where('basic_subject_id', $view['basic_subject_id']);
                        // $this->db->where('teacher_id', $view['teacher_id']);
                        // $this->db->where('sy', $view['sy']);
                        // $query = $this->db->get('reports');
                        // if($query->num_rows() > 0){
                        //     echo "<tr class='bg-purple'>";
                        // }else{
                        //     echo "<tr>";
                        // }
                      ?>
                        <td><center><span class="table_image"><img src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img"></span></center></td>
                        <td><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></td>
                        <td><?php echo $view['year_level']; ?></td>
                        <td><?php echo ($view['first_grading'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['first_grading'].'</b>'; ?></td>
                        <td><?php echo ($view['second_grading'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['second_grading'].'</b>'; ?></td>
                        <td><?php echo ($view['third_grading'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['third_grading'].'</b>'; ?></td>
                        <td><?php echo ($view['fourth_grading'] == 0) ? '<b class="label label-warning">Empty </b>' : '<b class="label label-primary">'.$view['fourth_grading'].'</b>'; ?></td>
                        <td><?php echo $rating ?></td>
                        <td class="text-center">
                          <?php 
                            $date_today = "";
                            $from_date = "";
                            $to_date = "";
                            foreach($basic_time_frame as $tf){ extract($tf); 
                                $date_today = date('Y-m-d');
                            }
                            if($date_today != "" && $date_today != "" && $to_date != ""){
                                if($date_today >= $from_date && $date_today <= $to_date){
                          ?>
                            <button type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-placement="top" data-target="#myModal<?php echo $view['stud_id']; ?>" title="Add Student Grade"><i class="material-icons">add</i></button>
                          <?php }} ?>
                          <a href='<?php echo base_url(); ?>teacher/delete_student_to_subject/<?php echo $view['stud_id']; ?>/<?php echo $basic_subject_id?>/<?php echo $sub_name?>'>   
                          <button type="button" class="btn btn-danger btn-sm form-control" data-placement="top" title="Drop Student" onclick="return confirm('Are you sure you want to delete this Student?')"><i class="material-icons">delete_sweep</i>
                          </button></a> 
                          <!-- <button data-toggle="modal" data-target="#approvedGrade" type="button" onclick="approval_grades(<?php echo $view['basic_subject_id'].','.$view['stud_id']?>);" class="btn btn-warning btn-sm" data-placement="top" title="Send Update Grade To admin">
                            <i class="material-icons">mail</i>
                          </button> -->
                          
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
    <?php foreach($basic_grades as $view){ ?>  
        <div class="">
            <div class="modal fade" id="myModal<?php echo $view['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header modal-col-cyan">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="material-icons">edit</i> Add Grade</h4>
                  </div>
                  <div class="modal-body">
                      <?php echo form_open("teacher/update_basic_grade/".$view['stud_id']."/".$view['basic_subject_id']."/".$sub_name); ?>
                          <div class="form-group">
                              <label>Name:</label>
                              <input class="form-control" value="<?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?>" readonly="" name="stud_name">
                             <input type="hidden" class="form-control" value="<?php echo $view['sy']; ?>" name="sy">
                          </div>
                          <div class="form-group">
                            <label>Select Period:</label>
                            <select class="form-control period" name="period">
                            <?php foreach ($basic_time_frame as $key) { extract($key); ?>    
                              <?php if($term == 'FIRST GRADING'){ ?>
                                  <option value="first_grading" id="FIRST GRADING">FIRST GRADING GRADE</option>
                              <?php } ?>
                              <?php if($term == 'SECOND GRADING'){ ?>
                                  <option value="second_grading" id="SECOND GRADING">SECOND GRADING GRADE</option>
                              <?php } ?>
                              <?php if($term == 'THIRD GRADING'){ ?>
                                  <option value="third_grading" id="THIRD GRADING">THIRD GRADING GRADE</option>
                              <?php } ?>
                              <?php if($term == 'FOURTH GRADING'){ ?>
                                  <option value="fourth_grading" id="FOURTH GRADING">FOURTH GRADING GRADE</option>
                              <?php }?>
                            <?php } ?>    
                            </select>
                          <div class="form-group">
                            <div class="form-control">
                              <label>Input Grade*</label>
                              <input class="form-control grade" placeholder="Enter grade here.." name="grade" id="grade" maxlength="2" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required>
                            </div>
                          </div>        
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button></form>
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
                    <th>Grade/YearLevel</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table-hovered">
                  <?php foreach($basic_students as $student){ ?>
                    <tr id="<?php echo $student['stud_id']; ?>">
                      <td><?php echo $student['stud_id']; ?></td>
                      <td><center><span class="table_image"><img src="<?php echo base_url(); ?>webroot/images/<?php echo $student['stud_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img"></span></center></td>
                      <td><?php echo $student['fname']." ".$student['lname']; ?></td>
                      <td><?php echo $student['year_level']; ?><input type="hidden" name="delete"></td>
                      <td class="center">
                        <a href='<?php echo base_url(); ?>teacher/add_student_to_subject/<?php echo $student['stud_id']; ?>/<?php echo $basic_subject_id?>/<?php echo $sub_name?>'>
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
        </div>
      </div>
    </div>
    <div class="modal fade" id="approvedGrade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Admin Reports</h4>
          </div>
          <div class="modal-body">
            <div class="body">
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
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home_only_icon_title">
                  <h5 class="text-center">Send Update Grade</h5>
                  <form method="post" action="" id="form_approval">
                    <div class="form-group">
                      <label>Subject:</label>
                      <input class="form-control" value="" name="sub_name" id="sub_name" readonly>
                      <input type="hidden" class="form-control" value="" readonly="" name="basic_subject_id" id="basic_subject_id">
                      <input type="hidden" class="form-control" value="" name="teacher_id" id="teacher_id">
                    </div>
                    <div class="form-group">
                      <label>Name:</label>
                      <input class="form-control" id="stud_name" value="" readonly="" name="stud_name">
                      <input type="hidden" class="form-control" value="" name="sy" id="sy">
                      <!-- <input type="hidden" class="form-control" value="" name="semester" id="semester"> -->
                      <input type="hidden" class="form-control" value="" name="stud_id" id="stud_id">
                    </div>
                    <div class="form-group">
                    <label>Enter Period</label> 
                      <select class="form-control" name="grade_period" id="grade_period">
                        <option value="">Select Period</option>
                        <option value="first_grading">Prelim Grade</option>
                        <option value="second_grading">Midterm Grade</option>
                        <option value="third_grading">Semi-Final Grade</option>
                        <option value="fourth_grading">Final Grade</option>
                      </select>
                      <input type="hidden" id="_period" name="_period" value="" />
                    </div>
                    <div class="form-group">
                    <div class="col-md-6">
                      <label>Old Grade:</label>
                      <input class="form-control grade" placeholder="Old" name="old_grade" id="old_grade" readonly>
                      <input type="hidden" name="_first_grading" id="_first_grading">
                      <input type="hidden" name="_second_grading" id="_second_grading">
                      <input type="hidden" name="_third_grading" id="_third_grading">
                      <input type="hidden" name="_fourth_grading" id="_fourth_grading">
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
                  <form method="post" action="<?php echo base_url(); ?>teacher/send_message_to_admin/<?php echo $basic_subject_id; ?>/<?php echo $sub_name; ?>">
                    <div class="form-group">
                      <label>Message:</label>
                      <div class="form-line">
                        <textarea rows="4" class="form-control no-resize" placeholder="Write message here"  required="" name="send_message_to_admin"></textarea>
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
    </div>
    </div>

<script>
  <?php foreach($students_of_this_subject as $sub){ ?>  
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