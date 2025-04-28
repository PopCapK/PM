<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: auto;
            background: green;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile-info {
            flex-grow: 1;
        }

        .profile-info h1 {
            margin: 0;
            padding: 0;
            font-size: 24px;
        }

        .actions {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            border: none;
            background-color: #5C67F2;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4a54e1;
        }

        a {
            color: #5C67F2;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="profile-header">
        <img src="<?php echo $_SESSION['profile_pic']; ?>" alt="Profile Picture" class="profile-pic">
        <div class="profile-info">
            <h1><?php echo $_SESSION['username']; ?></h1>
        

            <?php
            //Stará metoda
            $username = $_SESSION['username'];
          //  $sql = "SELECT NAME,SURNAME FROM USER WHERE USERNAME='$username'";
           // $result = $conn->query($sql);
           // $row = $result->fetch_assoc();
           // echo "<h1>" . $row["NAME"] . "</h1>";
           // echo "<h1>" . $row["SURNAME"] . "</h1>";
            ?>


            <!-- Nová metoda -->
            <?php
            $stmt = $conn->prepare("SELECT NAME,SURNAME FROM USER WHERE USERNAME= ?");
            $stmt -> bind_param("s", $username);
            $stmt -> execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            echo "<h1>" . $row["NAME"] . "</h1>";
            echo "<h1>" . $row["SURNAME"] . "</h1>";
             ?>
       </div>
       
       
    </div>
    
    
    
    
    <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
        <div class="actions">
            
            <form action="logout.php" method="post">
                <button type="submit">Odhlásit se</button>
            </form>
            
        </div>
        
        <div class="actions">
            
            <form action="password_change.php" method="post">
                <button type="submit">Změnit heslo</button>
            </form>
            
        </div>
    <?php else: ?>
        <p>Nejste přihlášený</p>
    <a href="index.php">Zpátky na homepage</a>
    <?php endif; ?>
    <br>
    
</div>
</body>
</html>

