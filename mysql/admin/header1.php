<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link type = "text/css" rel = "stylesheet" href = "style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .dropbtn {
  background-color: #72C1CC;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  text-decoration: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #B8D3D7;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #6B979D;}
  </style>
</head>

<body>
	
<div class="dropdown">
  <a class="dropbtn" href="index.php">Dashboard</a>
  <a class="dropbtn" href="product.php">Products</a>
  <div class="dropdown-content">
    <a href="manageProduct.php">Manage</a>
    <a href="addproduct.php">Add</a>
  </div>
  <a class="dropbtn" href="user.php">Users</a>
  <div class="dropdown-content">
    <a href="managerUser">Manage</a>
    <a href="signup.php">Add</a>
  </div>
  <a class="dropbtn" href="logout.php">Logout</a>
</div>