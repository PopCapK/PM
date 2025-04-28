<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php include 'conn.php'; session_start();
if (!isset($_SESSION['Username'])) {
    header("Location: login.php");
}
?>

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
    background-color: #444;
    flex: 1;
}
#accpfp{
    float: left;
}
.sidebar {
    width:30%;
    background-color: rgb(187, 187, 187);
    height: 780px;
}
.sidebar .accinfo{
    height: 200px;
    background-color: #ffffff;
    color:#000;
    padding: 25px;
}

button{
    float: left;
    background-color: #ddd;
    width: 95%;
    height: 50px;
    margin: 10px;
    transition: 0.5s;
    opacity: 0.8;
}
.btn{
    float: left;
    background-color: #ddd;
    width: 95%;
    height: 50px;
    margin: 10px;
    transition: 0.5s;
    opacity: 0.8;
}

button:hover{
    background-color: #aaa;
    opacity: 1;
}

#PFPUpdate{
    background-color: #EEE;
    width: 400px;
    height: 300px;
    border: 2px solid;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-15%, -50%);
    padding: 10px;
    border-radius: 25px;
    padding: 20px;
    display: block;
  }
  #PwordUpdate{
    background-color: #EEE;
    width: 400px;
    height: 280px;
    border: 2px solid;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-15%, -50%);
    padding: 10px;
    border-radius: 25px;
    padding: 20px;
    display: none;
  }
  #ProgressUpdate{
    background-color: #EEE;
    width: 400px;
    height: 360px;
    border: 2px solid;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-15%, -50%);
    padding: 10px;
    border-radius: 25px;
    padding: 20px;
    display: none;
  }

  .inputForm{
    width: 50%;
    left: 25%;
    
  }
  .inputField{
    margin: 5px;
    border-radius: 25px;
    padding: 20px;
  }
  .btn1{
    color:#000;
    margin: 5px;
    border-radius: 15px;
    padding: 5px;
    border: 2px solid;
    background-color:deepskyblue;
    text-decoration: none;
  }


    </style>
    
</head>
<div id="box">
    <div id="navbar">
        <embed type="text/html" src=navbar.php width=100% height="210px" >
    </div>

        <!-- buttons switching visibility of content on the right -->
    <div id="rest">
        <div class="sidebar">
        <div class="accinfo">
                <?php echo '<img style="height: 130px; width:auto; border-radius:25px;"src="' . $_SESSION['PFPpath'] . '">'; ?>
                <?php echo '<p style="height:100px;">'.$_SESSION['Username']; ?></p>
            </div>
                <button onClick="document.getElementById('PFPUpdate').style.display='block';
                document.getElementById('PwordUpdate').style.display='none';
                document.getElementById('ProgressUpdate').style.display='none';">Change profile picture</button>
                <button onClick="document.getElementById('PwordUpdate').style.display='block';
                document.getElementById('PFPUpdate').style.display='none';
                document.getElementById('ProgressUpdate').style.display='none';">Update password</button>
                <button onClick="document.getElementById('ProgressUpdate').style.display='block';
                document.getElementById('PFPUpdate').style.display='none';
                document.getElementById('PwordUpdate').style.display='none'">Reset game proress</button>
            <a href="login.php"><button >Lougout</button></a>
        </div>

         <!-- forms for updating account info -->
    <div id="PFPUpdate">
      <h1>Update Profile Picture</h1>
      <form class="inputForm" action="PFPUpdate.php" method="post" enctype="multipart/form-data">
          <input class="inputField" type="text" placeholder="Password" name="Pword" required><br>
          select profile picture: <input type="file" name="picture" accept="image/*" required><br>
          <input class="btn1" style="padding-left:140px; padding-right:140px; margin-bottom:20px;" type="submit" name="submit" value="Submit"> 
      </form>
    </div>

    <div id="PwordUpdate">
      <h1>Update password</h1>
      <form class="inputForm" action="PwordUpdate.php" method="post" enctype="multipart/form-data">
          <input class="inputField" type="text" placeholder="Password" name="Pword" required><br>
          <input class="inputField" type="text" placeholder="New password" name="newPword" required><br>
          <input class="btn1" style="padding-left:140px; padding-right:140px; margin-bottom:20px;" type="submit" name="submit" value="Submit"> 
      </form>
    </div>    

    <div id="ProgressUpdate">
      <h1>ProgressUpdate</h1>
      <form class="inputForm" action="ProgressUpdate.php" method="post" enctype="multipart/form-data">
            <input class="inputField" type="text" placeholder="Game name" name="Game" required><br>
            <input class="inputField" type="text" placeholder="Password" name="Pword" required><br>
            <input class="inputField" type="text" placeholder="Type ´´CONFIRM´´" name="CONFIRM" required><br>
            <input class="btn1" style="padding-left:140px; padding-right:140px; margin-bottom:20px;" type="submit" name="submit" value="Delete"> 
      </form>
    </div>


    </div>
    
</div>


</html>