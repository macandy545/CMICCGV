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

        <h4>List of All AB Pol-Sci Students</h4>
        <p><?php echo $this->session->userdata('curr_sem'); ?>, <?php echo $this->session->userdata('curr_sy'); ?></p>
       </center>
        <!-- <center><h4>List Of All AB Pol-Sci Student for S.Y. <?php echo $this->session->userdata('curr_sy');?> <?php echo $this->session->userdata('curr_sem');?></h4></center> -->
            <div class="table table-bordered">
                <table class="table table-hover ctable">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Contact Number</th>
                            <th>Address</th>   
                        </tr>
                        <?php foreach ($view_polsci_students as $view) { ?>
                        <tr>
                            <td><?php echo $view['fname']." ".$view['middle']." ".$view['lname'] ?></td>
                            <td><?php echo $view['course'] ?></td>
                            <td><?php echo $view['year'] ?></td>
                            <td><?php echo $view['contact_num'] ?></td>
                            <td><?php echo $view['address'] ?></td>
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