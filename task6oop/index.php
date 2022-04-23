<?php

########################################################################################################
require './dp.php';

# Fetch Data 
$sql = "select * from category";
$op  = mysqli_query($action->con,$sql);
########################################################################################################

?>

<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <a href="create.php">Add Cat</a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                            <?php
                            # LOOP .... 
                            $i = 0;
                            while ($raw = mysqli_fetch_assoc($op)) {
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $raw['title']; ?></td>
                                    <td><?php echo $raw['content']; ?></td>
                                    <td>
                                        <img width="100px" src="<?php echo "../uploads/".$raw['image']; ?>" alt="">
                                        <a href="changephoto.php?id=<?php echo $raw['id'] ?>" class='btn btn-primary m-r-1em'>Change Photo</a>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?php echo $raw['id']?>">Delete</a>
                                        <a href="update.php?id=<?php echo $raw['id']?>">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../task2/bootstrab.css">
</head>
<body>
    
</body>
</html>