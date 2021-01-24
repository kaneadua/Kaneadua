<!DOCTYPE html>
<html>
<head>
	
	<title>Community Page</title>
	<link rel="stylesheet" href="index.css">
	<script type="text/javascript" src="index.js"></script>

</head>
<body>
	<div id="header">header</div>

    <fieldset id="all-categories">

    	<center id="community">
		           <p>kaneadua community</p>
		</center>


    	<div>

	<p>Welcome to the Kaneadua community! The first African video-games digital marketplace, please take a moment to review our <a href="Community rules page/index.html">community guidelines.</a></p>

	<section>
		<p><a href="General Discussion/index.php">General</a></p>
	</section>

	<h2><a href="General Discussion/index.php">General Discussion </a><span id="GeneralDiscussion">44</span></h2><br>
	<p id="about"> 
		Talk about things that don't quite fit into the other categories
	</p><hr>
	<h2><a href="recommend.html">Recommend a Game</a></h2><br>
	<p id="about"> 
		Share cool things you like that you've found on Kaneadua.com
	</p>
	<section>
		<p><a href="https://www.kaneadua.com">Kaneadua.com</a></p>
	</section>
	<h2><a href="qns.html">Questions and support</a></h2><br>
	<p id="about"> 
		Ask the community for help.
	</p><hr>
	<h2><a href="inf.html">Ideas & Feedback</a></h2><br>
	<p id="about"> 
		Requests or feedback about how kaneadua.com works
	</p>

	

</fieldset>

</body>
</html>



<!-- /////////////////////////////////////////////////////////// -->

<?php 
  require_once 'php/forum.php'; 
  
  connect_database();
   display();
 ?>

 <!-- /////////////////////////////////////////////////////////// -->