<?php
session_start();

// Kontrola zda jsou PATH a TITLE nastaveny (jestli jsou správně poslány z index.php)
if (isset($_GET['PATH']) && isset($_GET['TITLE'])) {
    //Dekódované hodnoty pro PATH a TITLE.
    $decoded_PATH = urldecode($_GET['PATH']);
    $decoded_TITLE = urldecode($_GET['TITLE']);

    //Vytvoření array pro film který chceme do košíku přidat
    $CART_ITEM = array(
        'PATH' => $decoded_PATH,
        'TITLE' => $decoded_TITLE
    );

    //Vytvoření košíku
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    //Přidání $CART_ITEM do CART
    array_push($_SESSION['cart'], $CART_ITEM);
   
    echo 'Nakup se podaril';

    
     //header("Location: viewCart.php");
    // exit();
} else {
    //Error kontrola
    echo 'Obrázek a název filmu jsou potřeba';
}


?>
