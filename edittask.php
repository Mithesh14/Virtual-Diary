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
if(isset($_POST["editbutton"]))
{
if(!empty($_POST["date"]) and !empty($_POST["taskdes"]))
{
    $task = $_POST["date"];
    $desc = $_POST["taskdes"];

    $sql_query = "select count(*) as count from tasks where date='".$task."'";
        $result = mysqli_query($connection,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['count'];
    if($count<1){
        echo "Invalid task";
    }
    else{
    $updatesql = "UPDATE `tasks` SET description='$desc' WHERE date='$task';";
    if(mysqli_query($connection,$updatesql)){
        echo "<script>alert('Task edited');</script>";
        }
        else{
        echo "error ".mysqli_error($connection);
        }
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
    <title>EDIT EVENT</title>
</head>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="css/options.css">
<body style="background:url(image.jpg); background-repeat:no-repeat;background-size:100% 100%">
    <a href="../diary/main.php" class="home" ><i class="fas fa-home"></i></a>
    <div class="loginform">
        <h2>EDIT EVENT</h2>
        <form action="edittask.php" method="POST">
        
            <input name="date" class="element" type="text" placeholder="Date"><br>
            <input name="taskdes" class="description" type="text" placeholder="New Entry..."><br>
            <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
    <?php } ?>
            <button id="button" name="editbutton"  class="button">EDIT</button>
            
        </form>
    </div>
</body>
</html>
