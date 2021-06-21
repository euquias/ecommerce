<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Slim\App;
use \Hcode\page;
use \Hcode\PageAdmin;
use Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
$page = new page();
$page->setTpl("index");


});
$app->get('/admin', function() {
	$page = new PageAdmin();
	$page->setTpl("index");
});

$app->get('/admin/login', function() {
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false]);
	$page->setTpl("login");
});

//post de entrada
$app->post('/admin/login', function() {
	User::login($_post["login"], $_post["password"]);
	header("Location: /admin");
});

$app->run();

 ?>