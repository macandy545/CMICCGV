<!-- <?php if(isset($_POST['abc'])){ 
// Authorisation details. 
$username = $_POST['username']; 
$hash = $_POST['hash']; 
// Config variables. Consult http://api.txtlocal.com/docs for more info. 
$test = "0"; 
// Data for text message. This is the text message data. 
$sender = $_POST['sender']; // This is who the message appears to be from. 
$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers 
$message = $_POST['mess']; 
// 612 chars or less 
// A single number or a comma-seperated list of numbers 
$message = urlencode($message); 
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test; 
$ch = curl_init('http://api.txtlocal.com/send/?'); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$result = curl_exec($ch); // This is the result from the API 
curl_close($ch); 
echo($result); 
} 
?> -->
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
	  	<div class="block-header">
        <h2>Home</h2>
      </div>
      <?php if ($this->session->flashdata('alert')) { ?>
          <?= $this->session->flashdata('alert') ?>
      <?php } ?> 
      <!-- <form method="post" action="<?php echo base_url(); ?>guardian/guardian_index">
      <table align="center">
      <tr>
      <td>username:</td>
      <td><input type="text" name="username" placeholder="enter your username"></td>
      </tr>
      <tr>
      <td>hash:</td>
      <td><input type="text" name="hash" placeholder="enter your hash key"></td>
      </tr>
      <tr>
      <td>sender:</td>
      <td><input type="text" name="sender" placeholder="enter your name"></td>
      </tr>
      <tr>
      <td>number:</td>
      <td><input type="text" name="num" placeholder="enter your number"></td>
      </tr>
      <tr>
      <td>message:</td>
      <td><textarea name="mess" placeholder="enter your message"></textarea></td>
      </tr>
      <tr>
      <td></td>
      <td><input type="submit" name="abc" value="send"></td>
      </tr>
      </table>
      </form> -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-cyan">
              <h2>
                <i class="material-icons"></i>Click the corresponding button to view your Childs Grades.
              </h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
		                <tr>
		                  <th>Student Name</th>
		                  <th>Grade/Year Level</th>
		                  <th>Action</th>
		                </tr>
                  </thead>
                  <tbody>
                  	<?php 
                        foreach($view_student as $student){ 
                    ?>
                  	<tr>
                  		<td><b><?php echo $student['fname'].' '.$student['middle'].' '.$student['lname']; ?></b></td>
                  		<td><?php echo $student['year']; ?></td>
                  		<td class="text-center">
                        <a href='<?php echo base_url(); ?>guardian/student_grades/<?php echo $student['stud_id']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students" target="_blank">
                          <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle</i>
                          <span>View Grades</span>
                          </button>
                        </a>
                      </td>
                  	</tr>
                  	<?php } ?>
                  	<?php 
                        foreach($view_basic as $basic){ 
                    ?>
                  	<tr>
                  		<td><b><?php echo $basic['fname'].' '.$basic['middle'].' '.$basic['lname']; ?></b></td>
                  		<td><?php echo $basic['year_level']; ?></td>
                  		<td class="text-center">
                        <a href='<?php echo base_url(); ?>guardian/basic_grades/<?php echo $basic['stud_id']; ?>' data-toggle="tooltip" data-placement="top" title="View/Add Students" target="_blank">
                          <button type="button" class="btn btn-primary btn-xs" ><i class="material-icons">account_circle</i>
                          <span>View Grades</span>
                          </button>
                        </a>
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
 	
  
  
  

