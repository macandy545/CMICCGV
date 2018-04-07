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
    <!-- <img src="<?php echo base_url(); ?>webroot/images/cmic.png" width="100" height="100"> -->
    <div class="col-md-12">
        <div class="col-md-12">
        <center>
        <h3><CENTER>CEBU MARY IMMACULATE COLLEGE</CENTER></h3>
        <h5>A. Borbajo St. Talamban, Cebu City</h5>

        <h3><?php echo $this->session->userdata('student_name'); ?> <?php echo $this->session->userdata('year'); ?>, <?php echo $this->session->userdata('course'); ?></h3>
        <h4><?php echo $this->session->userdata('curr_sem'); ?>, <?php echo $this->session->userdata('curr_sy'); ?></h4>
 			<div class="table table-bordered">
 				<table class="table table-hover ctable">
 					<tbody>
 						<tr>
                            <th>Subject Title </th>
                            <th>Description</th>
                            <th>Teacher</th>
                            <th>S.Y</th>
                            <th>Semester</th>
                            <th>Prelim Grades</th> 
                            <th>Remarks</th>  
                        </tr>
                        <?php 
                            $sem1 = array(
                                0, 6, 7, 8, 9, 10
                            );
                            $sem2 = array(
                                0, 11, 12, 1, 2, 3
                            );
                            $getsem1 = array_search(date('n'), $sem1);
                            $getsem2 = array_search(date('n'), $sem2);
                            $total_units = 0;
                            $units1 = 0;
                            $units2 = 0;
                            $units3 = 0;
                            foreach($current_prelim_grade as $view){
                                 // $total_units += $view['units'];
                            ?> 
                        <?php       
                            if($getsem1){
                                if($view['semester'] == '1st Semester'){
                        ?>
                        <?php 
                            if ($view['prelim'] == 0 ){
                                    $units1 += $view['units'];
                                    $remarks = '';
                            }
                            elseif ($view['prelim'] < 3.0 ){
                                    $units2 += $view['units'];
                                    $remarks = '<b>Passed </b>';
                            }else{
                                $units3 += $view['units'];
                                $remarks = '<b style="color:red">Failed </b>'; 
                            } 
                            $total_units = $units1 + $units2 + $units3;
                        ?> 
                                    <tr>
                                        <td><?php echo $view['sub_name']; ?></td>
                                        <td><?php echo $view['course_description']; ?></td>
                                        <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                                        <td><?php echo $view['sy']; ?></td>
                                        <td><?php echo $view['semester']; ?></td>
                                        <td><?php echo ($view['prelim'] == 0) ? '' : $view['prelim']; ?></td>
                                        <td><?php echo $remarks ?></td>
                                    </tr>
                        <?php
                                    }   
                                }
                            if($getsem2){
                                if($view['semester'] == '2nd Semester'){
                        ?>
                        <?php 
                            if ($view['prelim'] == 0 ){
                                    $units1 += $view['units'];
                                    $remarks = '';
                            }
                            elseif ($view['prelim'] < 3.0 ){
                                    $units2 += $view['units'];
                                    $remarks = '<b>Passed </b>';
                            }else{
                                $units3 += $view['units'];
                                $remarks = '<b style="color:red">Failed </b>'; 
                            } 
                            $total_units = $units1 + $units2 + $units3;
                        ?>         
                                <tr>
                                    <td><?php echo $view['sub_name']; ?></td>
                                    <td><?php echo $view['course_description']; ?></td>
                                    <td><?php echo $view['fname'].' '.$view['middle'].' '.$view['lname']; ?></td>
                                    <td><?php echo $view['sy']; ?></td>
                                    <td><?php echo $view['semester']; ?></td>
                                    <td><?php echo ($view['prelim'] == 0) ? '' : $view['prelim']; ?></td>
                                    <td><?php echo $remarks ?></td>
                                </tr>
                        <?php
                                            }  
                                        }
                                     } 
                            ?>
 					</tbody>
 				</table>
 			</div>
            <b>Total Units Taken: <?php echo $total_units ?> units</b><br>
            <p class="bottomleft">Recommending Approval</p><br><br><br>
            <div class="bottom-right"><h4>Miss Lyralyn M. Veloso</h4>Assistant Dean</div>
                <p class="bottom-left">Approved</p><br/>
            <div class="bottomright"><h4>Dr. Montana M. Phua</h4>College Dean</div>
 </body>
 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>

 </html>