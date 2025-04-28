<?php
include 'conn.php';
session_start();
if(isset($_POST['submit'])){
    if($_POST['CONFIRM']=="CONFIRM"){

        $Pword = $_POST['Pword'];
        $Username = $_SESSION['Username'];
        $Game = $_POST['Game'];
        $jsonPath = "uploads/games/saves/".$Username."-".$Game.".json";

            //check user Pword
            $stmt = $conn->prepare("SELECT Pword FROM petrabraham.User WHERE Username= ?");
            $stmt -> bind_param("s", $Username);
            $stmt -> execute();
            $result = $stmt ->get_result();

            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
            
            
            
                //compare Pword with database Pword haSh
                if (password_verify($Pword, $result['Pword'])) {
                    if (!unlink($jsonPath)) { 
                        echo ($jsonPath." cannot be deleted due to an error"); 
                    } 
                    else { 
                        echo ($jsonPath." has been deleted"); 
                        header("Location: account.php");
                    } 
                   }
                   else{echo"wrong password, try again";}

                }
    }else{echo "not confirmed";}
}else{echo "Err";}
?>
