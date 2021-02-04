<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles.css">
    <title>Homestays</title>
    <style>

        body {
          background-color:#cca6a6;
        }

        table{
        border:1px solid black;
        margin:0px auto;
        text-align:center;
        width:1000px;
        }

        </style>
        </head>

        <body>

  <h2 align="center">Homestays List</h2>

    </body>


    <?php
include_once("dbconnect.php");

$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql );
$stmt->execute();
// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$products = $stmt->fetchAll(); 

echo "<table border='1'>
        <tr>
            <th>Homestay Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Package</th>
            <th>Location</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>";

        foreach($conn->query($sql) as $products) {
            echo "<tr>";
            echo "<td>".$products['name']."</td>";
            echo "<td>".$products['prprice']."</td>";
            echo "<td>".$products['prdesc']."</td>";
            echo "<td>".$products['prtype']."</td>";
            echo "<td>".$products['prloc']."</td>";
            echo "<td>".$products['email']."</td>";
            echo "<td>".$products['phone']."</td>";
            echo "</tr>";
        }
       
        echo "</table><br>";
        echo "<p align='center'><a href='homestays.html'>Add New Homestays</a>";
        echo "<p align='center'><a href='index.html'>Log out</a>";


        echo "</table>";


?>