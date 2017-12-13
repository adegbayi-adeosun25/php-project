<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';
$app = new Itb\WebApplication();
$app->run();




use Itb\MainController;

define('DB_HOST','localhost:3306');
define('DB_USER', 'sam');
define('DB_PASS', 'ade');
define('DB_NAME', 'itb');

session_start();

print session_id();

$pageHits = 0;

// (2) if a variable "counter" is found inside $_SESSION then set it to this value
if (isset($_SESSION['counter'])){
    $pageHits = $_SESSION['counter'];
}

// (3) increment number of hits (since we are visiting this page again)
$pageHits++;

// (4) store new data in counter
$_SESSION['counter'] = $pageHits;

// (5) display message to user about current value
print "<p>Counter (number of page hits): $pageHits</p>";












