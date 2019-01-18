<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/9/2019
 * Time: 1:30 PM
 * Initiate fat free
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require fat-free
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn of fat free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    echo "<h1>My Pets</h1><br>";
    echo "<a href='order'>Order a Pet</a>";
});

//Route for animal type

$f3->route('GET /@animal', function($f3, $params) {
    $validAnimals = ['chicken','dog','cat'];
    $animal = $params['animal'];
    if(!in_array($params['animal'], $validAnimals)){
        echo "<h3>I do not know that animal </h3>";
    }else{
        switch($animal){
            case 'chicken':
                $sounds = "cluck!";break;
            case 'dog':
                $sounds = "woof!";break;
            case 'cat':
                $sounds = "meow!";
        }
        echo "<h3>The $animal says $sounds</h3>";
    }
    /*$view = new View();
    echo $view->render('views/.html');*/
});

//Run fat-free
$f3->run();
