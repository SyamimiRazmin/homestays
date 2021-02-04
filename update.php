<?php
include_once("dbconnect.php");
$name = $_GET['name'];
$prprice = $_GET['prprice'];
$prdesc = $_GET['prdesc'];
$prtype = $_GET['prtype'];
$prloc = $_GET['prloc'];
$email = $_GET['email'];
$phone = $_GET['phone'];


if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE products SET prprice = '$prprice', prdesc = '$prdesc', prtype = '$prtype', 
        prloc = '$prloc', email = '$email', phone = '$phone' WHERE name = '$name'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Homestay</title> 
<style>

        body {
          background-color:#cca6a6;
        }
        
        .header {
          background-color: #8e5e5f;
          padding: 5px;
          text-align: center;
        }
        
        input[type=text], select, textarea {
          background-color:#e6d1e5;
          width: 30%;
          padding: 5px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }
        
        label {
          padding: 5px 5px 5px 0;
          display: inline-block;
        }
        
        input[type=submit] {
          background-color:#9f7c94;
          color: black;
          padding: 5px 5px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: center;
        }
        
        </style>

</head>
<h3 align="center">Update <?php echo $name;?> Information</h3> 

<body>
<form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
    
    <input type="hidden" name="name" id="name" value=<?php echo $name;?> required><br>
    <input type="hidden" id="operation" name="operation" value="update"><br>
    
    <label for="prprice">Price:</label><br>
    <input type="text" name="prprice" id="prprice"value=<?php echo $prprice;?> required><br>

    <label for="prdesc">Description:</label><br>
    <textarea id="prdesc" name="prdesc" rows="4" value=<?php echo $prdesc;?> required></textarea><br>

    <laberfor="prtype">Package:</label><br>
      <select id="prtype" name="prtype" value=<?php echo $prtype;?> required><br>
      <option value="1 Night" title="1 Night">1 Night</option>
      <option value="2 days 1 Night" title="2 days 1 Night">2 days 1 Night</option>
      <option value="3 days 2 Night" title="3 days 2 Night">3 days 2 Night</option>
      <option value="4 days 3 Night" title="4 days 3 Night">4 days 3 Night</option>
      </select><br>
  
      <label for="prloc">Location:</label><br>
      <select id="prloc" name="prloc" value=<?php echo $prloc;?> required><br>
      <option value="Raub" title="Raub">Raub</option>
      <option value="Bentong" title="Bentong">Bentong</option>
      <option value="Kuantan" title="Kuantan">Kuantan</option>
      <option value="Temerloh" title="Temerloh">Temerloh</option>
      <option value="Kuala Lipis" title="Kuala Lipis">Kuala Lipis</option>
      </select><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value=<?php echo $email;?> required><br>

    <label for="phone">phone:</label><br>
    <input type="text" id="phone" name="phone" value=<?php echo $phone;?> required><br>

    <br><input type="submit" value="Update">
</form>
<p align="center"><a href="view.php">Cancel</a></p>
</a></p>
</body>
</html>
