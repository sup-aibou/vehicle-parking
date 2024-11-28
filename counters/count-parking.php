<?php

    include './includes/dbconn.php';

    $query=mysqli_query($con,"SELECT ID from  parkingslot where Status='1'");
    $count_parkings=mysqli_num_rows($query);

    echo $count_parkings
 ?>