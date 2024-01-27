<?php

 session_start();
 include "../../database/env.php";
 $editId = $_REQUEST['editId'];

 

 $editQuery = "SELECT * FROM banners WHERE id = $editId";
 $connectQuery = mysqli_query($conn,$editQuery);
 $updateData = mysqli_fetch_assoc($connectQuery);


?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
    <section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Banner info</div>
                    <div class="card-body">

                        <form enctype="multipart/form-data" action="./bannerUpdate.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="d-block" for="profileInput">
                                        <img style="max-width:100% ;" class="profileImage" src="<?= 'uploads/' . $updateData['featured_img'] ?>" alt="">
                                    </label>
                                    <input  name="featured_img" class="d-none" type="file" id="profileInput">
                                    <span class="text-danger">
                                        <?= $_SESSION['errors']['profileImage'] ?? '' ?>
                                    </span>
                                </div>
                                <div class="col-lg-6">
                                    <input value="<?= $updateData['heading'] ?>" type="text" class="form-control my-3" name="title" placeholder="Enter Banner Title">
                                    <textarea name="details" class="form-control my-3" placeholder="Enter Banner Detail"><?= $updateData['details'] ?></textarea>
                                    <input value="<?= $updateData['button_title'] ?>" type="text" class="form-control my-3" name="btn_title" placeholder="Enter Banner Button Title">
                                    <input value="<?= $updateData['button_url'] ?>" type="text" class="form-control my-3" name="btn_link" placeholder="Enter Banner Button Link">
                                    <input value="<?= $updateData['video_url'] ?>" type="text" class="form-control my-3" name="video_url" placeholder="Enter Banner Video URL">
                                    <input type="hidden" value="<?= $updateData['id'] ?>" name="update_id">
                                    <button name="update_btn" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    let profileInput = document.querySelector("#profileInput")
    let profileImage = document.querySelector('.profileImage')

    function updatePreviewImage(event) {
        let url = URL.createObjectURL(event.target.files[0])
        profileImage.src = url;

    }

    profileInput.addEventListener('change', updatePreviewImage)
</script>
 </body>
 </html>


