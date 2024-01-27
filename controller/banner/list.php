<?php

   session_start();
   include "../../database/env.php";
   $allTableData = "SELECT * FROM banners ORDER BY ID DESC";
   $query = mysqli_query($conn,$allTableData);
   $queryRslt = mysqli_fetch_all($query,1);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list banner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <section id="banner-list">
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12 mx-auto card shadow">
                    <?php
                       if(isset($_SESSION['success'])){
                        ?>
                           <div class="card alert-success py-3 my-3">
                              <?= $_SESSION['success'] ?>
                           </div>
                        <?php
                       }
                    ?>


                    <?php
                       if(isset($_SESSION['delete'])){
                        ?>
                           <div class="card alert-danger py-3 my-3">
                              <?= $_SESSION['delete'] ?>
                           </div>
                        <?php
                       }
                    ?>


                    <div class="card-header bg-info text-light">List of banner's</div>
                    <div class="card-nody">
                        <table class="table table-responsive table-hover table-striped">
                            <tr>
                                <td>Sn</td>
                                <td>tile</td>
                                <td>details</td>
                                <td>image</td>
                                <td>btn title</td>
                                <td>btn ulr</td>
                                <td>video url</td>
                                <td>status</td>
                                <td>status</td>
                                <td>action</td>
                            </tr>


                            <?php
                               foreach($queryRslt as $key => $query){
                                ?>
                                 <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $query['heading'] ?></td>
                                    <td><?= substr($query['details'], 0, 7) . '...' ?></td>
                                    <td>
                                        <img height="100" src="<?= './uploads/'. $query['featured_img'] ?>" alt="">
                                    </td>
                                    <td><?= $query['button_title'] ?></td>
                                    <td><?= $query['button_url'] ?></td>
                                    <td><?= $query['video_url'] ?></td>
                                    <td><?= $query['video_url'] ?></td>
                                    <td>
                                        <a href="./status.php?statusid=<?= $query['id'] ?>"><i class="<?= $query['status'] == 1 ? 'fa-solid fa-star' : 'fa-regular fa-star' ?>  "></i></a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="./delete.php?id=<?= $query['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>
                                 </tr>
                                 <?php
                               }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
 session_unset();
?>