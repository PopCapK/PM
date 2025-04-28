<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php include 'conn.php'; ?>

<head>
    <style>
*{
    box-sizing: border-box;
    border-style: none;
    border: none;
    border-radius: 0px;
    font-size: 20px;
    font-family: 'Trebuchet MS';
    border-color: #000;
    margin: 0%;
    padding: 0px;
    
}
.sidebar{
    float: left;
    width :12%;
}
.hry{
    float: left;
    width: 76%;
}
#box {
    height: 100%;
    min-height: 100%;
    display: flex;
    flex-flow: column;
}
#navbar{
    background-color: #444;
    height: 190px;
}
#rest{
    background-color: deepskyblue;
    flex: 1;
}

 


    </style>
    
</head>
<div id="box">
    <div id="navbar">
       <embed type="text/html" src=navbar.php width=100% height="210px" >
    </div>

    <div id="rest">
            <!-- rest of index, supposed to fill rest of screen but couldnt get flexbox to work correctly so set height -->
            <img class="sidebar" src="sidebaner.png" alt="sidebar1" width="100%" height="780px">

            <embed scrolling="no" class="hry" type="text/html" src=browser.php width=100% height="780px">

            <img class="sidebar" src="sidebaner.png" alt="sidebar2" width="100%" height="780px">


    </div>
    
</div>


</html>