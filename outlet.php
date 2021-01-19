<?php require 'header.inc.php';
      require 'config.php';

if (isset($_GET['id'])) {
    $outlet_id = $_GET['id'];
} else {
    header("Location: index.php");
}

$outlet_query = mysqli_query($db, "SELECT * FROM partner where id='$outlet_id' limit 1");
$outlet = mysqli_fetch_assoc($outlet_query);

if (empty($outlet)) {
    header("Location: index.php");
}

$partner_username = $outlet['username'];
$item = mysqli_query($db, "SELECT * FROM item where partner_id='$outlet_id'");
$item_row = mysqli_fetch_all($item, MYSQLI_ASSOC);
?>
<html>
<head>
  <title>FoodShala</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="stlye.css">
</head>
<body>
  <div class="outlet-info">
      <span><?php echo ucwords($outlet['name']) ?></span>
      <span><?php echo ucwords($outlet['address']) ?></span>
  </div>
  <?php foreach ($item_row as $i) : ?>
      <div class="item-c">
          <div class="item-img" style="background-image: url('partner/media/<?php echo $partner_username . '/' . $i['image_name']; ?>')"></div>
          <span><?php echo ucwords($i['name']); ?></span>
          <?php $veg = $i['is_nonveg'] ?>
          <span><?php if ($veg == 1) {
          echo '<i class="fas fa-circle" aria-hidden="true" style="color: red;"></i>';}
            else echo "<i class='fas fa-circle' style='color: green;'></i>"; ?></span><br>
          <span>₹<?php echo $i['price']; ?></span>
          <span><a href="order.php?price=<?php echo $i['price']; ?>">Order Now</a></span>
        </div>
    <?php endforeach ?>
</div>
</body>
</html>
