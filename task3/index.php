<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../task2/bootstrab.css">
    <title>Document</title>
</head>
<body class="container">
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $address = $_POST["address"];
            $linkedin = $_POST["linkedin"];
            $type = $_POST["type"];
            $namefile = $_FILES["cv"]["name"];
            $tmppath = $_FILES["cv"]["tmp_name"];

            $errors = [];

            if(empty($name)){
                $errors["name"] = "required";
            }elseif(is_numeric($name)){
                $errors["name"] = "must be string";
            }

            if(empty($email)){
                $errors["email"] = "required";
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors["email"] = "is invalid";
            }
            
            if(empty($password)){
                $errors["password"] = "required";
            }elseif(strlen($password) < 6){
                $errors["password"] = "must be greater than 6";
            }

            if(empty($address)){
                $errors["address"] = "required";
            }elseif(strlen($address) < 10){
                $errors["address"] = "must be greater than 10 chars";
            }

            if(empty($linkedin)){
                $errors["linkedin"] = "required";
            }elseif(!filter_var($email,FILTER_VALIDATE_URL)){
                $errors["linkedin url"] = "is invalid";
            }

            if(empty($type)){
                $errors["select"] = "male or famele";
            }

            if(empty($namefile)){
                $errors["file"] = "is required";
            }else{
                $arr = explode(".",$namefile);
                $extension = strtolower(end($arr));
                $allowedextnsion = "ico";

                if($allowedextnsion === $extension){
                    $uploadfile = "../uploads/".time().rand().'.'.$extension;
                    if(!move_uploaded_file($tmppath,$uploadfile)){
                        $errors["cv"] = "error try again";
                    }
                }else{
                    $errors["cv"] = "must be pdf";
                }
            }

            if(empty($errors)){
                echo '<div class="alert alert-success">Valid Data</div>';
            }else{
                foreach($errors as $key => $value){
                    echo '<div class="alert alert-danger">'.$key ." ".$value.'</div>';
                }
            }
        }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
        </div>
        <div class="form-group">
            <select name="type">
                <option value="male">male</option>
                <option value="famele">famele</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Linkedin Url</label>
            <input type="text" class="form-control" name="linkedin" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Linkedin">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Chose Cv</label>
            <input type="file" class="form-control" name="cv" placeholder="Enter CV">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>