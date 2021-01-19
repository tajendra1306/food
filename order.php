<?php require 'header.inc.php'; ?>
<html>
<head>
  <title> Order Food</title>
  <style>
  .order, h2{
    margin-left: 20px;
  }

  </style>
</head>
<body>
<div class="order">
<h3>Enter the quantity here</h3>
<form method="post">
<input type="number" name="qty" min="1" required>
<input type="submit" name="submit" value="Submit"></form><br><br>
</div>
</body>
</html>
<?php
require 'config.php';
session_start();
if (isset($_GET['price'])) {
    $p = $_GET['price'];
  if (isset($_POST['qty'])) {
    $q = $_POST["qty"];
    $total = $p * $q;
    echo "<h2 style='color: green;'>Your Order was placed successfully. You have to pay ₹ $total</h2>";
  }
}
?>
