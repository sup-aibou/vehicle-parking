<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
    } else {

    if(isset($_POST['submit-in'])){
        $cid=$_GET['updateid'];
        $registrationNumber=$_POST['RegistrationNumber'];
        $vehicleCompanyName=$_POST['VehicleCompanyName'];
        $ownerName=$_POST['OwnerName'];
        $ownerContactNumber=$_POST['OwnerContactNumber'];
    
        $query = mysqli_query($con, "UPDATE client SET RegistrationNumber='$registrationNumber', VehicleCompanyName='$vehicleCompanyName', OwnerName='$ownerName', OwnerContactNumber='$ownerContactNumber' WHERE ID='$cid'");
        if ($query) {
            $msg="All remarks has been updated.";
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
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="saved-user";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Client Account Management</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Manage Client Account</div>
						<div class="panel-body">

                        <?php if($msg)
						echo "<div class='alert bg-info ' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        
                        <div class="col-md-12">


							<form method="POST">


                            <?php
                            $cid=$_GET['updateid'];
                            $ret=mysqli_query($con,"SELECT * from client where ID='$cid'");
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {
							
                            ?> 

							

								<div class="form-group">
									<label>Vehicle Licensed Plate</label>
									<input type="text" class="form-control" value="<?php  echo $row['RegistrationNumber'];?>" id="RegistrationNumber" name="RegistrationNumber" required>
								</div>


								<div class="form-group">
									<label>Manufacturer</label>
									<input type="text" class="form-control" value="<?php  echo $row['VehicleCompanyName'];?>" id="VehicleCompanyName" name="VehicleCompanyName" readonly>
								</div>


                                <div class="form-group">
									<label>Category</label>
									<input type="text" class="form-control" value="<?php  echo $row['VehicleCategory'];?>" id="sdesc" name="sdesc" readonly>

								</div>

                                <div class="form-group">
									<label>RFID Number</label>
									<input type="text" class="form-control" value="<?php  echo $row['RFIDNumber'];?>" id="sdesc" name="sdesc" readonly>
								</div>

                                <div class="form-group">
									<label>Vehicle Owned By</label>
									<input type="text" class="form-control" value="<?php  echo $row['OwnerName'];?>" id="OwnerName" name="OwnerName" readonly>
								</div>


                                <div class="form-group">
									<label>Vehicle Owner Contact</label>
									<input type="text" class="form-control" value="<?php  echo $row['OwnerContactNumber'];?>" id="OwnerContactNumber" name="OwnerContactNumber" required>
								</div>

                             
								<div class="form-group">
									<label>Owner Drivers License #:</label>
									<input type="text" class="form-control" value="<?php  echo $row['DriversLicensed'];?>" id="DriversLicensed" name="DriversLicensed" readonly>
								</div>

								<div class="form-group">
									<label>Second Driver</label>
									<input type="text" class="form-control" value="<?php  echo $row['SecondDriver'];?>" id="SecondDriver" name="SecondDriver" readonly>
								</div>

								<div class="form-group">
									<label>Second Driver's License #:</label>
									<input type="text" class="form-control" value="<?php  echo $row['2ndDriverlicense'];?>" id="2ndDriverlicense" name="2ndDriverlicense" readonly>
								</div>

								
                        <?php } ?>

									<button type="submit" class="btn btn-success" name="submit-in">Make Changes</button>
									<button type="reset" class="btn btn-default">Reset</button>
                                    
								</div> <!--  col-md-12 ends -->


						</div>
					</div>
				</div>
				
				
				
</div><!--/.row-->
		
		
		

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

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
		
</body>
</html>

<?php }  ?>f