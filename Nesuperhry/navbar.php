<!DOCTYPE html>
<?php include 'conn.php'; session_start();?>

<html>
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
    margin: 0;
    padding: 0px;
  
}
#accbtn{
  position: relative;
    width: 10%;
    float: right;
    height: 130px;
    Display:block;
}

#baner{
  position:relative;
    width: 90%;
    float: left;
    height: 130px;
}
.navbar{
    height: 50px;
}


ul {
  width: 100%;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow:auto;
  background-color: #444;
    
}

li {
  float: left;
  
}

li a, .dropbtn {
  display: inline-block;
  background-color: #444;
  color: #ffffff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: #000;
  color: rgb(92, 92, 245);
}

.dropdown-content {
  display: none;
  position:fixed;
  background-color: #ffffff;
  min-width: 100%;
  z-index: 1;
  top:50px;
}

.dropdown-content a {
  color: #000;
  padding: 9px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
    background-color: #444;
    color: white;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.search{
  float: right;
  margin-top: 12px;
  margin-right: 16px;
  border: none;
  font-size: 20px;
  color: #fff;
  border-radius: 7px;
  transform: translate(0, -5px);
  color:#000;
}

#head{
    height: 130px;
}


</style>

</head>




<body style="overflow: hidden;">

<?php
      $sql = "SELECT * FROM petrabraham.Hra ORDER BY RAND() LIMIT 1"; 
      $result = $conn->query($sql); 
      $row = $result->fetch_assoc();
      ?>
  
  <base target="_parent">
<div class="header" id="head">
  <a href="index.php">
      <img src="baner.png" alt="baner" id="baner">
  </a>
  <a href="account.php"id="accbtn">
  <img <?php 
  if (isset($_SESSION['PFPpath'])) {
    echo 'style="height: 130px; width:auto; border-radius:65px;"src="' . $_SESSION['PFPpath'] . '"';
} else {
    echo 'style="height: 130px; width:auto; border-radius:65px;"src="uploads/pfp/default.jpg"';
}
   
  
  ?>>
<!--     <img src="accpfp.png" alt="pfp" > -->
  </a>
</div>


<div class="navbar" id="nav" >
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="<?php echo $row['ScriptPath']; ?>">Play a random game</a></li>
        <li style="float:right" class="search">
            <form action="search.php" method="post">
                <input type="text" class="search" placeholder="Search.." name="search">
            </form>
        </li>
            <div class="dropdown"onmouseover="vyska('0px','none')" onmouseout="vyska('130px','block')"> <!-- dropdown -->
              <li>
                <button class="dropbtn">Categories</button>
              </li>
                <div class="dropdown-content">
                <a href="kat.php?kat=kat1">kat1</a>
                <a href="kat.php?kat=kat2">kat2</a>
                <a href="kat.php?kat=kat3">kat3</a>
                </div>
                
            </div>
    </ul>
</div>


</body>
<!-- function hiding baner and pfp on hover over dropdown -->
<script>
    function vyska(height, displej) {
        document.getElementById('head').style.height = height; 
        document.getElementById('baner').style.height = height;
        document.getElementById('accbtn').style.height = height;
        document.getElementById('accbtn').style.display = displej;
    }
</script>

</html>
      
