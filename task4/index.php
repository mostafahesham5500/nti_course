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
    <form action="text.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <textarea name="content" id="" cols="80" rows="10">
            </textarea>
        </div>
        <div class="form-group">
            <input type="file" name="file">
        </div>
        <input type="hidden" name="first_post" value="1"/>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>