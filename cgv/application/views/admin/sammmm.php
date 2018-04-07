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
                <div class="navbar-brand"><b>WEBOGS</b> (Web Based Online Grading Viewer System)</div>
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
                    <li class="header">PROFILE SETTINGS</li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/admin_index">
                            <i class="material-icons col-red">account_circle</i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
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
                                <a href="<?php echo base_url(); ?>admin/admin_teacher">Add New Teacher</a>
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
                                <a href="<?php echo base_url(); ?>admin/add_student">Add new Student</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/view_students">View all Student</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">SUBJECTS</li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/view_subjects">
                            <i class="material-icons col-red">book</i>
                            <span>Subjects</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/admin_add_subject">
                            <i class="material-icons col-red">note_add</i>
                            <span>Add Subject</span>
                        </a>
                    </li>
                    <li class="header">Com Laude/Deanslist</li>
                    <li>
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
                    &copy; 2017 <a href="javascript:void(0);"><b>WEBOGS</b> </a> All Rights Reserved.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- #END# Basic Example | Vertical Layout -->
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><i class="material-icons">create</i> Updating Profile</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-0 text-center">
                                        <div class="member-card">
                                            <div class="thumb-xl member-thumb m-b-10 center-block">
                                                <img style="height:20%; width: 20%;" src="<?php echo base_url(); ?>webroot/images/<?php echo $view_profile['image']; ?>" class="img-circle img-thumbnail" alt="profile-image">
                                            </div>

                                            <div class="">
                                                <h4 class="m-b-5"><?php echo $view_profile['name']; ?></h4>
                                                <p class="text-muted">@<?php echo $view_profile['email']; ?></p>
                                            </div>

                                            <p class="text-muted m-t-10">
                                                Update Information
                                            </p>
                                            <button type="button" class="btn btn-success m-t-10"  data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-image"></i> Change Picture</button>
                                               <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="mySmallModalLabel"><i class="fa fa-image"></i> Change Profile Picture</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                                                            <img src="<?php echo base_url(); ?>webroot/images/<?php echo $view_profile['image']; ?>" class="img-circle img-thumbnail" alt="profile-image" id="img">
                                                                            <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <form class="form-horizontal" action="<?php echo base_url(); ?>admin/update_profile_picture/<?php echo $view_profile['admin_id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                         <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <input type="file" class="form-control btn btn-success btn-fill" onchange="previewFile(); setfilename(this.value);" required="" id="img" name="image" />
                                                                                <span class="help-block"><small>Select Image</small></span>
                                                                            </div>
                                                                            <input type="hidden" class="form-control" name="image2" id="img2" required="" onchange="setfilename(this.value);" />
                                                                            <input type="hidden" class="form-control" name="old_image" value="<?php echo $view_profile['image']; ?>" />
                                                                           </div>
                                                                    </div>
                                                                    <div class="row">
                                                                         <div class="form-group">
                                                                            <div class="col-md-12 text-center">
                                                                                <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i> Change Image</button>
                                                                            </div>
                                                                           </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                        </div>
                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->
                            </div>
                            <form id="wizard_with_validation" method="POST">
                                <h3>Account Information</h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-body">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" id="name" placeholder="Title of the Module" name="name" required="" value="<?php echo $view_profile['name']; ?>">
                                                            <label class="form-label">Name*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" value="<?php echo $view_profile['mobile']; ?>" id="mobile" class="form-control" name="mobile">
                                                            <label class="form-label">Mobile Number*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" value="<?php echo $view_profile['address']; ?>" id="address" class="form-control" name="address">
                                                            <label class="form-label">Address*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="email" value="<?php echo $view_profile['email']; ?>" id="Email" class="form-control" name="email">
                                                            <label class="form-label">Email*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" id="username" placeholder="Title of the Module" name="username" required="" value="<?php echo $view_profile['username']; ?>">
                                                            <label class="form-label">Username*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="password" name="password" required="">
                                                            <label class="form-label">Password*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="RePassword" name="cpassword" required="">
                                                            <label class="form-label">Re-enter Password*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                           <textarea style="height: 125px" id="AboutMe" class="form-control" name="about"><?php echo $view_profile['about']; ?></textarea>
                                                            <label class="form-label">About Me*</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <div class="col-md-12 m-b-20">
                                                           <button type="submit" class="btn btn-success waves-effect waves-light w-md"><i class="material-icons">done</i> Update Account</button>
                                                           <button type="reset" class="btn btn-warning waves-effect waves-light w-md"><i class="material-icons">autorenew</i> Reset Field</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>PROFILE SETTINGS</h3>
                                <fieldset>
                                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/update_profile_validation/<?php echo $view_profile['admin_id']; ?>" method="post" accept-charset="utf-8" >
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="name" placeholder="Title of the Module" name="name" required="" value="<?php echo $view_profile['name']; ?>">
                                                <label class="form-label">Name*</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" value="<?php echo $view_profile['mobile']; ?>" id="mobile" class="form-control" name="mobile">
                                                <label class="form-label">Mobile Number*</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" value="<?php echo $view_profile['address']; ?>" id="address" class="form-control" name="address">
                                                <label class="form-label">Address*</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="email" value="<?php echo $view_profile['email']; ?>" id="Email" class="form-control" name="email">
                                                <label class="form-label">Email*</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="username" placeholder="Title of the Module" name="username" required="" value="<?php echo $view_profile['username']; ?>">
                                                <label class="form-label">Username*</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="password" name="password" required="">
                                                <label class="form-label">Password*</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="RePassword" name="cpassword" required="">
                                                <label class="form-label">Re-enter Password*</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                               <textarea style="height: 125px" id="AboutMe" class="form-control" name="about"><?php echo $view_profile['about']; ?></textarea>
                                                <label class="form-label">About Me*</label>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="col-md-12 m-b-20">
                                               <button type="submit" class="btn btn-success waves-effect waves-light w-md"><i class="material-icons">done</i> Update Account</button>
                                               <button type="reset" class="btn btn-warning waves-effect waves-light w-md"><i class="material-icons">autorenew</i> Reset Field</button>
                                            </div>
                                        </div>
                                    </form> 
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>