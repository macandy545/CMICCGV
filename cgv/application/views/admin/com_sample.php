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
                    <li class="header">MAIN NAVIGATION</li>
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
                                <a href="<?php echo base_url(); ?>admin/view_current_students">View Current Student</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_student">Add new Student</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_students">View all Student</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">SUBJECTS</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">import_contacts</i>
                            <span>Opened Subjects</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
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
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-red">book</i>
                            <span>Subjects</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_sbjt">
                                    <i class="material-icons col-red">book</i>
                                    <span>View All Subjects</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_sbjt">
                                    <i class="material-icons col-red">note_add</i>
                                    <span>Add Subject</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">Com Laude/Deanslist</li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/com_laude_candidates">
                            <i class="material-icons col-red">supervisor_account</i>
                            <span>Com Laude Candidates</span>
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
                    <li class="header">Time Frame for Grade Submission</li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/view_time_frame">
                            <i class="material-icons col-red">alarm</i><span>View Time Frame</span>
                        </a>
                    </li>
                    <li class="header">Logout</li>
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
            <div class="card">
                <div class="header"> 
                    <h2><i class="material-icons bg-cyan">search </i> <b>Search Specific S.Y and Semester</b></h2>
                </div>
                <br/>
                <center>
                    <div class="container-fluid">
                        <form method="POST" action="<?php echo base_url(); ?>admin/search_honors">
                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="sy">
                                                <?php foreach($school_years as $view){ extract($view);?>
                                                    <option value="<?php echo $sy ?>"><?php echo $sy ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="semester">
                                                <!-- <option value="All Semester">All Semester</option> -->
                                                <option value="1st Semester">1st Semester</option>
                                                <option value="2nd Semester">2nd Semester</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <button id="search_prelim" type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect"><i class="material-icons">search</i> SEARCH</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </center>
            </div>
           <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header modal-col-cyan">
                            <h2 style="color:white;">
                                <i class="material-icons">star</i>
                                <b>With Honor Students</b>
                                <!-- <small style="color:white;">These are the top list candidates for Com Laude</small> -->
                            </h2>
                        </div>
                        <br>
                        <div id="_loader">
                            <center>
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
                            </center>
                        </div>
                        <div id="show">
                            <center>
                                <button type="button" class="btn btn-danger waves-effect">
                                    <i class="material-icons">loop</i>
                                    <span>Show All Candidates</span>
                                </button>
                            </center>
                            <br>
                        </div>
                        <div id="current">
                            <center>
                                <button type="button" class="btn btn-danger waves-effect">
                                    <i class="material-icons">loop</i>
                                    <span>Show Graduating Student With Honors </span>
                                </button>
                            </center>
                            <br>
                        </div>
                        <div id="all_comlaude" class="body">
                            <div class="row" id="com_lau">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <center><i class="material-icons">star</i>
                                                <span>All Students with Honors<i class="material-icons">star</i></span>
                                            </center>
                                            
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php foreach($distinct as $view){ 
                                            $no_of_subject = 0;
                                            $final_grade = 0;

                                            $this->db->where("stud_id", $view['stud_id']); 
                                            $this->db->order_by('final', 'asc');
                                            $this->db->where("final !=", 0); 

                                            $query = $this->db->get("grades");
                                                foreach($query->result() as $rows){//add all data to session    
                                                    $final_grade += $rows->final;
                                                    $no_of_subject ++;
                                                }   
                                            $final_final_grade = $final_grade / $no_of_subject;
                                            if ($final_final_grade >= 1.0 && $final_final_grade <= 1.04) { ?>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="thumbnail text-center">
                                                        <div class="caption">
                                                            <center>
                                                                <div class="picture">
                                                                    <img class="img-responsive" src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>">
                                                                </div>
                                                            </center>
                                                            <h3><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></h3>
                                                            <h6><i>Suma Cum Laude</i></h6>
                                                            <h6><i>Candidate</i></h6>
                                                            <p>
                                                               <?php echo $view['course']; ?><br /> 
                                                               <?php echo $view['year']; ?><br />
                                                            </p>
                                                            <p class="text-center">
                                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">AVERAGE: <?php echo substr($final_final_grade, 0, 4); ?></a><br/>
                                                                <b></b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                           <?php } elseif ($final_final_grade >= 1.05 && $final_final_grade <= 1.34) { ?>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="thumbnail text-center">
                                                        <div class="caption">
                                                            <center>
                                                                <div class="picture">
                                                                    <img class="img-responsive" src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>">
                                                                </div>
                                                            </center>

                                                            <h3><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></h3>
                                                            <h6>Magna Cum Laude</h6>
                                                            <h6><i>Candidate </i></h6>
                                                            <p>
                                                               <?php echo $view['course']; ?><br /> 
                                                               <?php echo $view['year']; ?><br />

                                                            </p>
                                                            <p class="text-center">
                                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">AVERAGE: <?php echo substr($final_final_grade, 0, 4); ?></a><br/>
                                                                <b></b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                           <?php } elseif($final_final_grade >= 1.35 && $final_final_grade <= 1.54){ ?>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="thumbnail text-center">
                                                    <div class="caption">
                                                        <center>
                                                            <div class="picture">
                                                                <img class="img-responsive" src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>">
                                                            </div>
                                                        </center>

                                                        <h3><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></h3>
                                                        <h6><i>Cum Laude</i></h6>
                                                        <h6><i>Candidate</i></h6>
                                                        <p>
                                                           <?php echo $view['course']; ?><br /> 
                                                           <?php echo $view['year']; ?><br />

                                                        </p>
                                                        <p class="text-center">
                                                            <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">AVERAGE: <?php echo substr($final_final_grade, 0, 4); ?></a><br/>
                                                            <b></b>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } else{ ?>
                                        <?php } }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="current_comlaude" class="body">
                            <div class="row" id="curcom_lau">
                                <div class="col-md-12">
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <center>
                                                <i class="material-icons">star</i>Graduating Students With Honors for year  <b><?php echo date('Y'); ?></b>. <i class="material-icons">star</i>
                                            
                                            <a class="pull-right" href="<?php echo base_url().'admin/print_current_honor_stud/'?>" target="__blank">
                                                <button type="button" class="btn btn-info waves-effect">
                                                    <i class="material-icons">print</i>
                                                    <span>PRINT</span>
                                                </button>
                                            </a></center>
                                           <!--  <h3 class="panel-title">
                                                <center><i class="material-icons">star</i>
                                                    <span> Graduating Students With Honors for year <?php echo date('Y'); ?> <i class="material-icons">star</i></span>
                                                </center>
                                                <a class="pull-right" href="<?php echo base_url().'admin/print_midterm_dlist/'?>" target="__blank">
                                                    <button type="button" class="btn btn-info waves-effect">
                                                        <i class="material-icons">print</i>
                                                        <span>PRINT</span>
                                                    </button>
                                                </a>
                                            </h3> -->
                                        </div>
                                        <div class="panel-body">
                                            <?php foreach($current_cl_candid as $view){ 
                                                $no_of_subjects = 0;
                                                $no_of_subjects1 = 0;
                                                $no_of_subjects2 = 0;
                                                $final = 0;
                                                $final1 = 0;
                                                $final2 = 0;
                                                $avrg_grade = 0;
                                                $total_units = 0;

                                                $this->db->where("stud_id", $view['stud_id']); 
                                                $this->db->order_by('final', 'asc');
                                                $this->db->where("final !=", 0); 
                                                $query = $this->db->get("grades");
                                                    foreach($query->result() as $rows){   
                                                        $final2 += $rows->final;
                                                        $no_of_subjects2 ++;
                                                    }  

                                                    foreach($sub_taken_average as $sub_taken){  
                                                        $final1 += $sub_taken['final'];
                                                        if ($view['stud_id'] == $sub_taken['stud_id']) {
                                                            if ($final1 != 0) {
                                                                $no_of_subjects1 ++;
                                                            }
                                                        }
                                                    }
                                                    $final = $final1 + $final2;
                                                    $no_of_subjects = $no_of_subjects1 + $no_of_subjects2;
                                                    if ($final != 0) {
                                                        $avrg_grade = $final / $no_of_subjects; 
                                                    }
                                                if ($avrg_grade >= 1.0 && $avrg_grade <= 1.04) { ?>
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="thumbnail text-center">
                                                            <div class="caption">
                                                                <center>
                                                                    <div class="picture">
                                                                        <img class="img-responsive" src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>">
                                                                    </div>
                                                                </center>
                                                                <h3><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></h3>
                                                                <h6><i>Suma Cum Laude</i></h6>
                                                                <h6><i>Candidate</i></h6>
                                                                <p>
                                                                   <?php echo $view['course']; ?><br /> 
                                                                   <?php echo $view['year']; ?><br />
                                                                </p>
                                                                <p class="text-center">
                                                                    <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">AVERAGE: <?php echo substr($avrg_grade, 0, 4); ?></a><br/>
                                                                    <b></b>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                               <?php } elseif ($final_final_grade >= 1.05 && $final_final_grade <= 1.34) { ?>
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="thumbnail text-center">
                                                            <div class="caption">
                                                                <center>
                                                                    <div class="picture">
                                                                        <img class="img-responsive" src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>">
                                                                    </div>
                                                                </center>

                                                                <h3><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></h3>
                                                                <h6>Magna Cum Laude</h6>
                                                                <h6><i>Candidate </i></h6>
                                                                <p>
                                                                   <?php echo $view['course']; ?><br /> 
                                                                   <?php echo $view['year']; ?><br />

                                                                </p>
                                                                <p class="text-center">
                                                                    <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">AVERAGE: <?php echo substr($final_final_grade, 0, 4); ?></a><br/>
                                                                    <b></b>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                               <?php } elseif($final_final_grade >= 1.35 && $final_final_grade <= 1.54){ ?>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="thumbnail text-center">
                                                        <div class="caption">
                                                            <center>
                                                                <div class="picture">
                                                                    <img class="img-responsive" src="<?php echo base_url(); ?>webroot/images/<?php echo $view['stud_image']; ?>">
                                                                </div>
                                                            </center>

                                                            <h3><?php echo $view['lname'].', '.$view['fname'].' '.$view['middle']; ?></h3>
                                                            <h6><i>Cum Laude</i></h6>
                                                            <h6><i>Candidate</i></h6>
                                                            <p>
                                                               <?php echo $view['course']; ?><br /> 
                                                               <?php echo $view['year']; ?><br />

                                                            </p>
                                                            <p class="text-center">
                                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">AVERAGE: <?php echo substr($final_final_grade, 0, 4); ?></a><br/>
                                                                <b></b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } else{ ?>
                                            <?php } }?>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#current').show();
            $('#all_comlaude').show()
            $('#show').hide();;
            $('#current').on('click', function(){
                $('#current_comlaude').hide();
                $('#all_comlaude').hide();
                setTimeout(function(){
                $('#current').hide();  
                $('#comlaude').hide();
                $('#show').show();  
                },1000);
            });
            $('#show').on('click', function(){
                $('#current_comlaude').hide();
                setTimeout(function(){
                $('#all_comlaude').show();
                $('#current').show();  
                $('#comlaude').show();
                $('#show').hide();  
                },1000);
            });
        });
    </script>
    
    
