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
        <form class="entry-form" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <label class="col-sm-2 mt-2 col-form-label">File to upload:</label>
                <div class="col-sm-4 mt-2">
                    <input type="file" name="file" class="form-control">
                </div>
                <input type="submit" class="col-sm-2 float-end btn btn-sm btn-secondary"/>             
            </div>
        </form>
    </div>
</body>
</html>