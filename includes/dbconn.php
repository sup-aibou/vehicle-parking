<?php
    $con=mysqli_connect("127.0.0.1", "root", "", "vehicle-parking-db");
    if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
    }
  ?>