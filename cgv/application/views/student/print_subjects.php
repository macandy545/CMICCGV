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
        .bottom-right {
            position: absolute;
            bottom: 8px
            right: 16px;
        }
        .bottomright {
            position: absolute;
            bottom: -40px;
            right: 16px;
        }
        .bottomleft {
            position: absolute;
            bottom: 47px;
            left: 16px;
            font-size: 18px;
        }
        .bottom-left {
            position: absolute;
            bottom: 47px;
            right: 70px;
            font-size: 18px;
        }
    </style>
 </head>
 <body>
     <img style="float:right; margin-top:-1.5%;position:absolute;" src="<?php  echo base_url();?>webroot/images/cmic1.png" height="130" width="140"/>
    <!-- <img style="float:left; margin-top:-1.5%;position:absolute;" src="<?php  echo base_url();?>webroot/images/<?php echo $this->session->userdata('curr_sy'); ?>" height="130" width="140"/> -->
    <div class="col-md-12">
        <div class="col-md-12">
        <center>
        <h3><CENTER>CEBU MARY IMMACULATE COLLEGE</CENTER></h3>
        <h5>A. Borbajo St. Talamban, Cebu City</h5>

        <h3><?php echo $this->session->userdata('student_name'); ?></h3>
        <h4><?php echo $this->session->userdata('year_level'); ?></h4>
        <!-- <h5>Taken Subjects</h5> -->
	<div class="table table-bordered">
		<table class="table table-hover ctable">
			<tbody>
				<tr>
                <th>Subject Name</th>
                <th>Teacher</th>
                <th>S.Y</th>
                <th>First Grading</th>
                <th>Second</th>
                <th>Third</th>
                <th>Fourth</th>
                <th>Remarks</th>    
            </tr>
            <?php 
                $total_grades = 0;
                $no_of_subjects = 0;
                $average_grade = 0;
                foreach($view_basic_subjects as $view){ 
                $total_grades += $view['fourth_grading'];  
                if ($total_grades != 0) {
                $no_of_subjects ++;
                }
                $average_grade = $total_grades / $no_of_subjects;
                ?>
            <?php 
                if ($view['fourth_grading'] == 0 ){
                        $remarks = '';
                }
                elseif ($view['fourth_grading'] >= 75 ){
                        $remarks = '<b style="color:green">Passed </b>';
                }else{
                    $remarks = '<b style="color:red">Failed </b>'; 
                } 
            ?>
            <tr>
                <td><?php echo $view['sub_name'] ?></td>
                <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                <td><?php echo $view['sy']; ?></td>
                <td><?php echo ($view['first_grading'] == 0) ? '' : $view['first_grading']; ?></td>
                <td><?php echo ($view['second_grading'] == 0) ? '' : $view['second_grading']; ?></td>
                <td><?php echo ($view['third_grading'] == 0) ? '' : $view['third_grading']; ?></td>
                <td><?php echo ($view['fourth_grading'] == 0) ? '' : $view['fourth_grading']; ?></td>
                <td><?php echo $remarks; ?>
            </tr>
            <?php } ?>
			</tbody>
		</table>
	</div>
    <div>
        <!-- <h4 class="pull-center"><span>Total Units Taken: <?php echo $total_units?></span> units</h4> -->
        <!-- <h4 class="pull-center"><span>Average Grade: <?php echo substr($average_grade, 0, 4); ?></span></h4><br/> -->
    </div>
        <p class="bottomleft">Recommending Approval</p><br><br><br>
    <div class="bottom-right"><h4>Miss Lyralyn M. Veloso</h4>Assistant Dean</div>
        <p class="bottom-left">Approved</p><br/>
    <div class="bottomright"><h4>Dr. Montana M. Phua</h4>College Dean</div>


    
 </body>
 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>

 </html>