



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <title>SignUp</title>

</head>

<body>


<?php
$succes = 0;
$user = 0;


$username=$email=$password="";
$gender = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
     $username = $_POST["username"];
     $email = $_POST["email"];
     $gender = $_POST["gender"];
     $city = $_POST["city"];
     $country = $_POST["country"];
     $password=$_POST["password"];
     
//    $website = $_POST["website"];
//    $comment = $_POST["comment"];
     
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $password=$_POST["password"];

    $sql = "select * from `students` where username= '$username' ";
    $result = mysqli_query($conn, $sql);

    if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
                // echo "user already exist";
                $user = 1;
            }else{
                $sql = "insert into `students`(username,email,gender,city,country,password) values('$username', '$email', '$gender','$city','$country','$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $succes = 1;
                header('location:login.php');
                  }else{
                        die(mysqli_error($conn));
                  }
            }
    }










   
    

      
      

}





// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
// 
?>
    <?php 
// if (isset($_POST['PE'])) 
// {
//     print_r($_POST['PE']); 
// }
// ?>
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
$nameErr = $emailErr = $genderErr = $websiteErr=$passErr = "";
$name = $email = $gender = $comment = $website = "";

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
    $passErr = "Email is required";
  } else {
    $password = $_POST["password"];
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
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
                        <td>FIRST NAME:</td>
                        <td>
                            <input type="text" name="username" size="30" maxlength="30"
                                placeholder="Enter first name" />
                            (max 30 characters A-Z and a-z)
                            <span class="error">* <?php echo $nameErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>LAST NAME:
                        </td>
                        <td><input type="text" name="username" size="30" maxlength="30" placeholder="Enter last name" />
                            (max 30 characters A-Z and a-z)
                        </td>
                    </tr>
                    <tr>
                        <td>

                            DATE OF BIRTH:
                        </td>
                        <td>
                            <input type="number" name="day" size="2" maxlength="2" placeholder="Day" min="1" max="31" />
                            <select name="month">
                                <option value="month">Month</option>
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>

                            </select>
                            <input type="text" name="year" size="5" maxlength="4" placeholder="Year" min="1991"
                                max="2005" />

                        </td>
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
                        <td><input id="password" type="password" name="password" size="30" maxlength="100" />
                            <span class="error">* <?php echo $passErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            MOBILE NO:

                        </td>
                        <td><input type="tel" name="number" size="30" maxlength="12" placeholder="Enter Mobile no" />

                            (10 digits number)
                        </td>

                    </tr>
                    <tr>

                        <td>GENDER:</td>
                        <td><input type="radio" name="gender" value="female">
                            <label for="female">Female</label>
                            <input type="radio" name="gender" value="male">
                            <label for="male">Male</label>
                            <span class="error">* <?php echo $genderErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>ADDRESS:</td>
                        <td><textarea rows="4" cols="40" id="comments">
                    </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>CITY:</td>
                        <td>
                            <input type="text" name="city" size="30" maxlength="30"
                                placeholder="Enter your city name" />
                        </td>


                    </tr>
                    <tr>

                        <td>PIN CODE:</td>
                        <td>
                            <input type="text" name="pin" size="30" maxlength="30" placeholder="Enter pin code" />
                            (6 digits number)
                        </td>
                    </tr>
                    <tr>
                        <td>STATE:</td>
                        <td>
                            <input type="text" name="state" size="30" maxlength="30"
                                placeholder="Enter your state name" />
                        </td>


                    </tr>
                    <tr>
                        <td>COUNTRY:</td>
                        <td>
                            <input type="text" name="country" size="30" maxlength="30"
                                placeholder="Enter your city name" />
                        </td>


                    </tr>


                    <tr>
                        <td>HOBBIES</td>
                        <td>

                            <input type="checkbox" name="Singing" value="Singing" /> Singing
                            <input type="checkbox" name="PE[]" value="dancing" /> Dancing
                            <input type="checkbox" name="PE[]" value="Drawing" /> Drawing
                            <input type="checkbox" name="PE[]" value="Sketching" /> Sketching

                        </td>

                    </tr>
                    <tr>
                        <!-- <td>QUALIFICATION</td>
                    <td>
                        <table width="600px" , height="100px" >
                            <tr>
                                <th>S.N0</th>
                                <th>Examination</th>
                                <th>Board</th>
                                <th>Percentage</th>
                                <th>Year of Passing</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                            <th>Class X</th>
                            <td> <input type="text" name="state" size="20"
                                maxlength="20"/></td>
                            <td><input type="text" name="state" size="15"
                                maxlength="10"/></td>
                            <td><input type="text" name="state" size="15"
                                maxlength="10"/></td>
                        </tr>
                            <tr>
                                <td>2.</td>
                                <th>Class XII</th>
                                <td> <input type="text" name="state" size="20"
                                    maxlength="20"/></td>
                                <td><input type="text" name="state" size="15"
                                    maxlength="10"/></td>
                                <td><input type="text" name="state" size="15"
                                    maxlength="10"/></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <th>Graduation</th>
                            <td> <input type="text" name="state" size="20"
                                maxlength="20"/></td>
                            <td><input type="text" name="state" size="15"
                                maxlength="10"/></td>
                            <td><input type="text" name="state" size="15"
                                maxlength="10"/></td>
                        </tr>
                            <tr>
                                <td>4.</td>
                                <th>Masters</th>
                            <td> <input type="text" name="state" size="20"
                                maxlength="20"/></td>
                            <td><input type="text" name="state" size="15"
                                maxlength="10"/></td>
                            <td><input type="text" name="state" size="15"
                                maxlength="10"/></td>
                        </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>(10 char max)</td>
                                <td>(upto to decimal)</td>
                                <td></td>
                            </tr> -->
                        <!-- </table> -->

                        </td>
                    </tr>
                    <!-- <tr>
                    <td >COURSES:</td>
                    <td><input id="BCA" type="radio" name="COURSES"
                        value="BCA"/>
                        <label for="BCA">BCA</label>
                        <input id="B.Com" type="radio" name="COURSES"
                        value="B.Com"/>
                        <label for="B.Com">B.Com</label>
                        <input id="B.Sc" type="radio" name="COURSES"
                        value="B.Sc"/>
                        <label for="B.Sc">B.Sc</label>
                        <input id="B.A" type="radio" name="COURSES"
                        value="B.A"/>
                        <label for="B.A">B.A</label>
                        
                        </td>
                </tr> -->
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
// echo $website;
// echo "<br>";
// echo $comment;
echo "<br>";
echo $gender;
?>
<?php

if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>OH no sorry!</strong>User already exist
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
<?php

if($succes){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong>You are successfuly signed up.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>






</body>

</html>