<?php
include 'conn.php';
session_start();
       
if(isset($_POST['submit'])){

    $old = $_POST['old_pass'];
    $new = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
    $username = $_SESSION['username'];
    
        //Zjistíme staré uživatlovo heslo
        $stmt = $conn->prepare("SELECT PASSWORD FROM USER WHERE username= ?");
        $stmt -> bind_param("s", $username);
        $stmt -> execute();
        $result = $stmt ->get_result();


        //Pokud jsme heslo našli/ respektive pokud existuje alespoň jeden záznam
        if ($result->num_rows == 1) {
            $result = $result->fetch_assoc();
    
    
    
            //Porovnání hesla s hashem
            if (password_verify($old, $result['PASSWORD'])) {
            // UPDATE z starého na nového
                $stmt = $conn->prepare("UPDATE USER SET PASSWORD='$new' WHERE USERNAME = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
               }
               }//number rows

    }else{
    echo "Nepřišli data";
    
    
    }//Podmínka
    ?>
