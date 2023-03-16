<!DOCTYPE html>
<html lang="en">

<header>
  <div class="logo">
    <a href="#"><img src="maz.png" alt="Supermarket Logo"></a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </div>
  <nav>
  <ul>
  <li><a href="#"> <?php echo $_GET['username'] . " :مرحبًا"; ?> </a></li>
      <li><a href="#">الصفحة الرئيسية</a></li>
      <li><a href="search.php">بحث</a></li>
      <li><a href="add-order_cort.php">طلب</a></li>
      <li><a href="order_min.php">طلب النواقص</a></li>
      <li><a href="index1.php">خروج</a></li>
    </ul>
  </nav>
</header>
<style>header {
  background-color: #fff;
  height: 80px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.logo img {
  height: 60px;
}

nav ul {
  list-style: none;
  display: flex;
}

nav li {
  margin: 0 20px;
}

nav a {
  text-decoration: none;
  color: #555;
  font-weight: bold;
  text-transform: uppercase;
}
</style>
</head>

