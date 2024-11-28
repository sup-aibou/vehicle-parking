<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');	
include('includes/header.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
        } else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>AUTOMATED CPS </title>
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
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Admin List</div>
						<div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                        
        <thead>
            <tr>
                <th>#</th>
                <th>Admin Name</th>
                <th>Username</th>
				<th>User Type</th>
                <th>Email</th>
				<th>Mobile Number</th>
				<th>Action</th>
				

            </tr>
        </thead>
        <tbody>
        <?php
        $ret=mysqli_query($con,"SELECT * FROM admin ORDER BY ID ASC");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

            <td><?php echo $cnt;?></td>
                 
            <td><?php  echo $row['AdminName'];?></td>
            
            <td><?php  echo $row['UserName'];?></td>

			<td>
			<?php
			if ($row['UserType'] == 1) {
				echo "Super Admin";
			} elseif ($row['UserType'] == 0) {
				echo "Attendant";
			} 
			?>
			</td>

            <td><?php  echo $row['Email'];?></td>

            <td><?php  echo $row['MobileNumber'];?></td>

            <td>
				<a href="update-admin.php?updateid=<?php echo $row['ID'];?>"><button type="button" class="btn btn-sm btn-info">EDIT</button></a>
            	<a href="remove-admin.php?editid=<?php echo $row['ID'];?>"> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> </a>
            
            </td>
            

            </tr>

                <?php $cnt=$cnt+1;}?>
 
        
        </tbody>

    </table>
	<a href="add-admin.php"><button type="submit" class="btn btn-success" name="submit">Create New</button></a>
							

	
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
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
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

<?php }  ?>