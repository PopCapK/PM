<?php

include 'conn.php';

// Get form data - Přenášíme data mezi index.php a add_film.php


function uploadFile($file)
{
    $uploadOk = 0;
//----------------------------------------------------------------------------------------------------------------------
    $target_dir = "uploads/"; // adresář pro uložení obrázku jako takového

//Z obrázku který uploadujeme extrahujeme jméno které potřebujeme uložit do databáze
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1; //Kontrolní proměnná

//název změníme na lowercase a zjistíme koncovku souboru. Později tak ověříme že se jedná o obrázek
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//----------------------------------------------------------------------------------------------------------------------
// Kontrola zda se jedná o skutečný obrázek
//Pokud se jedná o obrázek získáme o obrázku informace včetně MIME (určuje náš uploadOK)
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Soubor není obrázek ";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
// Kontrola velikosti souboru, konkrétně 5MB
    if ($file["size"] > 5000000) {
        echo "Váš obrázek je příliš velký";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
// Kontrola formátu obrázku
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Omlouváme se, ale pouze JPG, JPEG, PNG & GIF jsou povoleny.";
        $uploadOk = 0;
    }

//----------------------------------------------------------------------------------------------------------------------
// Kontrola všech errorů
    if ($uploadOk == 0) {
        echo "Omlouváme se ale váš obrázek nebyl odeslán z důvodu formátu.";
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
}

$film_picture_path = uploadFile($_FILES["film_picture"]);
$LENGTH = $_POST['LENGTH'];
$TITLE = $_POST['TITLE'];
$AUTHOR_idAUTHOR = $_POST['AUTHOR_idAUTHOR'];
$FILM_PICTURE_NAME = $_POST['name'];


$sql = "INSERT INTO PICTURE (NAME, PATH) VALUES ('$FILM_PICTURE_NAME', '$film_picture_path')";
if ($conn->query($sql) === TRUE) {
    echo "New picture added successfully";
    $film_picture_id = $conn->insert_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "INSERT INTO FILM (TITLE, LENGTH, AUTHOR_idAUTHOR, PICTURE_idPICTURE) VALUES ('$TITLE', '$LENGTH', '$AUTHOR_idAUTHOR', '$film_picture_id')";

if ($conn->query($sql) === TRUE) {
    echo "New film added successfully";
    echo '<br> <a href="index.php">Main page</a> <br>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>