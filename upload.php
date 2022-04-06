<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./task2/bootstrab.css">
    <title>Document</title>
</head>
<body class="container">
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_FILES["image"]["name"];
            $tmppath = $_FILES["image"]["tmp_name"];
            $type = $_FILES["image"]["type"];
            $size = $_FILES["image"]["size"];
            
            $dispath = 'uploads/' . $name;

            if(move_uploaded_file($tmppath,$dispath)){
                echo "yes";
            }else{
                echo "no";
            }
        }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>