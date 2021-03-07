<?php
// import composer's autoloader
require __DIR__ . "/vendor/autoload.php";

// initialise leaf
$app = new Leaf\App;

$app->get('/', function() use($app) {
    // response is initialized with leaf
    $app->response()->json([
        "message" => "Welcome to Ghana"
    ]);
});

$app->get("/test", function() use($app) {
    $name = $app->request()->get("name");

    $app->response()->json([
        "name" => $name
    ]);
});

$app->set404();

// run the defined routes
$app->run();