<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Products</title>
	<link type="text/css" rel="stylesheet" href="/assets/materialize/css/materialize.min.css"  media="screen,projection"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<script type="text/javascript" src="/assets/materialize/js/materialize.min.js"></script>
	<script>
	  $(document).ready(function() {
	    $( "#dialog" ).dialog({
	      autoOpen: false,
	    });
	 
	    $( "#opener" ).click(function() {
	      $( "#dialog" ).dialog("open");
	      return false;
	    });

	    $( "#dialog2" ).dialog({
	      autoOpen: false,
	    });
	 
	    $( "#edit" ).click(function() {
	      $( "#dialog2" ).dialog("open");
	      return false;
	    });
	  });
  </script>
</head>
<body class="grey lighten-3">
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
		<p><?= $this->session->flashdata('error') ?></p>
		<p><?= $this->session->flashdata('success') ?></p>
		<div class="searchbar">
			<form action="" method="post">
				<input type="search" placeholder="Search">
				<button class="btn waves-effect waves-light" type="submit" name="action">
					<i class="material-icons">search</i>
				</button>
			</form>
		</div>
		<div class="card-panel light grey lighten-2" id="dialog" title="Add a new product" >
			<form action="/addproduct" method="post">
				<label>Product Name</label>
				<input type="text" name="productname">
				<label>Description</label>
				<textarea name="proddesc"></textarea>
				<label>Select Category</label>
			    <select class="browser-default col s12" name="newcate">
			      <option value="" disabled selected>Choose your option</option>
			      <option value="Paramecia">Paramecia</option>
			      <option value="Logia">Logia</option>
			      <option value="Zoan">Zoan</option>
			    </select>
				<label>Quantity</label>
				<input type="text" name="quantity">	
				<label>Price</label>
				<input type="text" name="price">
				<label>Image</label>
				<input type="file" name="prodimg" accept="image/*">
				<p><input type="submit" value="Submit"></p>
			</form>
		</div>
		<button id="opener" class="right">Add a New Product</button>
		<div id="dialog2" title="Edit Product">
			<form action="/editproduct" method="post">
				<label>Product Name</p>
				<input type="text" name="productname">
				<p>Description</p>
				<textarea name="proddesc"></textarea>
				<p>Categories</p>
					<select name="newcate">
						<option value=""></option>
						<option value="Paramecia">Paramecia</option>
						<option value="Logia">Logia</option>
						<option value="Zoan">Zoan</option>
					</select>
				<p>Image Upload</p>
				<input type="file" name="prodimg" accept="image/*">
				<input type="submit" value="Submit">
			</form>
		</div>
		<div>
			<table>
				<tr>
					<th>Picture</th>
					<th>Product ID</th>
					<th>Name</th>
					<th>Inventory Count</th>
					<th>Quantity Sold</th>
					<th>Action</th>
				</tr>
				<?php foreach ($allprod as $prod) { ?>
					<tr>
						<td><img id="productimages" src = <?= "/assets/image/" . $prod['image'] ?> alt = "" height="100" width="100"></td>
						<!-- <td><?= '<img src="data:image/png; base64,' . base64_encode($prod['image']) . '"/>'; ?></td> -->
						<td><?= $prod['id'] ?></td>
						<td><?= $prod['name'] ?></td>
						<td><?= $prod['quantity'] ?></td>
						<td>#</td>
						<td><a href="">Edit</a>    <a href="/deleterow/<?= $prod['id'] ?>">Delete</a></td>
					</tr>
				<?php } ?>
			</table>	
		</div>
	</div>
</body>
</html>