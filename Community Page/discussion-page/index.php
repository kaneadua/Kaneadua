<!DOCTYPE html>
<html>
<head>
	<title>Discussion Page</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="/jquery.js" ></script>
	<script src="index.js"></script>
</head>
<body>
<section id="header">header</section>
<section class="section-1">
			<pre> <a href="../index.php">Kaneadua Community</a>  >>  <a href="../General Discussion/index.php">General Discussion</a>  </pre>
</section>
	<main>
		<div class="question_block" >
			<h1 id="title">Error encountered</h1><br><br>
			<p id="body">If you are seeing this , it means a strange error has occurred 😥 <br>
				Post your question again but this time, do so with simple characters <b>excluding</b> special symbols like semi-colons and other foreigns<br>
			Kindly contact the site developer if problem still persists  </p>
		</div>
		<div class="attr">
			<div id="author">🙋🏻‍♂️  Topic posted by xx</div>
			<div id="date">🕑 yy minutes ago </div>
			<div id="replies">🧛🏻‍♀️ zz replies</div>
		</div>
	</main>


	<hr>

	<section id="benchmark">

			<!-- <article class="replyers">
				<p id="fix">
				Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of </p>
				<div class="attr">
					<div id="author">🧛🏻‍♀️ sheriff </div>
					<div id="rep_date">🕑 4 seconds ago</div>
				</div>
			</article> -->


	</section>


	<section class="reply_box">
		<form id="form" method="POST">
			<textarea id="textarea" name="reply" style="display: none;"></textarea>
			<div id="bodyB" contentEditable=true spellcheck=true placeholder="write something interesting 🤩 . . ."
			onpaste="var e=this; setTimeout(function(){see_saw(e.innerText)},4);"></div>
			<br><br>
			<button>Reply</button>
		</form>
	</section>

</body>
</html>

<?php 
   
  require_once "../php/forum.php";
  require_once "../php/date.php"; 


  session_start();
  connect_database();
  
 if (isset($_GET["article"])) {
 	
 	$id = $_GET["article"];

 	getTopic($id);
 }

 if (isset($_POST["reply"])) {
 	
 	if (isset($_SESSION["username"])) {

 		$replyer = $_SESSION["username"];
 		$message = $_POST["reply"];
 		$title = $_SESSION["title"];
 			   
		insert_replies($title,$message,$replyer);
		echo "<meta http-equiv='refresh' content='0'>";
		 		
 	} else {
 		$_SESSION["temp"] = $_POST["reply"];
 		$_SESSION["pUrl"] = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
 		echo '<script>window.location="/dummy-login/index.php"</script>'; ///
 	}
 }
  
 ?>