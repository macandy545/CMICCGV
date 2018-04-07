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
 	<div class="col-md-12">
 		<div class="col-md-12">
 		<center><h4><?php echo $this->session->userdata('student_name'); ?> Grade</h4></center>
 			<div class="table table-bordered">
 				<table class="table table-hover ctable">
 					<tbody>
 						<tr>
                            <th>Subject Title </th>
                            <th>Description</th>
                            <th>Teacher</th>
                            <th>S.Y</th>
                            <th>Semester</th>
                            <th>Prelim</th>
                            <th>Mid</th>
                            <th>Semi-Final</th>
                            <th>Final</th>    
                        </tr>
                        <?php foreach ($print_single_stud_grade as $view) { ?>
                        <tr>
                            <td><?php echo $view['sub_name'] ?></td>
                            <td><?php echo $view['course_description'] ?></td>
                            <td><?php echo $view['fname']." ".$view['middle']." ".$view['lname'] ?></td>
                            <td><?php echo $view['sy'] ?></td>
                            <td><?php echo $view['semester'] ?></td>
                            <td><?php echo $view['prelim'] ?></td>
                            <td><?php echo $view['midterm'] ?></td>
                            <td><?php echo $view['semi_final'] ?></td>
                            <td><?php echo $view['final'] ?></td>
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