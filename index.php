<?php

date_default_timezone_set('Africa/Nairobi');

require_once "./dbconfig.php";
require_once "./idgenerator.php";

$document_id = '';
$document_name = '';
$document_url = '';
$image_id = '';
$image_name = '';
$image_url = '';

if(isset($_POST['image'])){
    if($_SERVER['REQUEST_METHOD'] ==='POST'){

        $imagefileTemp = $_FILES["document_url"]["temp_name"];
        $imagefilePath = "assets/images/".$_FILES["image_url"]["name"]."%".date("FjY_g:ia");

        $image_id = randomString(5);
        $image_name = $_POST['image_name'];
        $image_url = $imagefilePath;

        // echo '<pre>';
        //     var_dump($_POST);
        // echo '</pre>';
        // exit();

        if(move_uploaded_file($imagefileTemp, $imagefilePath)){
            $statement = $db->prepare("INSERT INTO images(image_id, image_name, image_url) VALUES(:image_id, :image_name, :image_url)");
            $statement->bindValue(':image_id', $image_id);
            $statement->bindValue(':image_name', $image_name);
            $statement->bindValue(':image_url', $image_url);
            $statement->execute();


            if($statement){
            header('Location: index.php');
            }
        }    
        else{
            echo '<h6 class="justify-content-center text-danger">Image could not be uploaded</h6>';
        }


    }
}

if(isset($_POST['document'])){
    if($_SERVER['REQUEST_METHOD'] ==='POST'){

        $docfileTemp = $_FILES["document_url"]["temp_name"];
        $docfilePath = "assets/documents/".$_FILES["document_url"]["name"]."%".date("FjY_g:ia");

        $document_id = randomString(5);
        $document_name = $_POST['document_name'];
        $document_url = $docfilePath;

        if(move_uploaded_file($docfileTemp, $docfilePath)){
            $statement = $db->prepare("INSERT INTO documents(document_id, document_name, document_url) VALUES(:document_id, :document_name, :document_url)");
            $statement->bindValue(':document_id', $document_id);
            $statement->bindValue(':document_name', $document_name);
            $statement->bindValue(':document_url', $document_url);
            $statement->execute();

            if($statement){
                header('Location: index.php');
            }
        }
        else{
            echo '<h6 class="justify-content-center text-danger">Document could not be uploaded</h6>';
        }
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
            <div class="row">
                <div class="col-6">
                    <form class="entry-form mt-2" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <label class="col-sm-4 mt-2 col-form-label">Image Name:</label>
                            <div class="col-sm-8 mt-2">
                                <input type="text" name="image_name" class="form-control" />
                            </div>
                            <label class="col-sm-4 mt-2 col-form-label">Image:</label>
                            <div class="col-sm-8 mt-2">
                                <input type="file" name="image_url" class="form-control" />
                            </div>
                            <div class="col-12 mt-2">
                                <input type="submit" class="btn btn-sm btn-secondary float-end" value="upload" name="image"/>
                            </div>              
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <form class="entry-form mt-2" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <label class="col-sm-4 mt-2 col-form-label">Document Name:</label>
                            <div class="col-sm-8 mt-2">
                                <input type="text" name="document_name" class="form-control" />
                            </div>
                            <label class="col-sm-4 mt-2 col-form-label">Document:</label>
                            <div class="col-sm-8 mt-2">
                                <input type="file" name="document_url" class="form-control" />
                            </div>
                            <div class="col-12 mt-2">
                                <input type="submit" class="btn btn-sm btn-secondary float-end" value="upload" name="document"/>
                            </div>                                    
                        </div>
                    </form>
                </div>
            </div>            
    </div>
</body>
</html>