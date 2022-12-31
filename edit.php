<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>edit</title>
</head>




<?php

session_start();
$userid = (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0;

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
    $password = $_POST["password"];

    $sql = "select * from `students` where username= '$username'  ";
    $result = mysqli_query($conn, $sql);

    if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
            // echo 'login successfuly';
            $login = 1;
            session_start();
            $_SESSION['username']=$username;
            header('location:update.php');
            }else{
            $invalid = 1;
            }
    }
}



?>
<body>






<!-- ?ID=? -->

    <div id="bg">
        <center> </center>
        <br>

        <!--  -->
        <b><u>
                <h1>Edit FORM</h1>
            </u> </b>
        <div id="form">
   
            <form method="POST" action='update.php'>
                <table id="table">
                    <tr>
                    <tr>
                        <td>UserName:</td>
                        <td>
                            <input type="text" name="username" size="30" maxlength="30"
                                placeholder="Enter first name" value="<?php echo $username;?>" />
                            
                           
                        </td>
                    </tr>
               
                    <tr>
                      
                  
                    </tr>
                    <tr>
                        <td>EMAIL ID:
                        </td>
                        <td><input id="email"  type="email" name="email" size="30" maxlength="100"  value="<?php echo $email;?>"/>
                            
                        </td>
                    </tr>
              
                    <tr>
                        <td>password:
                        </td>
                        <td><input id="email"  type="password" name="password"  />
                            
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>
                            <input name="update" type="submit" value="Submit">
                            
                        </td>
                    </tr>
                </table>
            </form>

        
        </div>

    </div>












</body>

</html>