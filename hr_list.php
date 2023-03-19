<?php 
  session_start();
	include("header.php");
	include("sidebar.php");
  include("config.php");



$query = "SELECT * FROM hr_table";
$result = mysqli_query($conn, $query);

?>


<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Human Resource
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Human Resource</a></li>
            <li class="active">HR Listing</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
               
              <div class="box box-primary">
                <!--<div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div>--><!-- /.box-header -->
                <!-- form start -->
               
                  

                   
                
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
		  
		  <div class="row">
            <div class="col-xs-12">
              <div class="box-header">
            <h3 class="box-title">
              <a href="add_hr.php" class="btn btn-primary btn-sm">
                Add New HR 
                <i class="fa fa-plus-square-o"></i>
              </a>
            </h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
              <div class="box">
                <div class="box-header">
					<div class="col-md-12 text-right"> <button class="btn btn-primary" id="btnExport" onclick="exportReportToExcel(this)">Export</button> </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
						  <th>HR Image</th>  
						  <th>HR Name</th>  
						  <th>HR Outlet</th>
						  <th>HR Information</th>
              <th>Gender</th>
              
            
						</tr>
					</thead>
					<tbody class="scroll-pane">
          <?php

          if ($result->num_rows > 0) {

          while ($row = $result->fetch_assoc()) {

          ?>

            <tr>
            <td> <?php echo $row['hr_img'] ?></td>
            <td> <?php echo $row['hr_name'] ?></td>
            <td> <?php echo $row['hr_outlet'] ?></td>
            <td> <?php echo $row['hr_info'] ?></td>
            <td> <?php echo $row['gender'] ?></td>
            <td> <a href="hr_edit.php?id=<?php echo $row['id'] ?>"><button class="btn btn-primary">Edit</button></a></td>
            </tr>
            <?php       }
                }

                ?>
					</tbody>
					</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
		
      </div><!-- /.content-wrapper -->

<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2023 <a href="#">Venture Solutions Ltd.</a>.</strong> All rights reserved.
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Table to Excel -->
	
	
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>

<script type="text/javascript">
	$(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
	  
function filter()
{
	var filter_val = document.getElementById("filter_type").value;
	
	
	if(filter_val=='')
	{
		console.log("Select First");
		console.log(filter_val);
		
		document.getElementById('location_div').style.display = 'none';
		document.getElementById('fare_div_2').style.display = 'none';
		document.getElementById('fare_div_3').style.display = 'none';
		document.getElementById('starting_date_id').style.display = 'none';
		document.getElementById('ending_date_id').style.display = 'none';
	}
	else
	{
		if(filter_val=="1")
		{
			console.log("Location");
			console.log(filter_val);
			
			document.getElementById('location_div').style.display = 'inline';
			document.getElementById('fare_div_2').style.display = 'none';
			document.getElementById('fare_div_3').style.display = 'none';
			document.getElementById('starting_date_id').style.display = 'none';
			document.getElementById('ending_date_id').style.display = 'none';
			
		}
		else if(filter_val=="2")
		{
			console.log("Fare");
			console.log(filter_val);
			
			document.getElementById('location_div').style.display = 'none';
			document.getElementById('fare_div_2').style.display = 'inline';
			document.getElementById('fare_div_3').style.display = 'inline';
			document.getElementById('starting_date_id').style.display = 'none';
			document.getElementById('ending_date_id').style.display = 'none';
			
		}
		else if(filter_val=="3")
		{
			console.log("Expiry Date");
			console.log(filter_val);
			
			document.getElementById('location_div').style.display = 'none';
			document.getElementById('fare_div_2').style.display = 'none';
			document.getElementById('fare_div_3').style.display = 'none';
			document.getElementById('starting_date_id').style.display = 'inline';
			document.getElementById('ending_date_id').style.display = 'inline';
			
		}
		else
		{
			console.log("Out of catagory");
		}
	}
}

</script>
