<?php
        // Deklarace php proměnných
        $servername = "127.0.0.1:3306";
        $username = "michaelkudrnac";
        $password = "Heslo123.";
        $database = "michaelkudrnac";


        //MYSQLI - MYSQL Improved
        $conn = new mysqli($servername, $username, $password, $database);

        //Ověření spojení
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Test test";
        }


//PDO VERZE
//    try{
//        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Funguje";
//    }catch(PDOException $x){
//        echo "Spojení nefunguje" . $x->getMessage();
//    }
      ?>













