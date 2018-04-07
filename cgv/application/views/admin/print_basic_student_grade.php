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
        <h5><?php echo $year_level;?> </h5>
        <p><b>S.Y. <?php echo $this->session->userdata('curr_sy'); ?></b></p>
       </center> 
 		<!-- <center><h4>Student Grade</h4></center> -->
 			<div class="table table-bordered">
 				<table class="table table-hover ctable">
 					<tbody>
 						<tr>
                            <th>Subject </th>
                            <th>First Grading</th>
                            <th>Second</th>
                            <th>Third</th>
                            <th>Fourth</th>  
                            <th>Remarks</th>  
                        </tr>
                        <?php foreach ($view_all_basic_subjects as $view) { ?>
                        <?php 
                            if ($view['fourth_grading'] == 0 ){
                                    $remarks = '';
                            }
                            elseif ($view['fourth_grading'] > 75 ){
                                    $remarks = '<b>Passed </b>';
                            }else{
                                $remarks = '<b style="color:red">Failed </b>'; 
                            } 
                        ?>
                        <tr>
                            <td><b><?php echo $view['sub_name'] ?></b></td>
                            <td><?php echo ($view['first_grading'] == 0) ? '' : $view['first_grading']; ?></td>
                            <td><?php echo ($view['second_grading'] == 0) ? '' : $view['second_grading']; ?></td>
                            <td><?php echo ($view['third_grading'] == 0) ? '' : $view['third_grading']; ?></td>
                            <td><?php echo ($view['fourth_grading'] == 0) ? '' : $view['fourth_grading']; ?></td>
                            <td><?php echo $remarks ?></td> 
                        <?php } ?>
                        </tr>
 					</tbody>
 				</table>
 			</div>
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