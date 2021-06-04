<?php
$host = "localhost";
$database = "diary";
$user = "root";
$password = "";

$connection = mysqli_connect($host,$user,$password,$database);

session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: index.html");
        exit;
  }
    $selectsql = "SELECT * FROM tasks";
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
      
      if ($result = mysqli_query($connection,$selectsql)) {
        echo '

<a href="../diary/main.php" class="home"><i class="fas fa-home"></i></a>
<h2>DIARY</h2>
<table>
<tr>
    <th class="head"><b>DATE</b></th>
    <th class="head"><b>DESCRIPTION<b></th>
  </tr>';
        while ($row = $result->fetch_assoc()) {
           echo ' 
  <tr>
    <th>'.$row["date"].'</th>
    <th>'.$row["description"].'</th>
  </tr>';
        }
      } else {
        echo "0 results";
      }
      echo '</table>';

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="css/view.css">
<body style="background:url(image.jpg); background-repeat:no-repeat;background-size:100% ">
  
    </body>
    </head>
    </html>