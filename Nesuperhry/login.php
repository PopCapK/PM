<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    
    <?php include 'conn.php';
    session_start();
    session_unset();
    session_destroy();?>
    
</head>
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
  .regwindow{
    background-color: #EEE;
    width: 400px;
    height: 320px;
    border: 2px solid;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
    border-radius: 25px;
    padding: 20px;
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
  .btn{
    color:#000;
    margin: 5px;
    border-radius: 15px;
    padding: 5px;
    border: 2px solid;
    background-color:deepskyblue;
    text-decoration: none;
  }
  </style>
<!-- login form -->
<body>
  <div class="regwindow">
    <h1>Login</h1>
    <form class="inputForm" action="loginBackend.php" method="post" enctype="multipart/form-data">
        <input class="inputField" type="text" placeholder="Username" name="Username" required><br>
        <input class="inputField" type="text" placeholder="Password" name="Pword" required><br>
        <input class="btn" style="padding-left:150px; padding-right:150px; margin-bottom:20px;" type="submit" name="submit" value="login"> 
    </form>
    <a class="btn" href="register.php" style="float:left;">register instead</a> <a class="btn" href="index.php" style="float:right;">Home</a>
  </div>
</body>
</html>