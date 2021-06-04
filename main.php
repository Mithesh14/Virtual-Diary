<?php
include "config.php";

session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: index.html");
        exit;
  }
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.html');
}
?>

<html>
<head>
    <title>VIRTUAL DIARY</title>
</head>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="css/styles.css">
<body style="background:url(image.jpg); background-repeat:no-repeat;background-size:100% 100%">
<form method='POST' action="">
<a href="../diary/index.html" class="home"><i class="fas fa-power-off"></i></a>
</form>

        <input type="submit" class="logout" value="Home" name="but_logout"></div>
  
    <div class="heading">
    <h1>VIRTUAL DIARY</h1></div>
    <div class="wrapper">
        <a href="../diary/view.php" ><font color="black"><button class="btn">VIEW</font></button></a>
        <a href="../diary/addtask.php"><font color="black"><button class="btn">ADD</font></button></a>
        <a href="../diary/edittask.php"><font color="black"><button class="btn">EDIT</font></button></a>
    </div>
</body>
</html>