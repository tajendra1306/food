<?php require 'config.php';
$location_query = mysqli_query($db, "SELECT * FROM partner LIMIT 8");
$rows = mysqli_fetch_all($location_query, MYSQLI_ASSOC);
session_start();
ob_start();
//logout

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user_username']);
}
?>
<html>
<head>
<title>Foodshala</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
<section id="hero">
 <div class="nav-bar">
  <?php require 'header.inc.php';
   ?>
    <?php if (isset($_SESSION['user_username'])) : ?>
     <li class="end2 dropdown" style="margin-left:61%;"><img src="user.png" style="height:50px; width:50px; border-radius: 50%; margin-top: 24px;"> &nbsp;<strong style="color:#fff; position: absolute; margin-top:40px;"><?php echo ucwords($_SESSION['user_username']); ?></strong>
       <ul class="profile">
         <li class=""><a href=""> MY ADDRESSES</a></li>
         <li class=""><a href=""> MY ORDERS</a></li>
         <li class=""><a href="index.php?logout='1'" style="color:red;"> LOGOUT</a></li>
       </ul>
     </li>
   <?php else:  ?>
     <div class="nav-links">
       <a href="login.php"><button type="button" class="btn">Login</button></a>
     </div>
       <?php endif ?>
 </div>
<div class="banner-title">
  <h1>Food <span>Doesn't have<br> a religion.</span> It is a religion.</h1>
  <a href="#food-menu" class="btn">EXPLORE</a>
</div>
</section>
<!--- Restaurants ------------------------>
<section id="food-menu">
  <div class="container1">
    <h2 class="text-center">Restaurants For You</h2>
  <a href="restaurants.php" class="vall">View All</a>
  </div>
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
</section>
<!--- Categories --------------------------->
<section class="categories">
  <div class="container2">
    <h2 class="text-center">Categories For You</h2>
    <div class="box-3"><img src="momo1.jpg" class="responsive"><!---giphy4.gif-->
      <h3 class="float-text text-white">Chinese</h3>
    </div>
    <div class="box-3"><img src="pizza.jpg" class="responsive"><!---giphy3.gif-->
      <h3 class="float-text text-white">Italian</h3>
    </div>
    <div class="box-3"><img src="dessert.jpg" class="responsive"><!---giphy2.gif-->
      <h3 class="float-text text-white">Desserts</h3>
    </div>
  </div>
</section>
<!--- Footer ------------------------------->
<?php require 'footer.inc.php';
 ?>
 <script src="smooth-scroll.js"></script>
 <script>
	var scroll = new SmoothScroll('a[href*="#"]');
</script>
</body>
</html>
