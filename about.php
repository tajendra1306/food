<?php require 'config.php';
$location_query = mysqli_query($db, "SELECT * FROM partner");
$rows = mysqli_fetch_all($location_query, MYSQLI_ASSOC);
?>
<html>
<head>
<title>About</title>
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
 <div class="about">
 <p>
     The aim of developing Online Food Ordering system project is to
     replace the traditional way of taking orders with computerized
     system. Another important reason for developing this project is to
     prepare order summary reports quickly and in correct format at any
     point of time when required.
     <br><br><br>
     User Friendly: Online Food Ordering System is a very user friendly
     project because the Food Ordering Record and searching from
     categories is very simple, fast and data is secured. The user
     interface of the project is very simple.
     Order reports of the system can be easily generated. User can
     generate the report of any particular date and period. In this way
     they can get delivery status of customers and get information about
     what is being ordered.
     <br><br><br>
     Very less paper work: Online Food Ordering System requires less
     paper work. In this project all record is fetched directly into the
     computer and reports can be generated through just a click. In this
     way it saves time. As data is directly entered into computer so
     there is no need to do any paper work.
     <br><br><br>
     Customers are the core of all business strategies. Therefore, ensuring
     the great customer experience is of prime importance for the growth of
     the business. You need to meet your customers where they spend their
     time. More than 60% of consumers look for purchasing goods and
     services online. If you meet your customers where they are already
     active, the chances of them, interacting with your business increases
     two folds. You can increase the number of loyal customers by giving
     the best experience to your already existing customers as well as
     bring in newer customers.
     <br><br><br>
     The purpose of the website is to deliver homemade food at the
     customer’s doorstep.
     Women who love cooking are enrolled as chefs, and they bring
     home cooked food to your doorstep.
     The purpose is to provide fresh, hygienic, affordable and home food
     cooked through an online food delivery website.
     Historically, this cooking skill is under-acknowledged and never
     accounted for in any economic calculation or GDP. We want to flip
     this and turn it into an identity provider—and a livelihood option for
     women.
     Getting good homemade food three times a day is a hunt for the
     wilderness, especially if you don’t live with your family. Doing it
     daily would be an awful waste of time. According to a recent survey
     in India, 34% of the people eat out two to three times a week, while
     27% eat out once a week. About 12% eat out every day.
 </p>
</div>
</body>
</html>
<?php require 'footer.inc.php' ?>
