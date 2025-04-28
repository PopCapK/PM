<!-- most copied from navbar.php -->
<style>
*{
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
.btn {
  background-color: #000000;
  border: none;
  color: rgb(165, 165, 165);
  width: 400px;
  padding: 0px 0px;
  text-align: center;
  font-size: 16px;
  margin: 5px 5px;
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
</style>

</head>
<div id="box">
    <div id="navbar">
       <embed type="text/html" src=navbar.php width=100% height="210px" >
    </div>

    <div id="rest">

            <img class="sidebar" src="sidebaner.png" alt="sidebar1" width="100%" height="780px">

            <div class="hry">
                <?php
                        /* lists all games in selected caegory */ 
                    include 'conn.php'; session_start();
                    $kat= $_GET['kat'];

                    $sql = "SELECT * FROM petrabraham.Hra WHERE kategorie='$kat'";
                    $result = $conn->query($sql);;
                    while ($row = $result->fetch_assoc()) {
                        echo "<a href=".$row['ScriptPath']."><button class='btn'>".$row['nazev']."<img src=".$row['banerPath']." height=100% width=100%></button></a>";
                    }


                ?>
            </div>

            <img class="sidebar" src="sidebaner.png" alt="sidebar2" width="100%" height="780px">

    </div>
    
</div>


</html>


