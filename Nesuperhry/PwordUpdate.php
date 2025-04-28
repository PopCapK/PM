<?php
include 'conn.php';
session_start();
       
if(isset($_POST['submit'])){

    $old = $_POST['Pword'];
    $picture = $_POST['picture'];
    $Username = $_SESSION['Username'];
    
        //check user Pword
        $stmt = $conn->prepare("SELECT Pword FROM petrabraham.User WHERE Username= ?");
        $stmt -> bind_param("s", $Username);
        $stmt -> execute();
        $result = $stmt ->get_result();

        if ($result->num_rows == 1) {
            $result = $result->fetch_assoc();
    
            //compare Pword with database Pword haSh
            if (password_verify($old, $result['Pword'])) {
            // Pword update
                $stmt = $conn->prepare("UPDATE petrabraham.User SET PFPpath='$new' WHERE Username = ?");
                $stmt->bind_param("s", $Username);
                $stmt->execute();
                header("Location: login.php");
               }
                    echo"wrong password, try again";
               }

    }else{echo "Err";}
    ?>
