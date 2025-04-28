<?php
session_start();

// Kontrola zda košík existuje a má v sobě nějakou položku
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    //Zde by se stal nákup jako takový, placení atd. (toto je pouze příklad)
   
    echo 'Nákup dokončen';
    unset($_SESSION['cart']);
    session_destroy();
    echo '<br> <a href="index.php">Main page</a> <br>';
} else {
    echo 'Váš nákup nebyl dokončen protože váš košík je prázdný';
}
?>