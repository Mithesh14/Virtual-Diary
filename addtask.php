<?php

$host = "localhost";
$database = "diary";
$user = "root";
$password = "";

$errors ="";
$connection = mysqli_connect($host,$user,$password,$database);

session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: index.html");
        exit;
  }
if(isset($_POST["addbutton"]))
{
if(!empty($_POST["date"]) and !empty($_POST["taskdes"]))
{
    $task = $_POST["date"];
    $desc = $_POST["taskdes"];
    $insertsql = "INSERT INTO `tasks` ( `date`, `description`) VALUES ( '$task', '$desc');";
    if(mysqli_query($connection,$insertsql)){
        echo "<script>alert('Task added');</script>";
        }
        else{
        echo "error ".mysqli_error($connection);
        }
}
else{
    $errors = "Fill in both fields";
}
}
mysqli_close($connection);
?>
<!DOCTYPE>
<html lang="en">
<head>
    <title>Virtual Diary</title>
</head>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="css/options.css">
<body style="background:url(image.jpg); background-repeat:no-repeat;background-size:100% 100%">
    <a href="../diary/main.php" class="home"><i class="fas fa-home"></i></a>
    <div class="loginform">
        <h2 >ADD EVENT</h2>
        <form action="addtask.php" method="POST">
        
            <input name="date" class="element" type="text" placeholder="Date"><br>
            <input name="taskdes" class="description" type="text" placeholder="Entry..."><br>
            <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
    <?php } ?>
            <button id="button" name="addbutton"  class="button">ADD</button>    
        </form>
    </div>
</body>
</html>
