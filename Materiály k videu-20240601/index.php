<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Database</title>
    
  <?php include 'conn.php';?>
    <!-- CSS -->
    <style>
    h1 {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 10px; 
}
 
form {
  width: 300px;
  margin: 5 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  font-weight: bold;
}

input[type="text"],
select,
input[type="file"],
input[type="submit"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box; 
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}


input[type="file"] {
  cursor: pointer;
}


label[for="film_picture"] {
  cursor: pointer;
}


body {
}
        

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin-bottom: 10px;
}


img {
  width: 200px; 
  height: 200px;
  margin: 20px;
  border-radius: 5px;
  border: solid black;
    
}


a {
  text-decoration: none;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  width: auto;
  padding: 8px;
  margin-bottom: 30px;
  margin-top: 30px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box; 
 display: inline-block;
 text-align: center;
}

a:hover {
  text-decoration: underline;
}
    </style>
    
</head>
<body>
<!-- ------------------------------------Aktivní session--------------------------------------------- -->
     <?php
    session_start();
    
    if(isset($_SESSION['username'])) {
        echo "<p>Welcome, ".$_SESSION['username']."</p>";
        echo '<img src="' .$_SESSION['profile_pic']. '" alt="Image">';
        echo '<a href="logout.php">Logout</a>';
        echo '<a href="Profil.php">Profil</a>';
    } else {
        echo '<br> <a href="login_page.php">Login</a>';
        echo '<a href="register.php">Registrace</a>';
    }
    ?>
    
<!-- ------------------------------------Aktivní session--------------------------------------------- -->
    
<a href="viewCart.php"> Tady je kosik</a>    
<h1>Add New Film</h1>
<form action="add_film.php" method="POST" enctype="multipart/form-data">
    <label for="LENGTH">Délka:</label><br>
    <input type="text" id="LENGTH" name="LENGTH"><br>

    <label for="TITLE">Title:</label><br>
    <input type="text" id="TITLE" name="TITLE"><br>

    <label for="AUTHOR_idAUTHOR">Author:</label><br>
    <select id="AUTHOR_idAUTHOR" name="AUTHOR_idAUTHOR">
        
        <?php
        $sql = "SELECT idAUTHOR, NAME, SURNAME FROM AUTHOR";
        $result = $conn->query($sql);

        // Naplnění dropdownu s daty z databáze
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"" . $row["idAUTHOR"] . "\">" . $row["NAME"] . " " . $row["SURNAME"] . "</option>";
            }
        } else {
            echo "<option value=\"\">No authors found</option>";
        }
        ?>
    </select>
    <br>
    
    <label for="film_picture">Banner:</label><br>
    <input type="file" name="film_picture" accept="image/*" required><br>
    
    <input type="submit" value="Add Film">
</form>

    
    
    
    
    
<h1>All Films</h1>

    <?php

    $sql = "SELECT * FROM FILM";
    $result = $conn->query($sql);

    // Zobrazení filmů na stránce
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["TITLE"] . "</li>";
        }
    } else {
        echo "0 results";
    }
    ?>
    
    <h1>Všechny obrázky které patří k filmům</h1> 
    
        <?php
    $sql = "SELECT FILM.TITLE, FILM.idFILM, PICTURE.PATH, PICTURE.idPICTURE
    FROM FILM
    JOIN PICTURE ON FILM.PICTURE_idPICTURE = PICTURE.idPICTURE;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            echo '<a href="addToCart.php? PATH=' . urlencode($row["PATH"]) . '&TITLE=' . urlencode($row["TITLE"]) . '">
     <img src="' . $row["PATH"] . '" alt="Image"></a>';



          
        }
    } else {
        echo "No images found in the database.";
    }
    
    $conn->close();
    ?>
    
</body>
</html>
