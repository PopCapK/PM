<!DOCTYPE html>
<html>
<head>
<meta>

<?php include 'conn.php'; session_start();?>

<style>
* {
    box-sizing: border-box;
    border-style: none;
    border: none;
    border-radius: 0px;
    font-size: 20px;
    font-family: 'Trebuchet MS';
    border-color: #000;
    margin: 0px;
    padding: 0px;
}
.container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr));
    gap: 10px; /* Adjust the gap between buttons as needed */
    width: 100%;
}
.btn {
    background-color: #000000;
    border: none;
    color: rgb(165, 165, 165);
    padding: 0px 0px;
    text-align: center;
    font-size: 16px;
    transition: 0.3s;
    opacity: 0.5;
    border-radius: 15px;
    border: 2px solid;
    min-height: 100px;
}
.btn:hover {
    background-color: #061133;
    color: rgb(255, 255, 255);
    opacity: 1;
}
.btn img {
    width: 100%;
    height: auto;
    border-radius: 0 0 13px 13px;
    flex-shrink: 0; 
}
/*hide scrollbar for chrome*/
.noscroll::-webkit-scrollbar {
    display: none;
}
/* Hide scrollbar for IE, Edge and Firefox */
.noscroll {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
/*hide scrollbar y no workie*/
</style>
</head>
<body>
<div class="noscroll container">

<?php

//for ($i = 1; $i <= 48; $i++) {
//    $sql = "SELECT * FROM petrabraham.Hra WHERE idHra='$i'";           //list games in order of ID
//    $result = $conn->query($sql);
//    $row = $result->fetch_assoc();
//}
$sql = "SELECT * FROM petrabraham.Hra ORDER BY RAND()";  //list in random order
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<a href=".$row['ScriptPath']."><button class='btn'>".$row['nazev']."<img src=".$row['banerPath']." height=100% width=100%></button></a>";
}


?>
</div>
</body>
</html>
