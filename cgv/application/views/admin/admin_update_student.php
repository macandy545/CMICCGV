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
                    <li class="active">
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
                            <div class="header modal-col-cyan">
                                <h2>
                                    <i class="material-icons">create</i> Update Students Information. Make sure you have fill all the information below.
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                                <?= $this->session->flashdata('msg') ?>
                                          <?php } ?>
                                        <div class="list-group">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <?php foreach($view_student as $view){ ?>
                                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin/update_student_validation/<?php echo $view['stud_id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-6">
                                                                <div class="p-0 text-center">
                                                                    <div class="member-card">
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <div class="thumb-xl member-thumb m-b-10 center-block pic">
                                                                                    <img src="<?php echo base_url().'webroot/images/'.$view['stud_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="imgadmin">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                  <label for="student_image" class="control-label col-lg-2"><b>Profile Image</b></label>
                                                                                  <div class="col-lg-8">
                                                                                    <input class="form-control btn btn-success" onchange="previewFile();" id="img2" name="stud_image"  type="file" />
                                                                                    <input type="hidden" id="_studimagename" name="_studimagename"  value="<?php echo $view['stud_image']; ?>">
                                                                                  </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3"></div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default panel-fill">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Personal Indormation</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="">
                                                                        <div class="col-md-5">
                                                                            <label for="lastname">Last Name*</label>
                                                                            <input type="text" class="form-control" id="lname" placeholder="lastname" name="lname" value="<?php echo $view['lname']; ?>" required="">
                                                                            <span class="help-block"><small>Enter Last Name</small></span>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label for="firstname">First Name*</label>
                                                                            <input type="text" class="form-control" id="fname" placeholder="firstname" name="fname" value="<?php echo $view['fname']; ?>" required="">
                                                                            <span class="help-block"><small>Enter First Name</small></span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="">
                                                                                <label>Middle*</label>
                                                                                <select class="form-control" name="middle"  value="<?php echo $view['middle']; ?>" required=""  >
                                                                                    <option value="<?php echo $view['middle']; ?>"><?php echo $view['middle']; ?></option>
                                                                                    <option value="A.">A.</option>
                                                                                    <option value="B.">B.</option>
                                                                                    <option value="C.">C.</option>
                                                                                    <option value="D.">D.</option>
                                                                                    <option value="E.">E.</option>
                                                                                    <option value="F.">F.</option>
                                                                                    <option value="G.">G.</option>
                                                                                    <option value="H.">H.</option>
                                                                                    <option value="I.">I.</option>
                                                                                    <option value="J.">J.</option>
                                                                                    <option value="K.">K.</option>
                                                                                    <option value="L.">L.</option>
                                                                                    <option value="M.">M.</option>
                                                                                    <option value="N.">N.</option>
                                                                                    <option value="O.">O.</option>
                                                                                    <option value="P.">P.</option>
                                                                                    <option value="Q.">Q.</option>
                                                                                    <option value="R.">R.</option>
                                                                                    <option value="S.">S.</option>
                                                                                    <option value="T.">T.</option>
                                                                                    <option value="U.">U.</option>
                                                                                    <option value="V.">V.</option>
                                                                                    <option value="W.">W.</option>
                                                                                    <option value="X.">X.</option>
                                                                                    <option value="Y.">Y.</option>
                                                                                    <option value="Z.">Z.</option>
                                                                                    
                                                                                 </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <div class="col-md-4">
                                                                            <label for="age" >Age*</label>
                                                                            <input type="text" class="form-control" id="age" placeholder="age" name="age" value="<?php echo $view['age']; ?>" required="" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                                                                            <span class="help-block"><small>Ex. 18</small></span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="gender">Gender*</label>
                                                                             <select class="form-control" name="gender">
                                                                                <option value="<?php echo $view['gender']; ?>"><?php echo $view['gender']; ?></option>
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                             </select>
                                                                             <span class="help-block"><small>Select Gender</small></span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label>Contact Number*</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">+63</span>
                                                                                <div class="form-line">
                                                                                    <input type="text" class="form-control" placeholder="Contact Number" name="contact_num" value="<?php echo $view['contact_num']; ?>" maxlength="10" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" required="">
                                                                                </div>
                                                                                <span>Ex. 912345678</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <label for="address">Address*</label>
                                                                            <input type="text" class="form-control" id="address" placeholder="address" name="address" value="<?php echo $view['address']; ?>" required="">
                                                                            <span class="help-block"><small>Ex. Talamban, Cebu City</small></span>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                          <label for="units">Contact Incase of Emergency</label>
                                                                          <select class="form-control" name="parent_id">
                                                                            <?php foreach($parent_name as $name){?>
                                                                          <option value="<?php echo $view['parent_id'] ?>"><?php echo $name['fname'].' '.$name['middle'].' '.$name['lname']; ?></option><?php } ?>
                                                                          <?php foreach($view_parents as $parent){?>
                                                                          <option value="<?php echo $parent['parent_id'] ?>"><?php echo $parent['fname'].' '.$parent['middle'].' '.$parent['lname'] ?></option>
                                                                          <?php } ?> 
                                                                          </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <?php foreach($view_student as $view){ }?>   -->    
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default panel-fill">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title"></h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="">
                                                                        <div class="col-md-4">
                                                                           <label for="course">Course*</label>
                                                                            <select class="form-control" name="course">
                                                                                <option value="<?php echo $view['course']; ?>"><?php echo $view['course']; ?></option>
                                                                                <option value="BSIT">BSIT</option>
                                                                                <option value="AB-English">AB-English</option>
                                                                                <option value="BSBA">BSBA</option>
                                                                                <option value="AB Pol-Sci">AB Pol-Sci</option>
                                                                                <option value="AB Psychology">AB Psychology</option>
                                                                                <option value="BS Criminology">BS Criminology</option>
                                                                                <option value="HRM">HRM</option>
                                                                                <option value="BEEd">BEEd</option>
                                                                                <option value="BSEd">BSEd</option>
                                                                             </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="store" >Year*</label>
                                                                            <select class="form-control" name="year">
                                                                                <option value="<?php echo $view['year']; ?>"><?php echo $view['year']; ?></option>
                                                                                <option value="1st Year">1st Year</option>
                                                                                <option value="2nd Year">2nd Year</option>
                                                                                <option value="3rd Year">3rd Year</option>
                                                                                <option value="4th Year">4th Year</option>
                                                                             </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>        
                                                        <div class="form-group text-center">
                                                            <div class="col-md-12 m-b-20">
                                                                <button type="submit" class="btn btn-success"><i class="material-icons">mode_edit</i> Update Student</button>
                                                                <button type="reset" class="btn btn-warning"><i class="material-icons">autorenew</i> Reset Field</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </section>
        <div class="modal fade add_parent" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content modal-lg">
          <div class="modal-header modal-col-cyan">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="mySmallModalLabel"><i class="material-icons">account_circle</i><span> Add Teacher</span></h4>
          </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="m-b-20 table-responsive">
                  <table id="datatable" class="table table-bordered table-hover js-basic-example dataTable">
                    <thead>
                      <tr>
                        <th>Teacher ID</th>
                        <th>Teacher Image</th>
                        <th>Teacher Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-hovered">
                    <?php 
                      $i = 0;
                      foreach($view_parents as $parent){ 
                    ?>
                      <tr id="<?php echo $parent['parent_id']; ?>">
                        <td><?php echo $parent['parent_id']; ?></td>
                        <td><center><span class="table_image"><img src="<?php echo base_url(); ?>webroot/images/<?php echo $parent['parent_image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img"></span></center></td>
                        <td><?php echo $parent['fname']." ".$parent['middle']." ".$parent['lname']; ?></td>
                        <td class="center">
                          <button data-dismiss="modal" id="teacher-btn<?php echo $i++ ?>" class="btn btn-success btn-sm" value="<?php echo $parent['fname']." ".$parent['lname'].'/'.$parent['parent_id']; ?>"><i class="material-icons">add</i><span> Select Parent</span></button>
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
    <script type="text/javascript">
      $(document).ready(function(){
      var count = $('#datatable tbody.table-hovered tr').length;
      for(var i=0; i<count; i++){
        $('#teacher-btn'+i).on('click',function(){
            var val = $(this).val(),
              split = val.split('/');
            $('#selected').val(split[0]).change();
            $('#_selected').val(split[1]).change();
        });
      }
      for(var i=0; i<count; i++){
        $('#subject-btn'+i).on('click',function(){
            var val = $(this).val(),
              split = val.split('/');
            $('#selectedsub').val(split[0]).change();
            $('#_selectedsub').val(split[1]).change();
        });
      }
      });   
    </script>