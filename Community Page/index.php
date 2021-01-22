<!DOCTYPE html>
<html>
<head>
	
	<title>Community Page</title>
	<link rel="stylesheet" href="index.css">
	<script type="text/javascript" src="index.js"></script>

</head>
<body>
	

    <fieldset id="all-categories">

    	<center><div id="community">
		<p>kaneadua community</p>
		<input type="text" placeholder="search community" id="search">
	</div></center>
    	<div>

	<p>Welcome to the Kaneadua community! The first African video-games digital marketplace, please take a moment to review our <a href="Community rules page/index.html">community guidelines.</a></p>

	<p id="categories"><a href="">All Categories</a><a href="">Recent posts</a><hr id="hr"></p>
	<section>
		<p>General</p>
	</section>

	<h2><a href="General Discussion/index.php">General Discussion </a><span id="GeneralDiscussion">44</span></h2><br>
	<p id="about"> 
		Talk about things that don't quite fit into the other categories
	</p><hr>
	<h2><a href="#">Recommend a Game</a></h2><br>
	<p id="about"> 
		Share cool things you like that you've found on Kaneadua.com
	</p>
	<section>
		<p><a href="#">Kaneadua.com</a></p>
	</section>
	<h2><a href="#">Questions and support</a></h2><br>
	<p id="about"> 
		Ask the community for help.
	</p><hr>
	<h2><a href="#">Ideas & Feedback</a></h2><br>
	<p id="about"> 
		Requests or feedback about how kaneadua.com works
	</p><hr>
	<h2 id="odd"><a href="#">Kaneadua app Development</a></h2><br>
	<p id="about"> 
		Watch Closely as the kaneadua app is been developed, report bugs & make suggestions.
	</p><hr>
	<h2><a href="#">kaneadua.com tips</a></h2><br>
	<p id="about"> 
		Find out to tips to make kaneadua.com easy to use.
	</p>

	<section>
		<p><a href="#">Game Development</a></p>
	</section>
	<h2><a href="#">Release Announcements</a></h2><br>
	<p id="about"> 
		Announce and promote your own projects here
	</p><hr>
		<h2><a href="#">Devlogs</a></h2><br>
	<p id="about"> 
		Making something? Share your progress and get feedback
	</p><hr>
	<h2><a href="#">General Development</a></h2><br>
	<p id="about"> 
		Tools, techniques, and other ideas around game development
	</p><hr>
	<h2><a href="#">Get Feedback</a></h2><br>
	<p id="about"> 
		Ask for feedback on your projects and kaneadua.com pages
	</p><hr>
	<h2><a href="#">Help Wanted or Offered</a></h2><br>
	<p id="about"> 
Looking to collaborate? Request for help or offer your services by making a topic
	</p>
	<section>
		<p><a href="#">Creativity & Art</a></p>
	</section>
	<h2><a href="#">2D Art</a></h2><br>
	<p id="about"> 
Discuss and share 2d creations, such as drawing and pixel art
	</p><hr>
	<h2><a href="#">3D Art</a></h2><br>
	<p id="about"> 
Discuss and share 3d models, texturing, or anything else related
	</p><hr>
	<h2><a href="#">Music & Audio</a></h2><br>
	<p id="about"> 
Post tunes to share, and general discussion about music and sound
	</p>


</div>

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