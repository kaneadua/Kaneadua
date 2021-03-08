<?php
// import composer's autoloader
require __DIR__ . "/vendor/autoload.php";
require "Controllers/MasterController.php";

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



$app->get("/test", function() use($app) {
    $name = $app->request()->get("name");    ///will use this for extracting id's and things

    $app->response()->json([
        "name" => $name
    ]);
});


$app->get("/",function (){
    header("LOCATION: ./homepage/index.html");
});


$app->set404();

// run the defined routes
$app->run();