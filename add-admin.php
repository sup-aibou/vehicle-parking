<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
    include('includes/header.php');
	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['add-new-admin'])) {
		//$parkingnumber=mt_rand(10000, 99999);
		$FullName=$_POST['FullName'];
		$Username=$_POST['Username'];
		$Password=md5($_POST['Password']);
		$Email=$_POST['Email'];
		$MobileNumber=$_POST['MobileNumber'];
		$SecurityCode=$_POST['SecurityCode'];
        if (isset($_POST['UserType'])) {
            $selectedUserType = $_POST['UserType'];
        
            // Set $UserType based on the selected option
            if ($selectedUserType == 'Super Admin') {
                $UserType = 1;
            } elseif ($selectedUserType == 'Attendant') {
                $UserType = 0;
            }
        }
		$query=mysqli_query($con, "INSERT into admin(AdminName,Username,Password,Email,MobileNumber,Security_Code,UserType) value('$FullName','$Username','$Password','$Email','$MobileNumber','$SecurityCode' , '$UserType')");
		if ($query) {
            $msg="Added New Admin";
			
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
		$page="admin-list";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Manage Admin</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading">Create New Admin</div>
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

								<div class="form-group">
									<label>Full Name</label>
									<input type="text" class="form-control" placeholder="First Name Last Name" id="FullName" name="FullName" required>
								</div>

                                <div class="form-group">
										<label>User Type</label>
										<select class="form-control" name="UserType" id="UserType">
										<option value="0">Select User Type</option>
                                        <option >Super Admin</option>
                                        <option >Attendant</option>
										</select>
									</div>

								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" placeholder="Enter Username" id="Username" name="Username" required>
								</div>
								
						

								<div class="form-group">
									<label>Password</label>
									<input type="text" class="form-control" placeholder="Enter Password" id="Password" name="Password" required>
								</div>


								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" placeholder="Enter Email"  id="Email" name="Email" required>
								</div>

                                <div class="form-group">
									<label>Mobile Number</label>
									<input type="text" class="form-control" placeholder="Enter Mobile Number" maxlength="13" id="MobileNumber" name="MobileNumber" required>
								</div>

                                <div class="form-group">
									<label>Security Code:  (Save Your Security Code)</label>
									<input type="text" class="form-control" placeholder="Enter Security Code" maxlength="6" id="SecurityCode" name="SecurityCode" required>
								</div>



									<button type="submit" class="btn btn-success" name="add-new-admin">Add New Admin</button>
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