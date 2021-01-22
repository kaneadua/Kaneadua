<!DOCTYPE html>
<html>
<head>
	<title>Create a new Topic</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
	<script src="/jquery.js"></script>
	<script src="index.js"></script>
</head>
<body>
	<section>header</section>

	<main>

		<h2>Post a new Topic</h2>
		<form id="form" method="POST">
			<label for="title">Title</label>
			<input autofocus required placeholder="type the title for the topic" type="text" name="title" id="title">
			<br><br><br><br><br><br>
			<textarea id="textarea" name="details" style="display: none;"></textarea>
			<label for="body"><u>Body</u></label>
			<br><br><br>
			<div id="body" contentEditable=true spellcheck=true placeholder="begin explaining yourself 🤪 . . ." ></div>
			<br><br>
			<button>Post</button>
		</form>
		
	</main>

</body>
</html>

<?php 
require_once "../php/forum.php";

session_start();
connect_database();

	if ($_SESSION["username"]!=null){

		if(isset($_POST['title']) && isset($_POST['details'])){
			$author= $_SESSION['username'];
			$title = $_POST['title'];
			$details=$_POST['details'];
			insert_topics($author,$title,$details);
			echo  '<script>window.location="/General Discussion/index.php"</script>';
		}
	} else echo  '<script>window.location="/index.php"</script>';
 ?>