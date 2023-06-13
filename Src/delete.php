<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php
    if(! isset($_SESSION['role'])=="a"){
        header("Location: index.php");
    }
    else{
        $id_post = $_GET["id"];
                echo "<center>ลบกระทู้หมายเลข $id_post</center>" ;
                

                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                $sql_post = "DELETE FROM post WHERE id = $id_post";
                $query = $conn->query($sql_post);

                
                $sql_comment = "DELETE FROM comment WHERE post_id = $id_post";
                $query = $conn->query($sql_comment);
                $conn = null;
                
    }
    ?>
    <a href="index.php">กลับไปหน้าหลัก</a>

</body>
</html>