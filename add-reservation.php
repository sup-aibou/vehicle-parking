<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['submit-vehicle'])) {
		//$parkingnumber=mt_rand(10000, 99999);
		$date=$_POST['Date'];
		$parkingslot=$_POST['ParkingSlot'];
		$registrationnumber=$_POST['RegistrationNumber'];
        $vehiclecategory=$_POST['VehicleCategory'];
		$ownername=$_POST['OwnerName'];
		$ownercontactnumber=$_POST['OwnerContactNumber'];
        $status = 'RESERVED';

		$VehicleModel=$_POST['VehicleModel'];
		$VehicleColor= $_POST['VehicleColor'];
		$DriversLicensed=$_POST['DriversLicensed'];
			
		$query = mysqli_query($con, "INSERT INTO reservation (ReservationDate, ParkingSlot, RegistrationNumber, VehicleCategory, OwnerName, OwnerContactNumber, Status,VehicleModel,VehicleColor,DriversLicensed) VALUES ('$date', '$parkingslot', '$registrationnumber', '$vehiclecategory', '$ownername', '$ownercontactnumber', '$status', '$VehicleModel', '$VehicleColor', '$DriversLicensed')");
        if ($query) {
            $msg="Vehicle Entry Recorded";
			
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
				<li class="active">Manage Parking Reservation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading">Add Parking Reservation</div>
					<div class="panel-body">

						<div class="col-md-12">

							<form method="POST">

                                <div class="form-group">
									<label>Reservation Date</label>
									<input type="date" class="form-control" id="Date" name="Date" required>
								</div>

                                <div class="form-group">
										<label>Parking Slot</label>
										<select class="form-control" name="ParkingSlot" id="ParkingSlot">
										<option value="0">Select Parking Slot</option>
										<?php $query=mysqli_query($con,"select * from parkingslot");
											while($row=mysqli_fetch_array($query))
											{
											?>    
                                        <option value="<?php echo $row['Slots'];?>"><?php echo $row['Slots'];?></option>
                  						<?php } ?> 
										</select>
									</div>
									

								<div class="form-group">
									<label>Licensed Plate</label>
									<input type="text" class="form-control" placeholder="LOL-1869" id="RegistrationNumber" name="RegistrationNumber" required>
								</div>
                                

                                <div class="form-group">
										<label>Vehicle Category</label>
										<select class="form-control" name="VehicleCategory" id="VehicleCategory">
										<option value="0">Select Category</option>
										<?php $query=mysqli_query($con,"select * from vcategory");
											while($row=mysqli_fetch_array($query))
											{
											?>    
                                        <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  						<?php } ?> 
										</select>
									</div>

									<div class="form-group">
									<label>Vehicle Model</label>
									<input type="text" class="form-control" placeholder="Enter Here.." id="VehicleModel" name="VehicleModel" required>
								</div>

								<div class="form-group">
									<label>Vehicle Color</label>
									<input type="text" class="form-control" placeholder="Enter Here.." id="VehicleColor" name="VehicleColor" required>
								</div>

									

								<div class="form-group">
									<label>Owner's Full Name</label>
									<input type="text" class="form-control" placeholder="Enter Here.." id="OwnerName" name="OwnerName" required>
								</div>

								<div class="form-group">
									<label>Driver's License #</label>
									<input type="text" class="form-control" placeholder="Enter Here.." id="DriversLicensed" name="DriversLicensed" required>
								</div>


								<div class="form-group">
									<label>Owner's Contact</label>
									<input type="text" class="form-control" placeholder="Enter Here.." maxlength="11" pattern="[0-9]+" id="OwnerContactNumber" name="OwnerContactNumber" required>
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