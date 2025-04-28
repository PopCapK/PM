<?php

include 'conn.php';

// Funkce pro upload obrázku
function uploadFile($file) {
//----------------------------------------------------------------------------------------------------------------------
    $target_dir = "uploads/"; // adresář pro uložení obrázku jako takového
    
    //Z orázku který uploadujeme extrahujeme jméno které potřebujeme uložit do databáze
    $target_file = $target_dir . basename($file["name"]); 
    $uploadOk = 1; //Kontrolní proměnná
    
    //název změníme na lowercase a zjistíme koncovku souboru. Později tak ověříme že se jedná o obrázek
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola zda se jedná o skutečný obrázek
    //Pokud se jedná o obrázek získáme o obrázku informace včetně MIME (určuje náš uploadOK)
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Soubor není obrázek ";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola velikosti souboru, konkrétně 500KB
    if ($file["size"] > 500000) {
        echo "Váš obrázek je příliš velký";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola formátu obrázku
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Omlouváme se, ale pouze JPG, JPEG, PNG & GIF jsou povoleny.";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola všech errorů
    if ($uploadOk == 0) {
        echo "Omlouváme se ale váš obrázek nebyl odeslán.";
    } else {
        // Pokud je vše v pořádku..
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            //Kontrola nepředvídatelného erroru
            echo "Omlouváme se ale váš obrázek nebyl odeslán.";
            return false;
        }
    }
//----------------------------------------------------------------------------------------------------------------------    
}//KONEC CELÉ FUNKCE

//  Registrace uživatele
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    //Hashování hesla
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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