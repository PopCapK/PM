<?php
session_start();


if (isset($_POST['unset_cart'])) {
   
    unset($_SESSION['cart']);
    session_destroy();
    

    echo "Košík byl vyprázdněn";
    header("Location: viewCart.php");
} else {
    header("Location: index.php");
    exit();

}
?>
