<?php
    $db = new PDO('mysql:host=localhost;port=3306;dbname=php_file_upload_demo;', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>