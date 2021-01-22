<!DOCTYPE html>
<html>
<head>
	<title> Online Dictionary </title>
	<link rel="icon"  href="icon.png">
	<style type="text/css">

		body{
			
			width: 960px;
			margin: 0px auto;
			background-color: #fad285;

	            }
		.form{
			text-align: center;	 
			position: fixed;
			left: 0px;
			top: 0px;
			right: 0px;
			background-color: #fad285;
			z-index: 1
			padding:10px;

		}		
		
		.word{

			text-align: center;
			margin: 30px auto 30px auto;
			font-weight: bold;
			background-color: #e7e694;
			margin: 200px 5px 5px 5px ;
			border-radius: 20px;
			padding: 10px;
		}
		 p{
		 	font-weight: bolder;
		 }		 

		 input {
		 	font-size: 120%;
		 	border:2px solid #bdbdbd;
		 	border-radius: 5px;
		 	padding: 5px 5px 5px 5px;
		 	margin-right: 20px;
		 } 

		  input:hover{
		 	background-color:#aea593;
		 	border:2px solid #b1e1e4;
		 }

		 .input{
            color:blue;
		 	background-color: #f2f2f2;
		 }

		 a{

		 	text-decoration: none;
		 	color: green;
		 	font-weight: bold;
		 	font-size: 30px;

		 }

		

	</style>
</head>
<body>

   <div class="form">

  <form method="post" action=""> 
        <p><h2>Search Words </h2></p> <input class="input" required type="Search" name="word" placeholder="english words only">    
         <input type="submit" value="Find">     
         <br>
         <br>
         <hr>
   </form> 

  </div>



 <div class="word">
<?php 
  
  require_once 'login.php'; 

  $db_server = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($db_server->connect_error) die("Unable to connect to MySQL: " . $db_server->connect_error);

 
   
   if (isset($_POST["word"]))

      {
      	$word=$_POST["word"];
      	echo " <h1><u>"."$word"."</u></h1><br><br>";

 
	 $query ="SELECT definition FROM entries WHERE word=\"$word\"";

	 $result = $db_server->query($query);
	 
	  if (!$result) die ("Database access failed: " . $db_server->connect_error); 
	 
	      $rows=$result->num_rows;

	      if (!$rows) echo "Word Not Found,check your spellings and try again";

	      for($j=0;$j<$rows;++$j) 
	      	  {   

	      	   $result->data_seek($j);  
	      	   $row = $result->fetch_array(MYSQLI_ASSOC);
	           echo  "<p> ". $row['definition']." </p>";
	          }  
               
	           $result->close(); 
       }

	  
	   $db_server->close();


  ?>

    </div>

    <div class="video">
       <br>
       <br>
       <br>

    	<marquee direction="right" behavior="alternate" scrolldelay="65">

         <a href="download.html">  Click Me To Watch A Quick Movie   </a>

    	</marquee>
    </div>

</body>
</html>




