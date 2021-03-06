<?php 
    include "../function/connect.php";
    $num = $_GET['id'];
    $select = "SELECT title,content,`image` FROM users WHERE  id = $num";
    $data = mysqli_query($connect,$select);
    $item = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../task2/bootstrab.css">
    <title>Document</title>
</head>
<body class="container">
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $title = $_POST["title"];
            $content = trim($_POST["content"]);
            $fileimg = $_FILES["file"]["name"];
            $tmpname = $_FILES["file"]["tmp_name"];
            $errors =[];


            if(empty($title)){
                $errors["title"] = "required";
            }elseif(filter_var($title,FILTER_VALIDATE_INT)){
                $errors["title"] = "must be string";
            }

            if(empty($content)){
                $errors["content"] = "required";
            }elseif(strlen($content) < 50){
                $errors["content"] = "must be > 100";
            }

            if(!empty($fileimg)){
                unlink("../".$item['image']);
                $arr = explode(".",$fileimg);
                $extension = strtolower(end($arr));
                $allowedextnsion = ["jpg","png","svg","gif","jpeg","ico"];

                if(!in_array($extension,$allowedextnsion)){
                    $errors["img"] = "must be jpg or png or svg or gif or jpeg or ico";
                }else{
                    $uploadfile = "../uploads/".time().rand().'.'.$extension;
                }
                if(move_uploaded_file($tmpname,"../".$uploadfile)){
                    $update = "UPDATE users SET `image` = '$uploadfile' WHERE id = $num";
                    mysqli_query($connect,$update);
                }else{
                    echo "nooooo";
                }
            }

            if(empty($errors)){
                if(!$connect){
                    echo mysqli_connect_error();
                }else{
                    $update = "UPDATE users SET title = '$title' , 
                    content = '$content' WHERE id = $num";
                    if(mysqli_query($connect,$update)){
                        echo '<div class="alert alert-success">Data Is Update</div>';
                        header("location:../showallusers.php");
                    }else{
                        echo mysqli_error($connect);
                        echo '<div class="alert alert-danger">Error</div>';
                    }
                }
            }else{
                foreach($errors as $key => $value){
                    echo '<div class="alert alert-danger">'.$key ." ".$value.'</div>';
                }
            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=".$num; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input value="<?php echo $item["title"]; ?>"  type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <textarea name="content" id="" cols="80" rows="10">
                    <?php echo $item["content"]; ?>
                </textarea>
            </div>
            <div class="form-group">
                <input type="file" name="file">
                <img src="<?php echo "../".$item['image']; ?>"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
</body>
</html>