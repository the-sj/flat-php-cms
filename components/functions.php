<?php
function includeError($errorID) {
	global $db;
	global $auth;
	/*
	$getError = $db->query("SELECT * FROM `alerts` WHERE `error_id` = '$errorID'");
	$fetchError = $getError->fetch_object();
	if ($fetchError->type == 'error') { $type = 'alert-error'; } else { !$type; }
	if (!empty($fetchError)) {
	return '<div class="alert '.$type.' alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">'.$fetchError->title.'</h4>
  			<p>'.$fetchError->content.'</p>
			'.$fetchError->additional.'
		</div>';
	}
	*/

	switch($errorID) {
		case 'notFound':
		$message = '

		<div class="alert alert-error alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Page not found</h4>
  			<p>How did you get there? o_0</p>
			<a href="#errorReport" role="button" class="btn btn-info" data-toggle="modal">Contact administrator</a>
		</div>

		';

		$modal = '
			<div id="errorReport" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Report an error</h3>
				</div>
				<form method="post">
					<div class="modal-body text-center">
						<p>Error code you got: #notFound</p>
						<textarea style="width: 95%;">Type exactly what you were doing when you encouraged this error.</textarea>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button type="submit" name="submit" class="btn btn-primary">Send error report</button>
					</div>
				</form>
			</div>
		';
		break;

		case 'underConstruction':
		$message = '		
		<div class="alert alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Under construction</h4>
  			<p>This page is under construction. Something may not work. :/</p>
		</div>';
		$modal = ''; break;

		case 'permissionDenied':
		$message = '		
		<div class="alert alert-error alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Access denied</h4>
  			<p>You have no rights to access specified page.</p>
		</div>';
		$modal = ''; break;

		case '420':
		$message = '		
		<div class="alert alert-error alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Unspecified error #420</h4>
  			<p>blaze it ?</p>
		</div>';
		$modal = ''; break;
		
		case 'incorrectLogin':
		$message = '		
		<div class="alert alert-error alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Authentification error</h4>
  			<p>Incorrect username or password.</p>
		</div>';
		$modal = ''; break;

		case 'successfullyRegistered':
		$message = '		
		<div class="alert alert-success alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Account created</h4>
			<p>Account successfully created!</p>
		</div>';
		$modal = ''; break;
		
		case 'loggedOut':
		$message = '		
		<div class="alert alert-success alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Logged out</h4>
			<p>You have logged out.</p>
		</div>';
		$modal = ''; break;
		
		case 'welcomeBack':
		$message = '		
		<div class="alert alert-success alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">Logged in</h4>
			<p>Successfully logged in!</p>
		</div>';
		$modal = ''; break;
		
		case 'notLoggedIn':
		$message = '		
		<div class="alert alert-block fade in">  
  			<a class="close" data-dismiss="alert">×</a>  
  			<h4 class="alert-heading">You are not logged in</h4>
  			<p>While you can browse this page, some features, like comments, are available only to logged-in users.</p>
  			<a href="#logInWindow" role="button" class="btn" data-toggle="modal">Login</a>
  			<a href="#registerWindow" role="button" class="btn btn-info" data-toggle="modal">Register</a>
		</div>';
		$modal = ''; break;


	}

	return $message.$modal;

		
}

include($serverRoot.'components/menubar.php');
include($serverRoot.'components/modal.php');