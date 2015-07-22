<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Products</title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	  $(document).ready(function() {
	    $( "#dialog" ).dialog({
	      autoOpen: false,
	    });
	 
	    $( "#opener" ).click(function() {
	      $( "#dialog" ).dialog( "open" );
	      return false;
	    });
	  });
  </script>
</head>
<body>
	<div class="container">
		<div class="navlinks">
			<ul>
				<li><a href="">Dashboard</li>
				<li><a href="">Orders</li>
				<li><a href="/productedit">Products</li>
			</ul>
			<ul>
				<li><a href="/logoff">Log Off</li>
			</ul>
		</div>
		<div class="searchbar">
			<form action="" method="post">
				<input type="search" placeholder="Search">
			</form>
		</div>
		<div id="dialog" title="Add a new product">
			<form action="" method="post">
				<p>Product Name</p>
				<input type="text" name="productname">
				<p>Description</p>
				<textarea name="proddesc"></textarea>
				<p>Categories</p>
					<select>
						<option value="Paramecia">Paramecia</option>
						<option value="Logia">Logia</option>
						<option value="Zoan">Zoan</option>
					</select>
				<p>or add a new category</p>
				<input type="text" name="newcate">
				<p>Image Upload</p>
				<input type="file" name="prodimg" accept="image/*">
				<input type="submit" value="Submit">
			</form>
		</div>
		<button id="opener">Add a New Product</button>
		<div class="orderdash">
			<tr>
				<th>Order ID</th>
				<th>Name</th>
				<th>Date</th>
				<th>Billing Address</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</div>
	</div>
</body>
</html>