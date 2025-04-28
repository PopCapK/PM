<?php
include 'conn.php';
session_start();

function uploadFile($file) {
    $target_dir = "uploads/pfp/"; // Directory to save the image
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;

    // Convert file name to lowercase and get file extension
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 1MB)
    if ($file["size"] > 1000000) {
        echo "Your image is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    

    // Check for upload errors
    if ($uploadOk == 0) {
        echo "Your image was not uploaded.";
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "An error occurred during the upload.";
            return false;
        }
    }
}

if(isset($_POST['submit'])){

    
    $picture_path = uploadFile($_FILES["picture"]);
    $Pword = $_POST['Pword'];
    $Username = $_SESSION['Username'];
    
        $stmt = $conn->prepare("SELECT Pword FROM petrabraham.User WHERE Username= ?");
        $stmt -> bind_param("s", $Username);
        $stmt -> execute();
        $result = $stmt ->get_result();

        if ($result->num_rows == 1) {
            $result = $result->fetch_assoc();
    
    
    
            //compare Pword with database Pword hash
            if (password_verify($Pword, $result['Pword'])) {
            // UPDATE PFPpath
                $stmt = $conn->prepare("UPDATE petrabraham.User SET PFPpath='$picture_path' WHERE Username = ?");
                $stmt->bind_param("s", $Username);
                $stmt->execute();
                $_SESSION['PFPpath'] = $picture_path;
                echo "sucess";
                header("Location: account.php");
               }
               else{echo"wrong password, try again";}
                    
               }

    }else{echo "Err";}
    ?>
