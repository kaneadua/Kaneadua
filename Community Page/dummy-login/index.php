<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style type="text/css">
		div{
			width: 30%;
			position: relative;
			background-color: #F7EDE4;
			height: 7em;
			margin: 150px auto;
			display: flex;
			padding: 4em;
			border-radius: 1em;

		}
		body{
			background-color: pink;
		}
		h1{
			text-align: center;
			font-family: monospace;
			font-weight: bold;
			text-transform: capitalize;
		}

	</style>
</head>
<body>
	<h1>Sign in with any name you wish to use for the site</h1>
<div>

	<form method="POST" action="">
		<label for="name"><b>Username:</b></label>
		<input id="name" type="text" name="username" required>
		<br><br><br>
		<button>Sign In</button>
	</form>
</div>
</body>
</html>

<?php
session_start();

if(isset($_POST["username"]))
{
	
		$_SESSION['username'] = $_POST[username];
		echo "<script>document.location='/General Discussion/index.php'</script>";
	
}

 ?>