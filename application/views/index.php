<!DOCTYPE html>
<html>
<head>
	<title>Devil's Market</title>
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
<!-- End Navbar	     -->
  	<div class="container ">
  	<h2 class="center">Welcome to Devil's Market</h2>
  	<p class="flow-text center">Enhanced GMOs~Purest of Substances~Guaranteed Side Effects<br><span class="red">Caution: The ability to swim will be lost upon consumption.</span></p>
			<?php
				$open=true;
				$counter = 0;
				foreach ($products as $product) {	
				if($open=true){
					echo "<div class='row'>";
					$open = false;
				}			
			  ?>	  
	  		<div class="col s4">
		  		<div class="card grey lighten-3 z-depth-0">
		  			<a href="/product/<?=$product['id']?>"><img src="/assets/image/<?=$product['image']?>" alt="" class="responsive-img"></a>
		  		</div>
		  		<h4 class="flow-text center"><strong><?=$product['name']?></strong></h4>
		  		<h5 class="center yellow lighten-2"><?="$".$product['price']?></h5>
		  		<p class="center"><?=$product['description']?><a href="/product/<?=$product['id']?>"> More Details..</a></p>
		  		<div class="center">
		  			<form action="/add_cart" method="post">
		  			<input type="hidden" name="name" value="<?=$product['name']?>">
		  			<input type="hidden" name="price" value="<?=$product['price']?>">
		  			<input type="hidden" name="id" value="<?=$product['id']?>">
		  			<input type="hidden" name="quantity" value="1">
		  			<button class="waves-effect waves-light btn"href="">Add To Cart</button>
		  			</form>
		  		</div>
  			</div>
  			<?php
  				$counter++;
  			if($counter%3 == 0){
  				echo "</div>";
  				$open = TRUE;
  			}

  				}
  			  ?>
	  	</div>
  	</div>
</body>
</html>