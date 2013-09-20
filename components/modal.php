<?php

function loadModal($modal) {

	global $auth;
	global $db;
	global $_SESSION;

	switch($modal) {
		case 'errorReport':
		echo '
			<div id="'.$modal.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Report an error</h3>
				</div>
				<form method="post">
					<div class="modal-body text-center">
						<p>Your username: {userName}</p>
						<p>Error code you got: #{sessionAlertID}</p>
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

		case 'modalTest':
		echo '
			<div id="'.$modal.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>trolo u got mastertroled</h3>
				</div>
				<div class="modal-body">
					<p>master trole 2k13</p>
				</div>
				<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button type="submit" name="submit" class="btn btn-primary">OK</button>
				</div>
			</div>
		';
		break;

		case 'adminRecovery':
		echo '
			<div id="'.$modal.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Recover your account</h3>
				</div>
				<form method="post">
					<div class="modal-body text-center">

									<input name="email" type="text" style="width: 95%" placeholder="Your e-mail" /><br />


									<textarea style="width: 95%">Type in everything we should know. We\'ll contact you.</textarea>

							
						</div>

					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button type="submit" name="submit" class="btn btn-primary">Send</button>
					</div>
				</form>
			</div>
		';
		break;

		case 'logInWindow':
		echo '
			<div id="'.$modal.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Log in</h3>
				</div>
				<div class="modal-body">
					    <ul class="nav nav-tabs">
							<li><a href="#local" data-toggle="tab">code.svenz.lv</a></li>
							<li><a href="#twitter" data-toggle="tab">twitter</a></li>
							<li><a href="#facebook" data-toggle="tab">facebook</a></li>
							<li><a href="#draugiem" data-toggle="tab">draugiem.lv passport</a></li>
						</ul>
				</div>
								
				<div class="tab-content">

				<div class="tab-pane active" id="local">
					<form method="post" action="/">
						<div class="modal-body">
							<div class="container-fluid">
								<div class="row-fluid">
									<div class="span6">
										<input name="loginusername" type="text" placeholder="Login Name" />
									</div>
									<div class="span6">
										<input name="loginpassword" type="password" placeholder="Password" />
									</div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="submit" name="login" class="btn btn-info">Log In</button>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						</div>
					</form>
				</div>
				
				<div class="tab-pane" id="twitter">
					<div class="modal-body">
						<div class="alert alert-info alert-block fade in">  
							<a class="close" data-dismiss="alert">×</a>  
							<p>Coming soon.</p>
						</div>					
					</div>
						<div class="modal-footer">
							<a class="btn btn-info" href="/twitterlogin">Log in with Twitter</a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						</div>
					</div>
					
				<div class="tab-pane" id="facebook">
					<div class="modal-body">
						<div class="alert alert-info alert-block fade in">  
							<a class="close" data-dismiss="alert">×</a>  
							<p>Coming soon.</p>
						</div>					
					</div>
					<div class="modal-footer">
						<a class="btn btn-info" href="/facebooklogin">Log in with Facebook</a>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
					</div>
				</div>
					
				<div class="tab-pane" id="draugiem">
					<div class="modal-body">
						<div class="alert alert-info alert-block fade in">  
							<a class="close" data-dismiss="alert">×</a>  
							<p>Coming soon.</p>
						</div>					
					</div>
					<div class="modal-footer">
						<a class="btn btn-info" href="/draugiemlogin">Log in with draugiem.lv</a>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
					</div>
				</div>
				
				</div>
			</div>
		';
		break;
		
		
		case 'registerWindow':
		echo '
			<div id="'.$modal.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Create an account</h3>
				</div>
				<form method="post" action="/">
					<div class="modal-body">
					<div class="alert alert-info alert-block fade in">  
						<a class="close" data-dismiss="alert">×</a>  
						<p>You can also log in with your twitter account, facebook account, or draugiem.lv passport.</p>
					</div> 
					<div class="alert alert-info alert-block fade in">  
						<a class="close" data-dismiss="alert">×</a>  
						<p>
						Login name cannot be changed.<br />
						Login name is not seen by other users, other users see only your display name.<br />
						</p>
					</div>

						<div class="container-fluid">
						
							<div class="row-fluid">
								<div class="input-prepend">
									<div class="span12" style="width: 455px;">
										<span class="add-on" style="width: 20px;"><i class="icon-key"></i></span>
										<input name="username" style="width: 425px;" type="text" placeholder="Login Name" />
									</div>
								</div>
							</div>
							
							<div class="row-fluid">
								<div class="input-prepend">
									<div class="span12" style="width: 455px;">
										<span class="add-on" style="width: 20px;"><i class="icon-envelope"></i></span>
										<input name="email" style="width: 425px;" type="text" placeholder="E-Mail" />
									</div>
								</div>
							</div>
			
							<div class="row-fluid">
								<div class="input-prepend">
									<div class="span12" style="width: 455px;">
										<span class="add-on" style="width: 20px;"><i class="icon-user"></i></span>
										<input name="displayname" style="width: 425px;" type="text" placeholder="Display Name" />
									</div>
								</div>
							</div>
							
							<div class="row-fluid">
								<div class="input-prepend">
									<div class="span12" style="width: 455px;">
										<span class="add-on" style="width: 20px;"><i class="icon-lock"></i></span>
										<input name="password" style="width: 425px;" type="password" placeholder="Password" />
									</div>
								</div>
							</div>
							
							<div class="row-fluid">
								<div class="input-prepend">
									<div class="span12" style="width: 455px;">
										<span class="add-on" style="width: 20px;"><i class="icon-lock"></i></span>
										<input name="confirmpassword" style="width: 425px;" type="password" placeholder="Confirm Password" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button type="submit" name="register" class="btn btn-primary">Create account</button>
					</div>
				</form>
			</div>
		';
		break;
	}

}

function loadUserModal($modal, $userID) {

	global $auth;
	global $db;
	global $_SESSION;

	switch($modal) {

		case 'test':
		echo '
			<div id="'.$modal.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>'.$userID.'</h3>
				</div>
				<form method="post">
					<div class="modal-body">
						<p>Your message to administrator</p>
						<label>Type in everything we should know.</label>
						<textarea style="width: 100%"></textarea>
						<input type="text" style="height: 30px; text-align: center;" placeholder="Your e-mail adress" />
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button type="submit" name="submit" class="btn btn-primary">Send</button>
					</div>
				</form>
			</div>
		';
		break;
	}

}