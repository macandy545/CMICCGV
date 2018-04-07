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
    <style type="text/css">
    	.zeroPadding {
			padding-right: 0px;
			padding-left: 0px;
    	}
    	.customLabel {
    		font-weight: 400;
    	}
    	.ctable {
    		    margin-bottom: -1px;
    	}
    	.ctable tr:last-child {			
			border-bottom: 1px solid #ddd;
    	}
    	.modalFooter {
    		padding: 11px 12px 12px;
    	}
    	.pesoTransform {
            font-size: 13px;
            font-weight: bold;
    	}
        .ptrans {
            position: absolute;
            margin-left: -1px;
            margin-top: -12px;
            border-bottom: 1px solid black;
            width: 11px;
        }
    </style>
 </head>
 <body>
    <img style="float:right; margin-top:-2%;position:absolute;" src="<?php  echo base_url();?>webroot/images/cmic1.png" height="130" width="140"/>
 	<div class="col-md-12">
 		<div class="col-md-12">
        <center>
        <h3><CENTER>CEBU MARY IMMACULATE COLLEGE</CENTER></h3>
        <h5>A. Borbajo St. Talamban, Cebu City</h5>

        <h4>Teacher <?php echo $fname ?></h4>
        <h5>List of Subjects</h5>
       </center>
 		<!-- <h3>List of Subjects under Teacher <b><?php echo $fname ?></b>.</h3> -->
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
                        <?php foreach ($admin_print_teacher_subjects as $view) { ?>
                        <tr>
                            <td><?php echo $view['sub_name'] ?></td>
                            <td><?php echo $view['course_description'] ?></td>
                            <td><?php echo $view['schedule'] ?></td>
                            <td><?php echo $view['time_start'].' '.$view['time_end'] ?></td>
                            <td><?php echo $view['sy'] ?></td>
                            <td><?php echo $view['semester'] ?></td>
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