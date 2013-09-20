<?php
$auth = new Auth($db);
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

$userStyle = '';
$brandName = 'code.svenz.lv';

if ($page == 'logout') {
	$auth->id = 0;
	$_SESSION['auth_id'] = 0;
	session_destroy();
	header('Location: /');
}

if (isset($_POST['login'])) {

	if (isset($_POST['loginusername']) && isset($_POST['loginpassword'])) {
		$auth->login($_POST['loginusername'], $_POST['loginpassword']);
	}

}

if (isset($_POST['register'])) {
	
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['displayname']) && isset($_POST['email']) && isset($_POST['confirmpassword'])) {
	
		$loginName = $db->real_escape_string($_POST['username']);
		$displayName = $db->real_escape_string($_POST['displayname']);
		$email = $db->real_escape_string($_POST['email']);
		$passwd = $auth->pwd($_POST['password']);
		$confirmPasswd = $auth->pwd($_POST['confirmpassword']);

		if (($passwd == $confirmPasswd)) {
		
			$register = $db->query("INSERT INTO `users` (`username`,`email`,`displayname`,`password`,`created`) VALUES ('$loginName', '$email', '$displayName', '$passwd', NOW())");
	
		}
	
	}
	
	if ($register) {
		$_SESSION['error'] = 'successfullyRegistered';
	}
	
}

if ($auth->error == '1') {
	$_SESSION['error'] = 'incorrectLogin';
}

if ($auth->error == '99') {
	$_SESSION['error'] = 'welcomeBack';
}