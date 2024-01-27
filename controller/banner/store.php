<?php

   session_start();
   include "../../database/env.php";


   $title = $_REQUEST['title'];
   $details = $_REQUEST['details'];
   $btn_title = $_REQUEST['btn_title'];
   $btn_link = $_REQUEST['btn_link'];
   $video_url = $_REQUEST['video_url'];
   $featured_img = $_FILES['featured_img'];

   

        if(isset($_REQUEST['banner-btn'])){
            $tmpName = $featured_img['tmp_name'];
            $imgName = uniqid() . '.' . $featured_img['name'];
            $uploadData = move_uploaded_file($tmpName, 'uploads/' .$imgName);

                
              
               if($uploadData){
                   $storeQuery = "INSERT INTO banners(heading, details, button_title, button_url, video_url, featured_img) VALUES ('$title', '$details', '$btn_title', '$btn_link', '$video_url', '$imgName')";
                   mysqli_query($conn, $storeQuery);
                   $_SESSION['success'] = 'banner inserted successfully!';
                   header("Location:./list.php");
               }
        }




