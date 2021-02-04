<?php
include_once("dbconnect.php");

//if (isset($_COOKIE["timer"])){

//get data first
$name = $_POST['name'];
$prprice = $_POST['prprice'];
$prdesc = $_POST['prdesc'];
$protype = $_POST['prtype'];
$prloc = $_POST['prloc'];
$email = $_POST['email']; 
$phone = $_POST['phone'];


 if(!empty($_FILES['uploaded_file'])){
    $path = "products/";
    //$path = $path . basename( $_FILES['uploaded_file']['name']);
    $path = $path . $name.'.jpg';
     if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)){
        try {
            $sql = "INSERT INTO products(name, prprice, prdesc, prtype, prloc, email, phone)
            VALUES ('$name', '$prprice' , '$prdesc', '$protype', '$prloc', '$email', '$phone')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script> alert(' Success')</script>";
            echo "<script> window.location.replace('mainpage.php') </script>;";
        } catch(PDOException $e) {
            echo "<script> alert('Failed')</script>";
            echo "<script> window.location.replace('homestays.html') </script>;";
        }
        $conn = null;
     
     }else{
          echo "<script> alert('Image upload error')</script>";
          echo "<script> window.location.replace('homestays.html') </script>;";
     }
 }

//}else{
//  echo "<script> alert('Timer expired!!!')</script>";
//  echo "<script> window.location.replace('index.html') </script>;";
//}
?>