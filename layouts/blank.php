<?php
if ($page == 'loadmodal') {
	$type = $_GET['2'];
	$userID = $_GET['3'];
	echo loadUserModal($type, $userID);
}