<?php 
	
    $db_server;

	function connect_database(){
		global $db_server;

	    $db_server = new mysqli('localhost','web', 'website');
		if ($db_server->connect_error) die("Unable to connect to MySQL: " . $db_server->connect_error);
		
		$query = "CREATE DATABASE IF NOT EXISTS general_discussion";


		if(!$db_server->query($query))
			die('<h1 style="position:absolute;top:0;left:0;color:green;">server prevented you from creating database</h1>');


		$db_server->select_db("general_discussion");

		$query = 'CREATE TABLE IF NOT EXISTS topic(
											id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
											author VARCHAR(50),
											title VARCHAR(250),
											details VARCHAR(2000),
											date_created TIMESTAMP,
											INDEX(author(10)),
											FULLTEXT(title),
											FULLTEXT(details)
											) ENGINE MyISAM';

		$db_server->query($query);




		$query = 'CREATE TABLE IF NOT EXISTS reply(
											id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
											title VARCHAR(250),
											message VARCHAR(1000),
											replyer VARCHAR(50),
											date_replied TIMESTAMP,
											FULLTEXT(title),
											FULLTEXT(message)
											) ENGINE MyISAM';

		$db_server->query($query);



		// $query = 'CREATE TABLE IF NOT EXISTS comment(
		// 									id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
		// 									reply VARCHAR(1000),
		// 									message VARCHAR(500),
		// 									date_commented DATETIME,
		// 									FULLTEXT(reply),
		// 									FULLTEXT(message)
		// 									) ENGINE MyISAM';


		// $db_server->query($query);
		
	}

    function insert_topics($author,$title,$details){
       global $db_server;

       $query="INSERT INTO topic(author,title,details) VALUES(\"$author\",\"$title\",\"$details\")";

       $db_server->query($query);
    }

    function insert_replies($title,$message,$replyer){
    	global $db_server;

    $query="INSERT INTO reply(title,message,replyer) VALUES(\"$title\",\"$message\",\"$replyer\")";

    $db_server->query($query);

    }

	function display(){
		global $db_server;

		$query = 'SELECT * FROM topic';
		$result = $db_server->query($query);
		$count=$result->num_rows;

		echo "<script>general_discussion_topics($count);</script>";

	}


	function load_topics(){
		global $db_server;

		$query = 'SELECT * FROM topic ORDER BY id DESC';
		$result = $db_server->query($query);
		$count = $result->num_rows;

		for($j=0;$j<$count;++$j) 
	      	  {   


	      	   $result->data_seek($j);  
	      	   $row = $result->fetch_array(MYSQLI_ASSOC);

	      	   $id = $row['id']; ///search id appended to url;
	      	   $title = $row['title']; ///topic title
	      	   $author= "posted by ".$row['author']; ///topic author
	      	   

	      	   $query = "SELECT * FROM reply WHERE title = \"$title\"";
	      	   $result2 = $db_server->query($query);
	      	   $number_of_replies = $result2->num_rows;  
	      	   $result2->data_seek($number_of_replies-1);

	      	   $row= $result2->fetch_array(MYSQLI_ASSOC);
	      	   $replyer = $row['replyer'] ? $row['replyer'] : "awaiting reply"; //////latest replyer
	      	   $date_replied =$row['date_replied'];            
	      	   $date_replied=ago($date_replied); //replied date
	      	   $number_of_replies.= $number_of_replies > 1 ? " replies": " reply";  ///number of replies
	      	   
			   echo "<script>load_topics_parser($id,\"$title\",\"$author\",\"$number_of_replies\",\"$replyer\",\"$date_replied\");</script>";
	          } 

	}


	function getTopic($id){  ///////discussion-page main topic
		global $db_server;

		$query = "SELECT * FROM topic WHERE id = \"$id\"";
		$result = $db_server->query($query);
		$result->data_seek(0);
		$row = $result->fetch_array(MYSQLI_ASSOC);

		$title = $row['title'];
		$author= "Topic posted by ".$row['author'];
		$details=$row['details'];
		$date_created=ago($row['date_created']);


		$query = "SELECT * FROM reply WHERE title = \"$title\"";
	    $result2 = $db_server->query($query);
	    $number_of_replies = $result2->num_rows;
	    $number_of_replies.= $number_of_replies > 1 ? " replies": " reply";

	    echo "<script>get_topic_parser(\"$title\",\"$author\",\"$details\",\"$date_created\",\"$number_of_replies\")</script>";

	    fetch_replies($title);

	}

	function fetch_replies($title){
		global $db_server;
		$_SESSION["title"] = $title;

		$query = "SELECT * FROM reply WHERE title = \"$title\" ORDER BY id DESC";
		$result = $db_server->query($query);
		$count = $result->num_rows;

		for($j=0;$j<$count;++$j) 
	      	  {   
	      	   $result->data_seek($j);  
	      	   $row = $result->fetch_array(MYSQLI_ASSOC);
	      	   $message = $row['message'];  /// replied message
	      	   $replyer = $row['replyer'];  /// replier
	      	   $date_replied= ago($row['date_replied']);  ///replied date

	      	   echo "<script>load_replies_parser(\"$message\",\"$replyer\",\"$date_replied\");</script>";

	      	  }
	}


 	function createTopicPermission(){
 			 session_start();
 			  if (isset($_SESSION['username'])) return 1;
 			      else return 0;
 			 

 			  }

	 if(isset($_POST["function"])){

	 if($_POST["function"]=='createTopicPermission'){
	   $aResult = array();

	   $aResult['result'] = createTopicPermission();

	   echo json_encode($aResult);

	}
	}
	
 ?>