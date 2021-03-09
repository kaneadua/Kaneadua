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

//loading a particular topic to start a discussion
$app->get("/discussion-page",function () use ($app,$db_server){
    $id = $app->request()->get("id");

    $corresponding_topic=MasterController::start_discussion_topic($db_server,$id)["title"];

    $app->response()->json([
       "discussion-topic"=>MasterController::start_discussion_topic($db_server,$id),
       "replies to the topic"=>MasterController::discussion_topic_replies($db_server,$corresponding_topic)
    ]);

});


//update the details of the topic
$app->put("/update", function() use($app,$db_server) {
    $id = $app->request()->get("id");
    $details = $app->request()->get("details");
    $image =  $app->request()->files("image");
    $image += ["baseURl" =>$app->request()->getUrl()];

    $app->response()->json(["status"=>MasterController::update_topic($db_server,$id,$details,$image)]);
});


$app->get("/",function (){
    header("LOCATION: ./homepage/index.html");
});


$app->set404();

// run the defined routes
$app->run();