<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php include 'conn.php'; session_start(); $jsonPath = "saves/".$_SESSION['Username']."-Savehra".".json";?>




<form class="inputForm" onsubmit="save()" method="post" enctype="multipart/form-data">
            <input class="inputField" type="text" placeholder="saved var1" name="var1" required><br>
            <input class="inputField" type="text" placeholder="saved var2" name="var2" required><br>
            <input class="btn1" style="padding-left:140px; padding-right:140px;" type="submit" name="submit" value="save"> 
</form>

<?php 
    
    if(isset($_SESSION['Username'])){
        $str = file_get_contents($jsonPath);
        $json = json_decode($str, true);
        echo '<pre>' . print_r($json, true) . '</pre>';
    }
    else{echo"not logged in";}
?>

<script>

function save(){
<?php 
    if(isset($_SESSION['Username'])){
        echo $_POST['var1'].$_POST['var2'];
        $myJson = new stdClass(); 
        $myJson->var1 = $_POST['var1'];
        $myJson->var2 = $_POST['var2'];

        $myJSONvar = json_encode($myJson);

        echo $myJSONvar;
        
        // Generate json file
        file_put_contents($jsonPath, $myJSONvar);
    }
    else{echo"not logged in";};
?>
}
</script>

</html>
