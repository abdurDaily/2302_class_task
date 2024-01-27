<?php

 session_start();
 include "../../database/env.php";

 $statusId = $_REQUEST['statusid'];
 $statusQuery = "UPDATE banners SET status = 0";
 mysqli_query($conn, $statusQuery);


 
 $statusQuery = "UPDATE banners SET status = 1 WHERE id = $statusId ";
 mysqli_query($conn, $statusQuery);

 header("Location:./list.php");

