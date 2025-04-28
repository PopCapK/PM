<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace uživatele</title>
    
    <?php include 'conn.php';?>
    
</head>
<body>
    <h1>Registrace uživatele</h1>
    <!-- Entype nám změní typ formuláře tak abychom mohli nahrát obrázky -->
    <form action="add_user.php" method="post" enctype="multipart/form-data">
        Jméno: <input type="text" name="name" required><br>
        Příjmení: <input type="text" name="surname" required><br>
        Uživatelské jméno: <input type="text" name="username" required><br>
        Heslo: <input type="password" name="password" required><br>
        Profilovka: <input type="file" name="picture" accept="image/*" required><br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>
