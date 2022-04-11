<?php
    include './function/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../task2/bootstrab.css">
    <title>Document</title>
    <style>
        img{
            width:100px;
        }
    </style>
</head>
<body class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $allusers = "SELECT id , title , content , `date`,`image` FROM `users`";
                $data = mysqli_query($connect,$allusers);
                if(!$data){
                    echo "no".mysqli_error($connect);
                }
            while($arrusers = mysqli_fetch_assoc($data)){
            ?>
                <tr>
                    <td><img src="<?php echo $arrusers['image']; ?>"/></td>
                    <td><?php echo $arrusers['id']; ?></td>
                    <td><?php echo $arrusers['title']; ?></td>
                    <td><?php echo $arrusers['content']; ?></td>
                    <td><?php echo $arrusers['date']; ?></td>
                    <td>
                        <a href="./dbaction/delete.php?id=<?php echo $arrusers['id']?>"><button class="btn-danger">Delete</button></a>
                        <a href="./dbaction/update.php?id=<?php echo $arrusers['id']?>"><button class="btn-success" >Update</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">
        <button class="btn-success">Add User</button>
    </a>
</body>
</html>