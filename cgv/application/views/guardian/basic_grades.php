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
          <div class="navbar-brand"><b>CGV</b> (Computerized Grade Viewer)</div>
      </div>
    </div>
  </nav>
  <section>
    <aside id="leftsidebar" class="sidebar">
      <div class="user-info">
        <div class="image">
          <?php foreach($view_profile as $view){ ?>
          <img src="<?php echo base_url(); ?>webroot/images/<?php echo $view['parent_image']; ?>" width="48" height="48" alt="User" />
          <?php } ?>
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('parent_name'); ?></div>
          <i>Parent</i>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="<?php echo base_url(); ?>guardian/guardian_logout"><i class="material-icons">input</i>Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="menu">
        <ul class="list">
          <li class="header">Index</li>
          <li class="active">
            <a href="<?php echo base_url(); ?>guardian/guardian_index">
              <i class="material-icons col-red">book</i>
              <span>Homepage</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>guardian/guardian_logout">
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
    	<div>
	  		<b class="pull-right col-cyan font-12"><?php echo date('l | F d, Y'); ?></b>
	    	<br>
	  	</div> 
      <?php foreach($basic_grades as $view){ ?>
      <form method="POST" action="<?php echo base_url(); ?>guardian/basic_search/<?php echo $view['stud_id']; ?>">
      <?php } ?>  
        <div class="pull-left">
          <button onclick="history.back()" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="material-icons">arrow_back</i></button>Go Back To Previous Page
        </div>
        <div class="pull-right">
          <button type="submit" class="btn bg-cyan waves-effect">
            <i class="material-icons">search</i>
            <span>SEARCH</span>
          </button>
        </div>
        <div class="col-md-2 pull-right">
          <select class="form-control show-tick" name="sy">
            <?php foreach($schol_years as $view){ extract($view);?>
              <option value="<?php echo $sy ?>"><?php echo $sy ?></option>
            <?php }?>
          </select>
        </div>
      </form>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                <?php 
                  foreach($view_single_basic as $view){ 
                ?>
                <i class="material-icons"></i><b><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></b>, Grades as of S.Y.  <?php echo $this->session->userdata('curr_sy'); ?>.
                <?php } ?>
              </h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
		                <tr>
		                  <th>Subject</th>
                      <th>Teacher</th>
                      <th>First Grading Grade</th>
                      <th>Second</th>
                      <th>Third</th>
                      <th>Fourth</th>
		                </tr>
                  </thead>
                  <tbody>
                  	<?php 
                      foreach($basic_grades as $view)extract($view);{
                    ?>
                  	<tr>
                      <td><b><?php echo $sub_name; ?></b></td>
                  		<td><?php echo $fname.' '.$middle.' '.$lname; ?></td>
                      <td><?php echo $first_grading; ?></td>
                      <td><?php echo $second_grading; ?></td>
                      <td><?php echo $third_grading; ?></td>
                      <td><?php echo $fourth_grading; ?></td>
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
 	
  
  
  

