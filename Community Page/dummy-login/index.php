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
		h1,h3{
			text-align: center;
			font-family: monospace;
			font-weight: bold;
			text-transform: capitalize;
		}

	</style>
</head>
<body>
	<h1>Please Log-in First 👻 </h1>
	<h3>Use any random ID for now 🥰</h3>
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
	require_once "../php/forum.php";
	require_once "../php/date.php"; 


	  session_start();
	  connect_database();


if(isset($_POST["username"]))
{
	
		$_SESSION["username"] = $_POST['username'];

		if ($_SESSION["temp"] != "") {

			insert_replies($_SESSION["title"],$_SESSION["temp"],$_SESSION["username"]);
			$_SESSION["temp"] = "";
			
			if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") 
				$url = "https://";
		    else $url = "http://";

			$url .= $_SESSION['pUrl']; 
			

			echo "<script>document.location=\"$url\"</script>";

		} else echo "<script>document.location='/new-post/index.php'</script>";
	
}

 ?>