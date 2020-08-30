<?php
$connect = mysqli_connect("localhost", "root", "","gymsystem");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['Trainer_id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($connect,"DELETE FROM trainer WHERE Trainer_id='".$id."'");
mysqli_close($connect);
header("Location: trainer.php");
?> 