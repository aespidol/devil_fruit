<!DOCTYPE html>
<html>
<head>
	<title>Devil's Market Cart</title>
    <link type="text/css" rel="stylesheet" href="/assets/materialize/css/materialize.min.css"  media="screen,projection"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="grey lighten-3">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  	<script type="text/javascript" src="/assets/materialize/js/materialize.min.js"></script>
  	<script type="text/javascript">
	  	function FillBilling(f)
		{
			if(f.test5.checked == true)
			{
				f.first_name_billing.value = f.first_name_shipping.value;
				f.last_name_billing.value = f.last_name_shipping.value;
				f.address_billing.value = f.address_shipping.value;
				f.address_2_billing.value = f.address_2_shipping.value;
				f.city_billing.value = f.city_shipping.value;
				f.state_billing.value = f.state_shipping.value;
				f.zipcode_billing.value = f.zipcode_shipping.value;
				f.country_billing.value = f.country_shipping.value;
			}
			else
			{
				f.first_name_billing.value = null;
				f.last_name_billing.value = null;
				f.address_billing.value = null;
				f.address_2_billing.value = null;
				f.city_billing.value = null;
				f.state_billing.value = null;
				f.zipcode_billing.value = null;
				f.country_billing.value = null;
			}
		};
  	</script>
<!-- Nav Bar		 -->
	<div class="navbar-fixed">
	<nav>
	  <div class="nav-wrapper grey darken-4">
	    <a href="#!" class="brand-logo center"><img src="/assets/logo.png" alt=""></a>
	    <ul class="left hide-on-med-and-down">
		   	<li><a href="/home">Paramecia</a></li>
		    <li><a href="/about">Logia</a></li>	
		    <li><a href="/about">Zoan</a></li>	
	    </ul>
	   	<ul class="right hide-on-med-and-down">
		   	<li><a href="/home">Home</a></li>
		    <!-- <li><a href="/about">About</a></li>	 -->
		    <li><a href="/cart"><i class="material-icons">shopping_cart</i></a></li>
		    <li><a href="/cart">
			    <?php
		    		$quantity = 0;
		    		foreach ($this->session->userdata('cart_items') as $count) {
		    			$quantity+=$count['quantity'];
		    		}
		    		echo "(".$quantity.")";
		    	?>
		    </a></li>
	    </ul>
	  </div>
	</nav>
	</div>
<!-- End Nav Bar -->
<div class="container">
	<h1>Your Cart</h1>
	<table class="hoverable striped">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($cart as $item){
			?>	
				<tr>
					<td><?=$item['name']?></td>
					<td><?="$".$item['price']?></td>
					<td><?=$item['quantity']?></td>
					<td><?= "$".$item['price']*$item['quantity'] ?></td>
					<td><a href="/delete/<?=$item['id']?>">DELETE</a></td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<div class="row">
		<form action="/pay" method="post">
			<div class="col s6">
				<h5>Shipping Information</h5>
				<input type="text" name="first_name_shipping" placeholder="First Name">
				<input type="text" name="last_name_shipping" placeholder="Last Name">
				<input type="text" name="address_shipping" placeholder="Address">
				<input type="text" name="address_2_shipping" placeholder="Address 2">
				<input type="text" name="city_shipping" placeholder="City">
				<input type="text" name="state_shipping" placeholder="State">
				<input type="text" name="country_shipping" placeholder="Country">
				<input type="text" name="zipcode_shipping" placeholder="Zipcode">
			</div>
			<div class="col s6">
				<h5>Billing Information</h5>
				 <p>
      				<input type="checkbox" id="test5" onclick="FillBilling(this.form)" />
      				<label for="test5">Same as shipping</label>
    			</p>
				<input type="text" name="first_name_billing" placeholder="First Name">
				<input type="text" name="last_name_billing" placeholder="Last Name">
				<input type="text" name="address_billing" placeholder="Address">
				<input type="text" name="address_2_billing" placeholder="Address 2">
				<input type="text" name="city_billing" placeholder="City">
				<input type="text" name="state_billing" placeholder="State">
				<input type="text" name="country_billing" placeholder="Country">
				<input type="text" name="zipcode_billing" placeholder="Zipcode">
				<input type="text" name="card" placeholder="Card">
				<input type="text" name="security_code" placeholder="Security Code">
				<input type="text" name="expiration" placeholder="Expiration">
			  	<button class="btn waves-effect waves-light" type="submit" name="action">Pay
   					<i class="material-icons">send</i>
  				</button>
			</div>
</div>
</body>
</html>