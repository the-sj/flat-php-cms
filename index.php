<?php
error_reporting(E_ALL);
session_start();
require('classes/class.mdb.php');
require('classes/class.auth.php');
require('components/db_connect.php');
$serverRoot = '/var/www/code.svenz.lv/';
$db = new mdb(DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER); $db->query("SET NAMES utf8");
$page = $_GET['1'];
if (!isset($_GET['1'])) { $textID = 'index'; } else { $textID = $db->real_escape_string($_GET['1']); }
$getPage = $db->query("SELECT * FROM `cat` WHERE `textid` = '$textID'");
$fetchFlags = $getPage->fetch_object();
$pageID = $fetchFlags->id;
if (!empty($fetchFlags)) {
		define('LAYOUT', $fetchFlags->layout);
		define('MODULE', $fetchFlags->module);
		define('PAGE', $fetchFlags->page);
		require('components/functions.php');
		require('modules/'.MODULE.'.php');
		require('layouts/'.LAYOUT.'.php');
}
else {
		$_SESSION['error'] = 'notFound';
		header('Location: /');
		
}
# $_SERVER['REQUEST_URI'];
?>