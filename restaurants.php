<?php require 'config.php';
$location_query = mysqli_query($db, "SELECT * FROM partner");
$rows = mysqli_fetch_all($location_query, MYSQLI_ASSOC);
?>
<html>
<head>
<title>Restaurants</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <section class="hero1">
   <div class="logo-r">
     <a href="index.php"><img src="logo1.png"></a>
      <div class="nav-links">
        <a href="login.php"><button type="button" class="btn1">Login</button></a>
      </div>
      </div>
      <h1>Order food online from the best restaurants!</h1>
 </section>
<!--- Restaurants ------------------------>
<?php foreach ($rows as $outlet) : ?>
 <?php
 $outlet_id = $outlet['id'];
 $item = mysqli_query($db, "SELECT * FROM item where partner_id='$outlet_id'");
 $item_row = mysqli_fetch_all($item, MYSQLI_ASSOC);  ?>
 <div class="food-menu-box">
   <div class="food-menu-img">
     <img src="partner/media/<?php echo $outlet['name'] . '/' . 'display.jpg'; ?>" class="img-curve">
   </div>
   <div class="food-menu-desc">
     <h4><?php echo $outlet['name'] ?></h4>
     <p class="food-detail"><?php echo $outlet['address'] ?></p><br>
     <a href="outlet.php?id=<?php echo $outlet['id']?>" class="viewm">View More</a>
   </div>
 </div>
<?php endforeach; ?>
</body>
</html>
