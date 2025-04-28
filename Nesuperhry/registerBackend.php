<?php

include 'conn.php'; // Ensure conn.php sets up $conn correctly

// Function to upload image
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

if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Pword = $_POST['Pword'];
    $password = password_hash($Pword, PASSWORD_DEFAULT); // Hash the password
    $picture_path = uploadFile($_FILES["picture"]);
 
    if ($picture_path) {
        $sql = "INSERT INTO petrabraham.User (Username, Pword, PFPpath) VALUES ('$Username', '$password', '$picture_path')";
        if ($conn->query($sql) === TRUE) {
            echo "User has been successfully registered.";
		header("Location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "There was an issue with the picture upload.";
    }
}
?>
