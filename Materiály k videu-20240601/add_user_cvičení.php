<?php

include 'conn.php';

// Funkce pro upload obrázku
function uploadFile($file) {
//----------------------------------------------------------------------------------------------------------------------
    
//----
    //----------------------------------------------------------------------------------------------------------------------
}//KONEC CELÉ FUNKCE

//  Registrace uživatele
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $picture_path = uploadFile($_FILES["picture"]);
    $picture_name = $_POST['name'];
    
    
    // Příkaz pro upload obrázku. Musí být první abychom v uživateli vytvořili cizí klíč.
        $sql = "INSERT INTO PICTURE (NAME, PATH) VALUES ('$picture_name', '$picture_path')";
        if ($conn->query($sql) === TRUE) {
            echo "Uživatel byl úspěšně zaregistrován. <br>";
             // Vytvoříme id pro obrázek abychom ho přiřadili k uživateli kterému patří
            $picture_id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Příkaz pro databázi
    $sql = "INSERT INTO USER (name, surname, username, password, picture_idpicture) VALUES ('$name', '$surname', '$username', '$password', '$picture_id')";
    if ($conn->query($sql) === TRUE) {
     echo '<br> <a href="index.php">Main page</a> <br>';    
}

$conn->close();
?>
