<?php
session_start();
include 'conn.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'];
    $Pword = $_POST['Pword'];
echo $Pword.$Username;
    // check if filled 
    if (!empty($Username) && !empty($Pword)) {

      
        //Zabezpečení proti SQL Injection a SQL Corruption
        $stmt = $conn->prepare("SELECT * FROM petrabraham.User WHERE Username= ?");
        $stmt -> bind_param("s", $Username);
        $stmt -> execute();
        $result = $stmt ->get_result();

        //found user?
        if ($result->num_rows == 1) {
            $result = $result->fetch_assoc();
            


            //compare Pword with database Pword hash
            if (password_verify($Pword, $result['Pword'])) {
                $stmt = $conn->prepare("SELECT PFPpath FROM petrabraham.User WHERE Username = ? AND Pword = ?");
                $stmt->bind_param("ss", $result['Username'], $result['Pword']);
                $stmt->execute();
                $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            $PFPpath = $row['PFPpath'];


            $_SESSION['Username'] = $Username;
            $_SESSION['PFPpath'] = $PFPpath;
//delete if use USername for saves instead            $_SESSION['idUser'] = $idUser;    

                header("Location: index.php");

        }else{
                echo "wrong credentials, incorrect password";
            }
            echo '<br> <a href="index.php">Main page</a> <br>';    
        } else {

            echo "wrong credentials, no username found";
        }
    } else {
        echo "Musíte zadat Username a heslo";
    }
}

?>
