<!DOCTYPE html>
<html>
<head>
	<title>Devil's Market Product</title>
    <link type="text/css" rel="stylesheet" href="/assets/materialize/css/materialize.min.css"  media="screen,projection"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="grey lighten-3">
  	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  	<script type="text/javascript" src="/assets/materialize/js/materialize.min.js"></script>
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
	<div class="row valign-wrapper">
		<div class="col s4">
			<img src="/assets/image/<?=$product['image']?>" alt="" class="responsive-img">
			<h4 class="center"><?=$product['name']?></h4>
			<h5 class="center yellow lighten-2"><?=$product['price']?></h5>
			<div class="center">
		  		<form action="/add_cart" method="post">
		  			<input type="hidden" name="name" value="<?=$product['name']?>">
		  			<input type="hidden" name="price" value="<?=$product['price']?>">
		  			<input type="hidden" name="id" value="<?=$product['id']?>">
		  			<button class="waves-effect waves-light btn"href="">Add To Cart</button>
		  		</form>
		  	</div>
		</div>
		<div class="col s8">
			<p class="center"><?=$product['description']?></p>
			<p>Demo: 
				<div class="video-container">
        			<iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
      			</div>
			</p>
		</div>
	</div>	
</div>
</body>
</html>