<?php
include "connect.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}




if (isset($_SESSION['username'])) {

  global $row;
  $stmt = $conn->prepare("SELECT * FROM `students` WHERE  `student_id`!=1 LIMIT 1");
  $stmt->execute();
  $row = $stmt->fetch();

        


}





echo'<div class="container">';
echo  "<a  class=' btn btn-primary mt-5'  href='edit.php?userid=" .$row['student_id']."'>edit";
echo "</a>";
echo'</div>';

?>





















<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>courses page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center text-warning mt-5">Hello, world!
        <?php
        echo $_SESSION['username']?>
    </h1>
    <div class="container">
        <a href="logout.php" class="btn btn-primary mt-5">logout</a>

    </div>

    
  </body>
</html>
<!-- ?GETID= -->
