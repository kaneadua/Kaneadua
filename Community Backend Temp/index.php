<?php
// import composer's autoloader
require_once __DIR__ . "/vendor/autoload.php";
require_once "Controllers/MasterController.php";

// initialise leaf
$app = new Leaf\App;

//connect to database
$db_server = new mysqli('localhost','web', 'website','general_discussion');
if ($db_server->connect_error) die("Unable to connect to MySQL: " . $db_server->connect_error);


//get the GENERAL topics count on the homepage and the next page
$app->get('/general-discussion', function() use ($db_server,$app){

    $app->response()->json([
        "Gen. Disc. Topics count" => MasterController::display_topics_count($db_server)
    ]);

});

/// retrieve or filter all the topics posted
$app->match("GET|POST",'/retrieve-topics', function() use ($db_server,$app){

    $search_string = $app->request()->get("key");

  $app->response()->json([
      "Topics"=>MasterController::retrieve_or_filter_topics($db_server,$search_string)
  ]);
      //echo $app->request()->getHostWithPort();
    ////will come back to this to retrieve them in batches
});


//insert a new posted topic
$app->post('/insert',function () use($db_server,$app) {
    $author = $app->request()->get("author");
    $title = $app->request()->get("title");
    $details = $app->request()->get("details");
    $image =  $app->request()->files("image");
    $image += ["baseURl" =>$app->request()->getUrl()];

    $app->response()->json(["status"=>MasterController::insert_topics($db_server,$author,$title,$details,$image)]);

});

//$app->get("/test", function() use($app) {
//    $name = $app->request()->get("name");    ///will use this for extracting id's and things
//
//    $app->response()->json([
//        "name" => $name
//    ]);
//});


$app->get("/",function (){
    header("LOCATION: ./homepage/index.html");
});


$app->set404();

// run the defined routes
$app->run();