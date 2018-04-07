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
            right: 20px;
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
            right: 110px;
            font-size: 18px;
        }
</style>
 <body>
    <img style="float:right; margin-top:-1.5%;position:absolute;" src="<?php  echo base_url();?>webroot/images/cmic1.png" height="100" width="100"/>
 	<div class="col-md-12">
 		<div class="col-md-12">
        <center>
        <h3><CENTER>CEBU MARY IMMACULATE COLLEGE</CENTER></h3>
        <h5>A. Borbajo St. Talamban, Cebu City</h5>

        <h4><?php echo $stud_name;?> GRADES</h4>
        <h5><?php echo $year;?>, <?php echo $course;?></h5>
        <!-- <p><?php echo $this->session->userdata('curr_sem'); ?>, <?php echo $this->session->userdata('curr_sy'); ?></p> -->
       </center> 
 		<!-- <center><h4>Student Grade</h4></center> -->
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
                            <th>Remarks</th>  
                        </tr>
                        <?php foreach ($view_all_subjects as $view) { ?>
                        <?php 
                            if ($view['final'] == 0 ){
                                    $remarks = '';
                            }
                            elseif ($view['final'] < 3.0 ){
                                    $remarks = '<b>Passed </b>';
                            }else{
                                $remarks = '<b style="color:red">Failed </b>'; 
                            } 
                        ?>
                        <tr>
                            <td><?php echo $view['sub_name'] ?></td>
                            <td><?php echo $view['course_description'] ?></td>
                            <td><?php echo $view['fname']." ".$view['middle']." ".$view['lname'] ?></td>
                            <td><?php echo $view['sy'] ?></td>
                            <td><?php echo $view['semester'] ?></td>
                            <td><?php echo ($view['prelim'] == 0) ? '' : $view['prelim']; ?></td>
                            <td><?php echo ($view['midterm'] == 0) ? '' : $view['midterm']; ?></td>
                            <td><?php echo ($view['semi_final'] == 0) ? '' : $view['semi_final']; ?></td>
                            <td><?php echo ($view['final'] == 0) ? '' : $view['final']; ?></td>
                            <td><?php echo $remarks ?></td> 
                        <?php } ?>
                        </tr>
                        <?php 
                            foreach($view_sub_taken as $sub_taken){ 
                            if ($sub_taken['final'] == 0 ){
                                    $remarks = '';
                            }
                            elseif ($sub_taken['final'] < 3.0 ){
                                    $remarks = '<b>Passed </b>';
                            }else{
                                $remarks = '<b style="color:red">Failed </b>'; 
                            }   
                            ?>
                            <tr>
                                <td><?php echo $sub_taken['sub_name'] ?></td>
                                <td><?php echo $sub_taken['course_description'] ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo ($sub_taken['prelim'] == 0) ? '' : $sub_taken['prelim']; ?></td>
                                <td><?php echo ($sub_taken['midterm'] == 0) ? '' : $sub_taken['midterm']; ?></td>
                                <td><?php echo ($sub_taken['semi_final'] == 0) ? '' : $sub_taken['semi_final']; ?></td>
                                <td><?php echo ($sub_taken['final'] == 0) ? '' : $sub_taken['final']; ?></td>
                                <td><?php echo $sub_taken['units'] ?></td> 
                                <td><?php echo $remarks ?></td> 
                            </tr>
                        <?php } ?>
                        <?php 
                            $no_of_subjects = 0;
                            $no_of_subjects1 = 0;
                            $no_of_subjects2 = 0;
                            $final = 0;
                            $final1 = 0;
                            $final2 = 0;
                            $avrg_grade = 0;
                            $total_units = 0;
                            $units = 0;

                            foreach($sub_taken_ave as $sub_taken){  
                                $final1 += $sub_taken['final'];
                                $units += $sub_taken['units'];
                                if ($final1 != 0) {
                                    $no_of_subjects1 ++;
                                }
                            }
                            foreach($ave_grade as $view){  
                                $final2 += $view['final'];
                                if ($final2 != 0) {
                                    $no_of_subjects2 ++;
                                }
                            }
                            $final = $final1 + $final2;
                            $no_of_subjects = $no_of_subjects1 + $no_of_subjects2;
                            if ($final != 0) {
                                $avrg_grade = $final / $no_of_subjects; 
                            }
                            foreach($view_students_units as $view1){  
                                $total_units = $view1['total_units'] + $units;
                            }        
                        ?>
 					</tbody>
 				</table>
 			</div>
            <center><h4>Total Units Taken: <?php echo $total_units ?> units</h4>
                    <h4>Average Grade: <?php echo substr($avrg_grade, 0, 4); ?></h4>
            </center>
            <br/>
            <p class="bottomleft">Recommending Approval</p><br><br><br>
            <div class="bottom-right"><h4>Miss Lyralyn M. Veloso</h4>Assistant Dean</div>
                <p class="bottom-left">Approved</p><br/>
            <div class="bottomright"><h4>Dr. Montana M. Phua</h4>College Dean</div>
 		</div>		
 	</div>

 </body>
  
 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>


 </html>