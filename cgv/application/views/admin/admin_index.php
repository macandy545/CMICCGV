 <script type="text/javascript">
    jQuery(document).ready(function(){
        var chart;
        chart = Highcharts.chart({
            chart: {
                renderTo: 'count_table',
                type: 'column'
            },
            title: {
                text: 'Population of every student in each courses'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Student count: <b>{point.y:.1f}</b>'
            },
            series: [
                <?php echo $count; ?>
            ]
            
        });

    });
</script>
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
                    <li class="active">
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
                            <!-- <li>
                                <a href="<?php echo base_url(); ?>admin/view_current_students">View Current Student</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/add_student">Add new Student</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_students">View all Student</a>
                            </li> -->
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
                            <!-- <li>
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
                            </li> -->
                        </ul>
                    </li>
                    <!-- <li>
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
                    </li> -->
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
            <div class="block-header">
                <h2>Home</h2>
            </div>
            <?php if ($this->session->flashdata('msg')) { ?>
                <?= $this->session->flashdata('msg') ?>
            <?php } ?> 
            <div class="row clearfix">
                <a href="<?php echo base_url(); ?>admin/view_current_teachers">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">account_box</i>
                            </div>
                            <div class="content">
                                <div class="text">TEACHERS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $count_teacher; ?>" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo base_url(); ?>admin/view_current_students">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="content">
                                <div class="text">STUDENTS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $count_student; ?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo base_url(); ?>admin/current_basic_students">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">book</i>
                            </div>
                            <div class="content">
                                <div class="text">BASIC STUDENTS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $count_basic_student; ?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo base_url(); ?>admin/view_subjects">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">book</i>
                            </div>
                            <div class="content">
                                <div class="text">SUBJECTS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $count_subjects; ?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div id="count_table" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">BSIT Students</div>
                            <div class="number"><?php echo $count_bsit; ?>
                                <a href="<?php echo base_url(); ?>admin/view_bsit_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-indigo hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">AB-English Students</div>
                            <div class="number"><?php echo $count_abenglish; ?>
                                <a href="<?php echo base_url(); ?>admin/view_ab_english_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">BSBA Students</div>
                            <div class="number"><?php echo $count_bsba; ?>
                                <a href="<?php echo base_url(); ?>admin/view_bsba_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-deep-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">AB Pol-Sci Students</div>
                            <div class="number"><?php echo $count_ab_polsci; ?>
                                <a href="<?php echo base_url(); ?>admin/view_polsci_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">AB-Psych Students</div>
                            <div class="number"><?php echo $count_ab_psychology; ?>
                                <a href="<?php echo base_url(); ?>admin/view_ab_psychology_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">BSCrim Students</div>
                            <div class="number"><?php echo $count_bs_criminology; ?>
                                <a href="<?php echo base_url(); ?>admin/view_bs_crim_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-light-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">HRM Students</div>
                            <div class="number"><?php echo $count_hrm; ?>
                                <a href="<?php echo base_url(); ?>admin/view_hrm_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">BEEd Students</div>
                            <div class="number"><?php echo $count_beed; ?>
                                <a href="<?php echo base_url(); ?>admin/view_beed_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">BSEd Students</div>
                            <div class="number"><?php echo $count_bsed; ?>
                                <a href="<?php echo base_url(); ?>admin/view_bsed_students">
                                    <button type="button" class="btn btn-default btn-xs waves-effect">
                                        <i class="material-icons">assignment</i>View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

