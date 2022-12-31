<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>SignaIn</title>
</head>
<body>

<?php
session_start();
$login = 0;
$invalid = 0;
$username=$email=$password ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
     $username = $_POST["username"];
     $email = $_POST["email"];
     $password=$_POST["password"];
     $id = $_POST['student_id'];
}
// $_SESSION['student_id'] = $id;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password=$_POST["password"];
    $sql = "select * from `students` where username= '$username' and password ='$password' ";
    $result = mysqli_query($conn, $sql);

    if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
            // echo 'login successfuly';
            $login = 1;
            session_start();
            $_SESSION['username']=$username;
            header('location:courses.php');
            }else{
            $invalid = 1;
            }
    }
}

?>

    <?php 
    if(isset($_POST['PE'])){
        $pre_exper = $_POST['PE'];
        $PE = "";
        foreach ($pre_exper as $s) {
            $PE .= $s."";
        }
        echo $PE;
    }
?>

    <?php
// define variables and set to empty values
$nameErr = $emailErr =$passErr="";
$name = $email = $password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
  } else {
    $username = $_POST["username"];
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
  }
  if (empty($_POST["password"])) {
    $passErr = "password is required";
  } else {
    $email = $_POST["password"];
  }



}
?>



    <div id="bg">
        <center> </center>
        <br>


        <b><u>
                <h1>STUDENT REGISTRATION FORM</h1>
            </u> </b>
        <div id="form">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <table id="table">
                    <tr>
                    <tr>
                        <td>UserName:</td>
                        <td>
                            <input type="text" name="username" size="30" maxlength="30"
                                placeholder="Enter first name" />
                            (max 30 characters A-Z and a-z)
                            <span class="error">* <?php echo $nameErr;?></span>
                        </td>
                    </tr>
               
                    <tr>
                      
                  
                    </tr>
                    <tr>
                        <td>EMAIL ID:
                        </td>
                        <td><input id="email" type="email" name="email" size="30" maxlength="100" />
                            <span class="error">* <?php echo $emailErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>password:
                        </td>
                        <td><input id="password" type="password" name="password"/>
                            <span class="error">* <?php echo $passErr;?></span>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit">Submit</button>
                            <button type="reset">Reset</button>
                        </td>
                    </tr>
                </table>
            </form>

        
        </div>

    </div>



    <?php
echo "<h2>Your Input:</h2>";
echo $username;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";

?>







</body>
<?php

if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong>You are successfuly signed in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>


<?php

if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid</strong>User doenot exist
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

</html>