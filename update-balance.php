<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
    } else {

    if(isset($_POST['submit-in'])){

        $cid=$_GET['updateid'];
        $currentBalance = $_POST['actualBalance'];

    // Get the additional balance from the form
    $additionalBalance = $_POST['additionalBalance'];

    // Calculate the new balance
    $newBalance = $currentBalance + $additionalBalance;
		
    
		$query = mysqli_query($con, "UPDATE client SET Balance='$newBalance' WHERE ID='$cid'");

        if ($query) {
			$query=mysqli_query($con, "INSERT into gcash (Balance,ReferenceNumber,PaymentMode) value('$additionalBalance', '----', 'CASH')");
            $msg="Balance has been updated.";
        } else {
            $msg="Something Went Wrong";
        }

    } 
	if(isset($_POST['submit-Gcash'])){

        $cid=$_GET['updateid'];
        $currentBalance = $_POST['actualBalance'];

    // Get the additional balance from the form
    $additionalBalance = $_POST['additionalBalance'];
	$ReferenceNumber = $_POST['ReferenceNumber'];
    // Calculate the new balance
    $newBalance = $currentBalance + $additionalBalance;
		
    
		$query = mysqli_query($con, "UPDATE client SET Balance='$newBalance' WHERE ID='$cid'");

        if ($query) {
			$query=mysqli_query($con, "INSERT into gcash (Balance,ReferenceNumber,PaymentMode) value('$additionalBalance', '$ReferenceNumber', 'GCASH')");
            $msg="Balance has been updated.";
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
		$page="user-balance";
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
									<label>Client Name</label>
									<input type="text" class="form-control" value="<?php  echo $row['OwnerName'];?>" id="catename" name="catename" readonly>
								</div>

                                <div class="form-group">
                                    <label>Actual Balance</label>
                                    <input type="text" class="form-control" value="<?php echo $row['Balance']; ?>" id="actualBalance" name="actualBalance" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Add Balance</label>
                                    <input type="text" class="form-control" id="additionalBalance" name="additionalBalance" required>
                                </div>

								<div class="form-group">
								<label></label>
								</div>
								<div class="form-group">

								<label></label>
								<label>For Gcash Payment, Scan This</label>
								</div>

								<div class="form-group">
								<label>                                        </label>
								<img src="includes\img\gcash.jpg" alt="Image Description">
                                </div>

								<div class="form-group">
                                    <label>Reference Number (if not GCASH Leave Empty)</label>
                                    <input type="text" class="form-control" id="ReferenceNumber" name="ReferenceNumber" >
                                </div>
								
                        <?php } ?>

                                  
									<button type="submit" class="btn btn-success" name="submit-in">Pay Cash</button>
									<button type="submit" class="btn btn-danger" name="submit-Gcash">Pay GCash</button>
                                    
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