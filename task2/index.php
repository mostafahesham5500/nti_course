<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrab.css">
    <title>Document</title>
</head>
<body class="container">
    <?php 
    function validate($email)
    {
        $numadd = 0;
                $type = "yes";
                if(str_contains($email,"@.") ||
                    substr_count($email,"@") != 1 ||
                    str_contains($email,"..")  ||
                    $email[0] === '.' ||
                    $email[0] === '@'||
                    $email[strlen($email) - 1] === '.' || 
                    $email[strlen($email) - 1] === '@' ||
                    substr_count($email,".",strrpos($email,"@")) > 2 ||
                    substr_count($email,".",strrpos($email,"@")) < 1  )
                {
                    $type = "no";
                }
                for($i = 0; $i < strlen($email); $i++){
                    if($email[$i] === '@' || $email[$i] === '.' || $email[$i] === '_' ||
                        ord($email[$i]) >= 48 && ord($email[$i]) <= 57 ||
                        ord($email[$i]) >= 65 && ord($email[$i]) <= 90 ||
                        ord($email[$i]) >= 97 && ord($email[$i]) <= 122 
                    ){
                    }else{
                        $type = "no";
                        break;
                    }
                }
                return $type;
    }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $address = $_POST["address"];
            $linkedin = $_POST["linkedin"];
            $errors = [];
            if(empty($name)){
                $errors["name"] = "required";
            }elseif(is_numeric($name)){
                $errors["name"] = "must be string";
            }

            if(empty($email)){
                $errors["email"] = "required";
            }else{
                if(validate($email)=="no"){
                    $errors["email"] = "is invalidate";
                }
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
            }else{
                if(!str_contains($linkedin,"https://www.linkedin.com/") || strpos($linkedin,"https://www.linkedin.com/") != 0){
                    $errors["linkedin url"] = "is invalid";
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
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
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
            <label for="exampleInputEmail1">Linkedin Url</label>
            <input type="text" class="form-control" name="linkedin" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Linkedin">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>