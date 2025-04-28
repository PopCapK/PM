<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Database</title>
    
  <?php include 'conn.php';?>
    
</head>
<body>
    <!-- -------------------------------------------Login------------------------------------------------------ -->
        <h1>Login</h1>
    <form action="login.php" method="POST">
        <label for="USERNAME">Username:</label><br>
        <input type="text" id="USERNAME" name="USERNAME"><br>
        
        <label for="PASSWORD">Password:</label><br>
        <input type="password" id="PASSWORD" name="PASSWORD"><br>
        
        <input type="submit" value="Login">
    </form>
    
    
</body>
</html>
