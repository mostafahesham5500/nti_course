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
        if(isset($_POST["second_post"])){
            $delete = $_POST["delete"];
            
            $errors =[];

            $text = file_get_contents("text.txt");
            $text = explode("\n", $text);
            $file = fopen("text.txt","w");

            if(empty($delete)){
                $errors['delete'] = "chose name";
            }else{
                foreach($text as $line) {
                    if(strpos($line,$delete) === false){
                        fwrite($file, $line . "\n");
                    }
                }
                $fileread = fopen("text.txt","r");
                while(!feof($fileread)){
                    echo fgets($fileread) . "<br>";
                }
            }
        }
        if(isset($_POST["first_post"])){
            $title = $_POST["title"];
            $content = trim($_POST["content"]);
            $fileimg = $_FILES["file"]["name"];
            $tmpname = $_FILES["file"]["tmp_name"];
            $errors =[];

            $file = fopen("text.txt","w");

            if(empty($title)){
                $errors["title"] = "required";
            }elseif(filter_var($title,FILTER_VALIDATE_INT)){
                $errors["title"] = "must be string";
            }else{
                fwrite($file,"title is " . $title ."\n");
            }

            if(empty($content)){
                $errors["content"] = "required";
            }elseif(strlen($content) < 100){
                $errors["content"] = "must be > 100";
            }else{
                fwrite($file,"content is " . $content . "\n");
            }

            if(empty($fileimg)){
                $errors["file"] = "required";
            }else{
                fwrite($file,"img is " . $fileimg . "\n");
                $arr = explode(".",$fileimg);
                $extension = strtolower(end($arr));
                $allowedextnsion = ["jpg","png","svg","gif","jpeg","ico"];

                if(in_array($extension,$allowedextnsion)){
                    $uploadfile = "../uploads/".time().rand().'.'.$extension;
                    if(!move_uploaded_file($tmpname,$uploadfile)){
                        $errors["img"] = "error try again";
                    }
                }else{
                    $errors["img"] = "must be jpg or png or svg or gif or jpeg";
                }
            }

            if(empty($errors)){
                echo '<div class="alert alert-success">Valid Data</div>';
                $fileread = fopen("text.txt","r");
                while(!feof($fileread)){
                    echo fgets($fileread) . "<br>";
                }
            }else{
                foreach($errors as $key => $value){
                    echo '<div class="alert alert-danger">'.$key ." ".$value.'</div>';
                }
            }

        }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <select name="delete" id="">
                <option value="title">title</option>
                <option value="content">content</option>
                <option value="img">img</option>
            </select>
        </div>
        <input type="hidden" name="second_post" value="1" />
        <button type="submit" class="btn btn-primary">delete</button>
    </form>
</body>
</html>