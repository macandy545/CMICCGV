 <!DOCTYPE html>
 <html>
 <head>
 	<title>Computerized Grade Viewer</title>
 	 <!-- Page-Level CSS -->
    <link href="<?php echo base_url(); ?>webroot/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>webroot/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>webroot/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>webroot/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>webroot/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>webroot/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo base_url(); ?>webroot/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

 </head>
 <body>
    <img style="float:right; margin-top:-1.5%;position:absolute;" src="<?php  echo base_url();?>webroot/images/cmic1.png" height="130" width="140"/>
 	<div class="col-md-12">
 		<div class="col-md-12">
        <center>
        <h3><CENTER>CEBU MARY IMMACULATE COLLEGE</CENTER></h3>
        <h5>A. Borbajo St. Talamban, Cebu City</h5>
        <h4>Teacher <?php echo $this->session->userdata('teacher_name'); ?></h4>
        <h4>Subjects</h4>
       </center>
 		<!-- <center><h4>Teacher: <?php echo $this->session->userdata('teacher_name'); ?></h4></center> -->
 			<div class="table table-bordered">
 				<table class="table table-hover ctable">
 					<tbody>
 						<tr>
                            <th>Subject Name</th>
                            <th>Description</th>
                            <th>Schedule</th>
                            <th>Time</th>
                            <th>S.Y</th>
                            <th>Semester</th>
                        </tr>
                        <?php foreach ($view_subjects as $view) { ?>
                        <tr>
                            <td><?php echo $view['sub_name']; ?></td>
                            <td><?php echo $view['course_description']; ?></td>
                            <td><?php echo $view['schedule']; ?></td>
                            <td><?php echo $view['time_start'].' '.$view['time_end']; ?></td>
                            <td><?php echo $view['sy']; ?></td>
                            <td><?php echo $view['semester']; ?></td>
                        <?php } ?>
                        </tr>
 					</tbody>
 				</table>
 			</div>
 		</div>		
 	</div>

 </body>
 
<script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
 </html>