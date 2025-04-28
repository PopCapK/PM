<?php

session_start();

function deleteSession(){
unset($_SESSION['username']);
unset($_SESSION['profile_pic']);  
   
    if (empty($_SESSION)) {
    session_destroy();
    
}

}

//Cookie delete část
//function deleteCookie($cookieName) {
    
//    setcookie($cookieName, "", time() - 3600, "/");
//}

//deleteCookie("username");
//deleteCookie("profile_pic");
deleteSession();
echo "Uživatel odhlášen.";

header("Location: index.php");

?>
