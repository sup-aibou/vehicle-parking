<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
		
 
 <?php
include 'dbconn.php';

$adminid = $_SESSION['vpmsaid'];
$ret = mysqli_query($con, "SELECT * FROM admin WHERE ID='$adminid'");

if ($row = mysqli_fetch_array($ret)) {
    $userType = ($row['UserType'] == 1) ? "Super Admin" : "Attendant";
    ?>
    <div class="profile-usertitle-name">
        <?php echo $userType; ?>
    </div>
    <?php
}
?>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<form role="search" action="search-results.php" name="search" method="POST" enctype="multipart/form-data">

			<!--  -->

			<div class="form-group">
				<input type="text" class="form-control" id="searchdata" name="searchdata" placeholder="Search Vehicle-Reg">
			</div>

		</form>
		<ul class="nav menu">
			<li class="<?php if($page=="dashboard") {echo "active";}?>"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="<?php if($page=="parking-slot") {echo "active";}?>"><a href="parking-slot.php"><em class="fa fa-automobile">&nbsp;</em> Parking Slot</a></li>
			<li class="<?php if($page=="manage-vehicles") {echo "active";}?>"><a href="manage-vehicles.php"><em class="fa fa-car">&nbsp;</em> Vehicle Entry</a></li>
			<li class="<?php if($page=="in-vehicle") {echo "active";}?>"><a href="in-vehicles.php"><em class="fa fa-toggle-on">&nbsp;</em> IN Vehicles</a></li>
            <li class="<?php if($page=="out-vehicle") {echo "active";}?>"><a href="out-vehicles.php"><em class="fa fa-toggle-off">&nbsp;</em> OUT Vehicles</a></li>
			<li class="<?php if($page=="reservation") {echo "active";}?>"><a href="reservation.php"><em class="	fa fa-file-powerpoint-o">&nbsp;</em> Reservation List</a></li>
			<li class="<?php if($page=="violation") {echo "active";}?>"><a href="violation.php"><em class="	fa fa-warning">&nbsp;</em> Violations</a></li>
			<li class="nav-header"></li>
			<li class=><em class="nav-header">&nbsp;</em></a></li>


			<?php if ($row['UserType'] == 1): ?>
				
			<li class=><em class="nav-header" >&nbsp;</em><a >Admin Control</a></li>
			<li class="<?php if($page=="add-reservation") {echo "active";}?>"><a href="add-reservation.php"><em class="fa fa-check-square-o">&nbsp;</em> Parking Reservation</a></li>
			<li class="<?php if($page=="saved-user") {echo "active";}?>"><a href="saved-user.php"><em class="fa fa-user-circle-o">&nbsp;</em> Saved User</a></li>
			<li class="<?php if($page=="user-balance") {echo "active";}?>"><a href="user-balance.php"><em class="fa fa-btc">&nbsp;</em> User Balance</a></li>
			<li class="<?php if($page=="payment-history") {echo "active";}?>"><a href="payment-history.php"><em class="fa fa-btc">&nbsp;</em> Payment History</a></li>
			<li class="<?php if($page=="vehicle-category") {echo "active";}?>"><a href="vehicle-category.php"><em class="fa fa-money">&nbsp;</em> Parking Price</a></li>
			<li class="<?php if($page=="reports") {echo "active";}?>"><a href="reports.php"><em class="fa fa-file">&nbsp;</em> View Reports</a></li>
			<li class="<?php if($page=="income") {echo "active";}?>"><a href="total-income.php"><em class="fa fa-rouble">&nbsp;</em> Total Income</a></li>
			<li class="<?php if($page=="admin-list") {echo "active";}?>"><a href="admin-list.php" ><em class="	fa fa-user">&nbsp;</em> Admin List</a></li>

			<?php endif?>
		</ul>
		
	</div><!--/.sidebar-->