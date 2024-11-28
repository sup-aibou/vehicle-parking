<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['submit-vehicle'])) {
		$RFIDNum=$_POST['RFIDNum'];
		$Driver=$_POST['Driver'];
		$Violation=$_POST['Violation'];
        $status = 'PENDING';

			
		$query = mysqli_query($con, "INSERT INTO violation ( RFIDNumber, OwnerName, Violation, Status) VALUES ('$RFIDNum', '$Driver', '$Violation', '$status')");
        if ($query) {
            $msg="Violation Recorded";
			
        } else {
            $msg="Something Went Wrong";
        }
	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AUTOMATED CPS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="add-reservation";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Manage Violations</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading">Add Violation List</div>
					<div class="panel-body">

						<div class="col-md-12">

							<form method="POST">

                           

                                <div class="form-group">
										<label>RFID Number</label>
										<input type="text" class="form-control" placeholder="" id="RFIDNum" name="RFIDNum" required>
									</div>
									

								<div class="form-group">
									<label>Driver's Name</label>
									<input type="text" class="form-control" placeholder="" id="Driver" name="Driver" required>
								</div>
                                

                                <div class="form-group">
										<label>Violation</label>
										<select class="form-control" name="Violation" id="Violation">
										<option value="0">Select Violation</option>  
                                        <option>Wrong Parking</option>  
                                        <option>Hit Another Vehicle</option>  
										</select>
									</div>


									<button type="submit" class="btn btn-success" name="submit-vehicle">Add Reservation</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</div> <!--  col-md-12 ends -->
							</form>
						</div> 
					</div>
		
		
		

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
};
	</script>
		
</body>
</html>

<?php }  ?>