

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="HandleIdFriendly" content="true">
	<title>Community Page</title>
	<link rel="stylesheet" href="index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
	<script src="/jquery.js"></script>
	<script src="index.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {

		    $("#newTopicButton").click(function() { 
		    	
		    	console.log("button clicked");
		    	var a;
		    	jQuery.ajax({
		    		type: "POST",
		    		url: '/php/forum.php',
		    		dataType: 'json',
		    		data: {function:'createTopicPermission'},
		    		success: function(obj,textstatus){
		    			if( !('error' in obj) ){
		    				a = obj.result;
		    				console.log(a);
		    				if(!a) window.location="/dummy-login/index.php";
		    					else window.location="/new-post/index.php"
		    			}
		    			  else console.log(obj.error);
		    		}

		    	});

		     });
   
   });</script>

</head>
<body>
	<section id="header">header</section>


	<div class="content_minus_header">
		
		<section class="section-1">
			<pre> <a href="../index.php">Kaneadua Community</a>  >>  <a href="../General Discussion/index.php">General Discussion</a>  </pre>
</section>

		<section class="section-2">
			<div id="first"><p>General Discussion</p></div>
			<div id="second">
				<form action="" method="POST">
					<input type="search" placeholder="search community">
					<button >Search</button>
				</form>
			</div>
			<div id="third">
				<button id="newTopicButton">New Topic</button>
			</div>
			<div id="fourth">
				<p id="topicount">18 topics</p>
			</div>
		</section>

		<section id="container" class="section-3 fade">
			<p >Anything that doesn't fit anywhere else. This board is not for kaneadua.com support with your account or purchases. Please see <a href="">https://kaneadua.com/support.</a></p>
			<p style="font-weight: bold;">Rules</p>
			<p>Talk about anything that doesn't have already have a specific category for. If you post here without looking at the other boards first we may close or move your topic. You can post in:</p>

			<ul>
				<li><a href="">Release announcements</a> for sharing game announcements</li>
				<li><a href="">Questions & Support</a> ask the community for help related to your kaneadua.com account or projects</li>
				<li><a href="">Get feedback</a> for asking for feedback for your project or ideas</li>
				<li><a href="">General development</a> for game development questions</li>
				<li><a href="">Help wanted </a> if you're looking for game development help from other members of the community</li>
				<li><a href="">Ideas & feedback</a> if you're having trouble with kaneadua.com, or have an idea</li>
			</ul>

			<p>If your post is just a link to your content with no text then it will be locked.</p>
			<p>These boards are for all of kaneadua.com, not a specific game.<b> If you're trying to reach the developer of a game please head to their game page to find their contact information.</b></p>

			<p><b>This board is not for support with your account or purchases.<b> Please either <a href="" >contact support </a>directly or post in the <a href="">Questions & Support</a></p>

		    <p><em>SELF PROMOTION:</em></p>

		    <ul>
		    	<li>If you're advertising a game, then don't post here. Use the <a href=""> Release Announcements </a> board to self promote your kaneadua.com projects. Follow the rules there when posting.</li>
		    	<li>Advertising links to your discords/twitch/etc. not allowed</li>
		    	<li>Game jams can be shared in the <a href="">jams forum</a></li>
		    	<li>If you're providing a free service for game developers or players then you can post it. If it's not a good fit then we'll archive the topic</li>
		    </ul>
		</section>

		<div id="toggler" >
			<a id= "togscreen" onclick="showHide();">Show </a>
		</div>

		<section class="section-4">
			<article class="replyheader"> 
				<div id="t">Topics</div>
				<div id="r">Latest Reply <div>
			</article>

			<!-- <a class="queries_wrapper" href="">
				<article class="queries">
				<div id="a">
					<div class="texts">
						<span id="topic_title">How do I change the screen overlay of the shader effects in opengl v3.2 </span>
					</div>
				</div>
				<div id="b">

					<div class="texts normal">
						<span id="topic_replies">15 replies </span><br><br>
						<span id="topic_author">posted by <b>paddy_pyker</b> </span>
					</div>
				</div>
				<div id="c">

					<div class="texts">
						<span id="last_replyer">Latif </span><br><br>
						<span id="last_replyer_time" class="normal">30 mins ago</span>
					</div>
					
				</div>				
			</article>
		</a> -->
			
		</section>

	</div>

    



</body>
</html>


<?php 
   
  require_once "../php/forum.php";
  require_once "../php/date.php"; 

  connect_database();
  display();
  load_topics();
  
 ?>



