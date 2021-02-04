<?php
include_once("dbconnect.php");

//if (isset($_COOKIE["timer"])){

//get data first
$name = $_POST['name'];
$email = $_POST['email']; 
$password = sha1($_POST['password']);

 if(!empty($_FILES['uploaded_file'])){
    $path = "profileimages/";
    //$path = $path . basename( $_FILES['uploaded_file']['name']);
    $path = $path . $name.'.jpg';
     if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)){
        try {
            $sql = "INSERT INTO user(name, email, password)
            VALUES ('$name', '$email', '$password')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script> alert('Registration Success')</script>";
            echo "<script> window.location.replace('index.html') </script>;";
        } catch(PDOException $e) {
            echo "<script> alert('Registration Error')</script>";
            echo "<script> window.location.replace('register.html') </script>;";
        }
        $conn = null;
     
     }else{
          echo "<script> alert('Image upload error')</script>";
          echo "<script> window.location.replace('register.html') </script>;";
     }
 }

//}else{
//  echo "<script> alert('Timer expired!!!')</script>";
//  echo "<script> window.location.replace('index.html') </script>;";
//}
?>