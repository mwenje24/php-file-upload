<?php

date_default_timezone_set('Africa/Nairobi');

require_once "./dbconfig.php";

function randomString($n){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str ='';
    for($i = 0; $i < $n; $i++){
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}


$image_id = '';
$image_name = '';
$image_url = '';


if($_SERVER['REQUEST_METHOD'] ==='POST'){

    $image_id = randomString(5);
    $image_name = $_POST['image_name'];
    $image_url = $_POST['image_url'];

    $statement = $db->prepare("INSERT INTO images(image_id, image_name, image_url) VALUES(:image_id, :image_name, :image_url)");
    $statement->bindValue(':image_id', $image_id);
    $statement->bindValue(':image_name', $image_name);
    $statement->bindValue(':image_url', $image_url);
    $statement->execute();

    if($statement){
     header('Location: index.php');
    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    <title>File Upload</title>
</head>
<body>
    <div class="container mt-5">
        <div class="title mb-4 text-center fs-2">Uploading a file using PHP</div>
        <form class="entry-form mt-2" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <label class="col-sm-2 mt-2 col-form-label">File to upload:</label>
                <div class="col-sm-4 mt-2">
                    <input type="file" name="image_url" class="form-control">
                </div>
                <input type="submit" class="col-sm-2 float-end btn btn-sm btn-secondary"/>             
            </div>
        </form>
    </div>
</body>
</html>