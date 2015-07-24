<!DOCTYPE html>
<html>
<head>
	<title>Order Details</title>
	<link type="text/css" rel="stylesheet" href="/assets/materialize/css/materialize.min.css"  media="screen,projection"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<script type="text/javascript" src="/assets/materialize/js/materialize.min.js"></script>
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
		<div class="details">
			<h4>ORDER ID</h4>

			<h5>Customer Shipping Info:</h5>
			<p>Name:</p>
			<p>Address:</p>
			<p>City</p>
			<p>State:</p>
			<p>ZIP</p>

			<h5>Customer Billing Info:</h5>
			<p>Name:</p>
			<p>Address:</p>
			<p>City</p>
			<p>State:</p>
			<p>ZIP</p>
		</div>
		<div class="productdet">
			<table>
				<tr>
					<th>Product ID</th>
					<th>Item</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
			</table>	
		</div>
		<div class="shipstatus">
			<p>Status:</p>
		</div>
		<div class="totalprice">
			<p>Subtotal:</p>
			<p>Total Price:</p>
		</div>
	</div>
</body>
</html>