<?php
// autoloader& other functions to include
// ---------------------------------------
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/utility/helperFunctions.php';

// load all our Silex / Twig setup etc.
require_once __DIR__ . '/../app/config.php';



// the DatabaseManager class needs the following 4 constants to be defined in order to create the DB connection
define('DB_HOST','localhost');
define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'itb');

// get all products from DB as array of Product objects
//$products = Hdip\Model\Product::getAll();

// outputs something like:
//  hammer, nail, nuts, bolts
foreach ($products as $product){
    print $product->getDescription() . ', ';
}

//-------------------------------------------
// map routes to controller class/method
//-------------------------------------------

$app->get('/',      controller('Hdip\Controller', 'main/index'));
$app->get('/members',      controller('Hdip\Controller', 'main/members'));
$app->get('/projects',      controller('Hdip\Controller', 'main/projects'));
$app->get('/publications',      controller('Hdip\Controller', 'main/publications'));



// ------ ADMIN PAGES ----------
$app->get('/admin',  controller('Hdip\Controller', 'admin/index'));
$app->get('/adminCodes',  controller('Hdip\Controller', 'admin/codes'));

// ------ STUDENT PAGES ----------
$app->get('/admin',  controller('Hdip\Controller', 'admin/indexStudent'));
$app->get('/adminStudent',  controller('Hdip\Controller', 'admin/studentPage'));


// ------ MEMBERS PAGES ----------
$app->get('/admin',  controller('Hdip\Controller', 'admin/indexMembers'));
$app->get('/adminMember',  controller('Hdip\Controller', 'admin/members'));




// ------ login routes GET ------------
$app->get('/login',  controller('Hdip\Controller', 'user/login'));
$app->get('/logout',  controller('Hdip\Controller', 'user/logout'));

// ------ login routes POST (process submitted form)     ------------
$app->post('/login',  controller('Hdip\Controller', 'user/processLogin'));


// go - process request and decide what to do
//---------------------------------------------
//$app['debug']=true;
$app->run();
