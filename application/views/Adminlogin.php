<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
</head>
<body>
	<?= $this->session->flashdata['errors'] ?>
	<?= $this->session->flashdata['success'] ?>
	<h2>Register to become an Admin!</h2>
	<form action="/register" method="post">
		<p>Name:</p>
		<input type="text" name="name">
		<p>Email:</p>
		<input type="text" name="email">
		<p>Password:</p>
		<input type="password" name="password">
		<p>Password Confirmation:</p>
		<input type="password" name="passwordconfirmation">
		<input type="submit" value="Register">
	</form>
	<h2>Login</h2>
	<form action="/login" method="post">
		<p>Email:</p>
		<input type="text" name="email">
		<p>Password:</p>
		<input type="password" name="lpassword">
		<input type="submit" value="Login">
	</form>
</body>
</html>