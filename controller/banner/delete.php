<?php

 session_start();
 include "../../database/env.php";

 $dltId = $_REQUEST['id'];
 $dltData = "DELETE FROM banners WHERE id = $dltId";
 mysqli_query($conn, $dltData);
 $_SESSION['delete'] = 'banner deleted successfully!';
 header("Location:./list.php");