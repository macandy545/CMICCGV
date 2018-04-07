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
    <img style="float:right; margin-top:-1.5%;position:absolute;" src="<?php  echo base_url();?>webroot/images/cmic1.png" height="130" width="140"/>
 	<div class="col-md-12">
 		<div class="col-md-12">
        <center>
        <h3><CENTER>CEBU MARY IMMACULATE COLLEGE</CENTER></h3>
        <h5>A. Borbajo St. Talamban, Cebu City</h5>

        <h4>MIDTERM DEAN'S LIST</h4>
        <p><?php echo $sem; ?>, <?php echo $school_year; ?></p>
       </center>
 			<div class="table table-bordered">
 				<table class="table table-hover ctable">
 					<tbody>
 						<tr>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Average Grade</th> 
                        </tr>
                        <tr>
                            <?php foreach($print_search_midterm_dlist as $key){ 
                            $no_of_subject = 0;
                            $midterm_grade = 0;
                            $this->db->join('subjects', 'grades.sub_id = subjects.sub_id');
                            $this->db->where("stud_id", $key['stud_id']);   
                            $this->db->where("midterm !=", 0); 
                            $this->db->where('sy', $school_year);
                            $this->db->where('semester', $sem);
                            $query = $this->db->get("grades");

                            foreach($query->result() as $rows){//add all data to session    
                                $midterm_grade += $rows->midterm;
                                $no_of_subject ++;
                            }   
                            $final_midterm_grade = $midterm_grade / $no_of_subject;
                        ?>
                            <?php if($final_midterm_grade <= 1.74){ ?>
                                <td><?php echo $key['lname'].', '.$key['fname'].' '.$key['middle']; ?></td>
                                <td><?php echo $key['course']; ?></td>
                                <td><?php echo $key['year']; ?></td>
                                <td><?php echo substr($final_midterm_grade, 0, 4); ?></td>
                            <?php } } ?>
                        </tr>
 					</tbody>
 				</table>
 			</div>
            <br/><br>
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