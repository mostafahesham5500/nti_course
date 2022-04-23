<?php
    class title{
        public function __construct(){
            $this->server = "localhost";
            $this->dbName = "nti";
            $this->dbUser = "root";
            $this->dbPassword = "";
            $this->con =   mysqli_connect($this->server,$this->dbUser,$this->dbPassword,$this->dbName);
        }
        public function insert($data)
        {
            $title = Clean($_POST['title']);
            $content = Clean($_POST['content']);

            # Error [] 
            $errors = [];

            # Validate title ....  
            if (!validate($title, 'required')) {
                $errors['title'] = "Field Required";
            }

            if (!validate($content, 'required')) {
                $errors['content'] = "Field Required";
            } elseif (!validate($content, 'char',"50")) {
                $errors['content'] = "Field must be int";
            }

            $name_photo = $_FILES['photo']['name'];
            if (!validate($name_photo, 'required')) {
                $errors['photo'] = "Field Required";
            }
            $tmp_name = $_FILES['photo']['tmp_name'];
            $arr = explode(".",$name_photo);
            $extension = strtolower(end($arr));
            $allowedextnsion = ["jpg","png","svg","gif","jpeg","ico"];

            if(in_array($extension,$allowedextnsion)){
                $uploadfile = time().rand().'.'.$extension;
                if(!move_uploaded_file($tmp_name,"../uploads/".$uploadfile)){
                    $errors["img"] = "error try again";
                }
            }

            if (count($errors) > 0) {
                foreach($errors as $key => $value){
                    return "<h2>" . $key .":" . $value ."</h2>";
                }
            } else {
                $sql = "insert into category (title,content,image) values ('$title','$content','$uploadfile')";
                mysqli_query($this->con,$sql);
                return "Insert";
            }
        }
        public function update($data)
        {
            $title = Clean($_POST['title']);
            $content = Clean($_POST['content']);

            # Error [] 
            $errors = [];

            # Validate title ....  
            if (!validate($title, 'required')) {
                $errors['title'] = "Field Required";
            }

            if (!validate($content, 'required')) {
                $errors['content'] = "Field Required";
            } elseif (!validate($content, 'char',"50")) {
                $errors['content'] = "Field must be int";
            }

            if (count($errors) > 0) {
                foreach($errors as $key => $value){
                    return "<h2>" . $key .":" . $value ."</h2>";
                }
            } else {
                $sql = "update category set title = '$title' ,content = '$content'";
                mysqli_query($this->con,$sql);
                return "Update";
            }
        }
        public function delete($id){
            $sql = "delete from category where id = $id";
            $op = mysqli_query($this->con,$sql);
            if($op){
                header("location: index.php");
            }else{
                echo "Error";
            }
        }
        public function changephoto($data,$id){
            $sql = "select image from category where id = $id";
            $op  = mysqli_query($this->con,$sql);
            $Raw = mysqli_fetch_assoc($op);
            $errors = [];
            $name_photo = $data['photo']['name'];
            if (validate($name_photo, 'required')){
                unlink("../uploads/".$Raw["photo"]);
                $tmp_name = $data['photo']['tmp_name'];
                $arr = explode(".",$name_photo);
                $extension = strtolower(end($arr));
                $allowedextnsion = ["jpg","png","svg","gif","jpeg","ico"];
                
                if(in_array($extension,$allowedextnsion)){
                    $uploadfile = time().rand().'.'.$extension;
                    if(!move_uploaded_file($tmp_name,"../uploads/".$uploadfile)){
                        $errors["img"] = "error try again";
                    }
                    $sql1 = "UPDATE category  set `image` = '$uploadfile' where id = $id";
                    $op1  = mysqli_query($this->con,$sql1);
                    if ($op1) {
                        $message = ["success" => "Image Updated"];
                    } else {
                        $message = ["Error" => "Try Again"];
                    }
                }else{
                    $errors["img"] = "extension is invalid";
                }
                
                }
                # Check Errors .... 
                if (count($errors) > 0) {
                    $_SESSION['Message'] = $errors;
                } else {
                    # DB CODE .....
                    
                    $_SESSION['Message'] = $message;
                    header("location: ./index.php");
                }
        }
    }

    $action = new title();



    
    function Clean($input)
    {

        return stripslashes(strip_tags(trim($input)));
    }

    function validate($input, $flag,$length = 6)
{

    $status = true;

    switch ($flag) {
        case 'required':
            # code...
            if (empty($input)) {
                $status = false;
            }
            break;

        case 'email':
            # code ... 
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $status = false;
            }
            break;

        case 'int':
            # code ... 
            if (!filter_var($input, FILTER_VALIDATE_FLOAT)) {
                $status = false;
            }
            break;

        case 'min':
            # code ... 
            if (strlen($input) < $length) {
                $status = false;
            }
            break; 

        case 'phone':
            # code ... 
            if (!preg_match('/^01[0-2,5][0-9]{8}$/', $input)) {
                $status = false;
            }
            break;
        case 'string':
            # code ... 
            if (!filter_var($input, FILTER_SANITIZE_STRING)) {
                $status = false;
            }
            break;

    }

    return $status;
}



?>