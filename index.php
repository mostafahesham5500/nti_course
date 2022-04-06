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
            $email = $_POST["email"];
            if(empty($email)){
                $errors["email"] = "required";
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    echo '<div class="alert alert-danger">invalid email</div>';
                }else{
                    echo '<div class="alert alert-danger">'.filter_var($email,FILTER_SANITIZE_EMAIL).'</div>';
                }
            }else{
                echo '<div class="alert alert-success">valid email</div>';
            }

        }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>