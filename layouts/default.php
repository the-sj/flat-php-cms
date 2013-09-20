<? error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $fetchFlags->title ?></title>
		<link href="/etc/bootstrap/css/bootstrap-responsive.csss" rel="stylesheet">
		<link href="/etc/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="/etc/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/layouts/default.css">
		<? if ($userStyle) { 
		echo '<link rel="stylesheet" type="text/css" href="/layouts/default-'.$userStyle.'.css">'; }
		?>
		<meta charset="utf-8">
	</head>
	<body>



		<div class="navbar navbar-fixed-top">
        	<div class="navbar-inner" style="height: 35px;">
           		<div class="container">
              		<? menubar('top') ?>
            	</div>
          	</div>
        </div>
        <div class="container" style="padding-top: 30px;">
    <?

	if (!$auth->id) {
    loadModal('adminRecovery');
	loadModal('logInWindow');
    loadModal('registerWindow');
    }
	if ($_SESSION['error']) {
      		echo includeError($_SESSION['error']);
          $_SESSION['error'] = false;
		}

		require('pages/'.PAGE.'.php');

		?>


		</div>



    <div class="navbar navbar-fixed-bottom" style="height: 25px; line-height: 18px; padding: 2px;">
      <div class="navbar-inner">
        <div class="container" style="height: 25px; line-height: 18px; padding: 2px;">
          <p class="brand" style="height: 25px; line-height: 18px; font-size: 18px; padding: 2px;">code.svenz.lv</p>
          <ul class="nav pull-right">
             <li class="dropdown navbar-important-no" style="text-align: center;">
                <a style="padding: 2px; height: 25px; width: 25px;" data-toggle="dropdown" role="button" class="dropdown-toggle" href="#"><i class="icon-info-sign" style="font-size: 18px;"></i></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">Information</li>
                  <li><a class="notifications" href="#aboutWindow" data-toggle="modal">About</a></li>
                  <li><a class="notifications" href="#rulesWindow" data-toggle="modal">Rules</a></li>
                  <li><a class="notifications" href="#disclaimerWindow" data-toggle="modal">Disclaimer</a></li>
                  <li><a class="notifications" href="/html5" data-toggle="modal"><span class="label label-success"><i class="icon-ok"></i>HTML5</span></a></li>
                </ul>
              </li>
          </ul>
        </div>        
      </div>
    </div>


    <script src="/etc/bootstrap/js/jquery.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-transition.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-alert.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-modal.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-tab.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-popover.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-button.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="/etc/bootstrap/js/bootstrap-typeahead.js"></script> 
	<script src="/etc/bootstrap/js/application.js"></script> 
</body>
</html>

