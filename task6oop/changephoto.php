<?php
########################################################################################################
require './dp.php';

// LOGIC .... 
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $op  = $action->changephoto($_FILES,$id);
    echo $op;
}
########################################################################################################
?>

<main>
    <div class="container-fluid">


        </ol>


        <form action="<?php echo   htmlspecialchars($_SERVER['PHP_SELF']."?id=". $id); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Choes Photo</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



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