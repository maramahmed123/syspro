<?php
// include "connect.php";
// if(isset( $_POST["update"])){
//     // $userid = $_GET['$ID'] ;
//     $username = $_POST["username"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $query = "UPDATE `students` SET `username`='".$username."',`email`='".$email."' ,`password`='".$password."' WHERE `username` ='".$username."'";
//     $result = mysqli_query($conn, $query);

//     if ($result) {
//         header('location:hello.php');
//     }else {
//         echo 'please check your data';
//     }
// }else{
//     header('location:login.php');
// }




?>



<?php
include "connect.php";
echo "<h1 class='text-center'>Update Member</h1>";
        echo "<div class='container'>";




        if($_SERVER['REQUEST_METHOD']=='POST'){
            // $id = $_POST["student_id"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // echo $id.$email.$user.$name;

            

            $formError = array();

            if (strlen($username) < 4 && strlen($username) > 20) {
                $formError[]= 'username cant be less than 4 characters or  more than 20 characters';
            }
            if (empty($username)) {
                $formError[]= "user is required";
            }
            if (empty($email)) {
                $formError[]= "email is required";
            }
         
            foreach ($formError as $error) {
                echo "<div class='alert alert-danger'>".$error . '</div>';
            }
            if (empty($formError)) {
                $sql = "UPDATE `students` SET `username`='$username',`email`='$email' ,`password`='$password' LIMIT 1";
                $result = $conn->query($sql);
                // $stmt = $conn->prepare("UPDATE `students` SET `username`=':username',`email`=':email' ,`password`=':password' LIMIT 1");
                // // $stmt->execute(array($username,$email,$password));

                // $stmt->execute(array(
                //     ':username'   => $username,
                //     ':password' => $password,
                //     ':email'   => $email,
                //       ));
            
                
                echo "<div class='alert alert-success'>record updated</div>";
                  
                    
                
                
            }
        }else{
        
            echo "<div class='alert alert-danger'>Sorry You Cant Browse this page</div>";
                
                
        
        }
        echo "</div>";


        ?>