<?php
 session_start();
 include "../../database/env.php";
 $update_id = $_REQUEST['update_id'];


    $heading = $_REQUEST['title'];
    $details = $_REQUEST['details'];
    $btn_title = $_REQUEST['btn_title'];
    $btn_link = $_REQUEST['btn_link'];
    $video_url = $_REQUEST['video_url'];
    $profileImage = $_FILES['featured_img'] ?? null;

    
    if(isset($_REQUEST['update_btn'])){
        if($_FILES['featured_img']['size'] > 0){

            $name = $_FILES['featured_img']['name'];
            $tmp_name = $_FILES['featured_img']['tmp_name'];
            $imageName = uniqid() . '.' . $name;
            move_uploaded_file($tmp_name, 'uploads/' . $imageName);

                        $updateQuery = "UPDATE banners  SET heading='$heading',details='$details',button_title='$btn_title',button_url='$video_url',video_url='$video_url', featured_img='$imageName' WHERE id = $update_id";
                        mysqli_query($conn, $updateQuery);
                        $_SESSION['success'] = 'data updated!';
                        header("Location:./list.php");


            }else{

                $updateQuery = "UPDATE banners SET heading='$heading',details='$details',button_title='$btn_title',button_url='$video_url',video_url='$video_url' WHERE id = $update_id";
                mysqli_query($conn, $updateQuery);
                $_SESSION['success'] = 'data updated!';
                header("Location:./list.php");
        }

    }

