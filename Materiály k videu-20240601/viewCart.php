<?php
session_start();
include 'conn.php';

print_r($_SESSION);


$sql = "SELECT PATH FROM PICTURE";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <style>
   
table {
    width: 100%;
    border-collapse: collapse;
}


th {
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}


td {
    border: 1px solid #ddd;
    padding: 8px;
}


tr:nth-child(even) {
    background-color: #f2f2f2;
}


td img {
    width: 100%;
    height: auto;
    max-width: 200px;
    max-height: 200px; 
}
img {
    width: 100%;
    height: 100%;
    
}

    
    </style>
</head>
<body>
<div class="container">
    <h1>Nákupní košík</h1>

    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <table>
            <tr>
                <th>Title</th> 
                <th>Banner</th>
            </tr>
            <?php foreach($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?php echo $item['TITLE']; ?></td> 
                   <td><img src="<?php echo htmlspecialchars($item['PATH']); ?>" alt="Image"></td>

                 
                </tr>
            <?php endforeach; ?>
        </table>
    <br>
        <form action="confirmPurchase.php" method="post">
            <button type="submit">Potvrdit nákup</button>
        </form>
    <br>
        <form action="empty_cart.php" method="post">
    <button type="submit" name="unset_cart">Vyčistit košík</button>
        </form>
    <br>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <br>
    <a href="index.php">Zpátky na index</a>
</div>
</body>
</html>
