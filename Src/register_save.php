<?php session_start(); 
?>
<?php
    $login=$_POST["login"];
    $password=$_POST["pwd"];
    $name=$_POST["name"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $password=sha1($password);

    $sql="SELECT * FROM user WHERE login='$login'";
    $result=$conn->query($sql);
    if($result->rowCount()==1){
        $_SESSION['add_login'] = "error";
    }
    else{
         $sql = "INSERT INTO user (login, password, name, gender, email, role) 
         VALUES ('$login', '$password', '$name','$gender','$email','m')";
         $conn->exec($sql);
         $_SESSION["add_login"] = "success";

         
    } 
    $conn=null;
    header("Location: register.php");
    die();  
?>