<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Orders</title>
	<link type="text/css" rel="stylesheet" href="/assets/materialize/css/materialize.min.css"  media="screen,projection"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
		<div class="navbar-fixed">
			<nav>
			  <div class="nav-wrapper grey darken-4">
			    <a href="#!" class="brand-logo center"><img src="/assets/logo.png" alt=""></a>
			    <ul class="left hide-on-med-and-down">
			      <li><a href="">Dashboard</a></li>
			      <li><a href="/orders">Orders</a></li>
			      <li><a href="/products">Products</a></li>
			    </ul>
			   	<ul class="right hide-on-med-and-down">
			      <li><a href="/logoff">Log Off</a></li>
			    </ul>
			  </div>
			</nav>
		</div>	
	<div class="container">
		<div class="searchbar">
			<form action="" method="get">
				<input type="search" placeholder="Search">
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="orderdash">
			<table>
				<tr>
					<th>Order ID</th>
					<th>Name</th>
					<th>Date</th>
					<th>Billing Address</th>
					<th>Total Price</th>
					<th>Status</th>
				</tr>
			</table>	
		</div>
	</div>	
</body>
</html>