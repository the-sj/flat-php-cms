<?php
// menubar.php
// includes menubars.

function menubar($type) {

	global $db;
	global $auth;
	global $page;

	function is_active($case) {
		global $page;

		if ($case == $page) {
			return 'active';
		}
		else if ($case == 'home' && !$page) { 
			return 'active';
		}
		else if (
			($case == 'miniblogs' && ($page == 'm' or $page == 'miniblog')) or 
			($case == 'forum' && $page == 'f') or
			($case == 'articles' && ($page == 'a' or $page == 'article')) or
			($case == 'pictures' && ($page == 'p' or $page == 'picture')) or
			($case == 'blogs' && ($page == 'b' or $page == 'blog'))
			) {
			return 'active';
		}

	}

	function isImportant($kind) {
		global $db;
		global $auth;

		$newNotifications = true;
		$newMessages = false;

		if ($kind == 'notifications') {

			if ($newNotifications) {
				return 'navbar-important';
			}

		}

		if ($kind == 'messages') {

			if ($newMessages) {
				return 'navbar-important';
			}

		}

	}

	function createNotification($timeAgo, $type, $content, $where, $badgeOverride) {

		global $db;
		global $auth;

		switch ($type) {
			case 'warning':
				$name = 'Warning!';
				$labelStyle = 'important';
				$icon = 'icon-ban-circle'; 
			break;

			case 'warning-removed':
				$name = 'Warning removed';
				$labelStyle = 'success'; 
				$icon = 'icon-ok';
				$badgeStyle = 'warning';
			break;

			case 'reply':
				$name = 'Reply in '.$where.'';
				$labelStyle = 'info';
				$badgeStyle = 'warning'; 
				$icon = 'icon-comment-alt';
			break;

			case 'vote-topic':
				if ($content > 0) {
					$type = 'topic-plus';
					$labelStyle = 'success';
					$icon = 'icon-plus-sign';
				}
				else if ($content < 0){
					$type = 'topic-minus';
					$labelStyle = 'important';
					$icon = 'icon-minus-sign';
				}
				$name = 'Rated your topic'; 
			break;

		}

		if ($content == '1' && $badgeOverride != '1') {
			$badge = '';
		}
		else {
			if (!$badgeStyle) {
				$badgeStyle = $labelStyle;
			}
			$badge = ' <span class="badge badge-'.$badgeStyle.'">'.$content.'</span>';
		}

		return '<li><a class="notifications" href="'.$where.'">'.'<span class="label label-info" style="width: 25px; height: 14px; text-align: center; margin-right: 5px;">'.$timeAgo.'</span>'.'<span class="label label-'.$labelStyle.'" style="width: 25px; height: 14px; text-align: center; margin-right: 5px; padding-bottom: 1px;"><i class="'.$icon.'"></i></span>'.$name.$badge.'</a></li>';

		
	}

	function additionalItems($loggedIn, $class) {

		$notifications = 
		createNotification('24s', 'reply', '2', '/f/offtopic/')."\r\n".
		createNotification('56s', 'reply', '1', '/g/minecraft/')."\r\n".
		createNotification('1m', 'reply', '1', '/u/1/')."\r\n".
		createNotification('2m', 'warning', '4/5', '/u/1/warnings/')."\r\n".
		createNotification('2m', 'vote-topic', '-16', '/f/offtopic/1/')."\r\n".
		createNotification('5m', 'vote-topic', '21', '/f/servers/3/')."\r\n".
		createNotification('45m', 'warning-removed', '3/5', '/u/1/warnings/')."\r\n".
		createNotification('2h', 'reply', '5', '/f/servers/')."\r\n";

		if ($loggedIn) {

			$additionalItems = '    

							<li class="dropdown '.isImportant('notifications').' '.is_active('notifications').'">
          						<a data-toggle="dropdown" role="button" class="'.isImportant('notifications').' dropdown-toggle '.is_active('notifications').'" href="#"><i class="icon-flag" style="height: 22px; font-size: 18px;"></i></a>
          						<ul class="dropdown-menu">
          							<li class="nav-header">8 new notifications</li>
          							'.$notifications.'
          							<li class="divider"></li>
          							<li><a class="notifications" href="/notifications/">All notifications</a></li>
          						</ul>
          					</li>


          					<li class="dropdown '.isImportant('messages').' '.is_active('messages').'">
          						<a data-toggle="dropdown" role="button" class="'.isImportant('messages').' dropdown-toggle '.is_active('notifications').'" href="#"><i class="icon-envelope" style="height: 22px; font-size: 18px;"></i></a>
          						<ul class="dropdown-menu">
          							<li class="nav-header">no new messages</li>
          							<li class="divider"></li>
          							<li><a href="/messages/">All messages</a></li>

          						</ul>
          					</li>';

			if ($class == '1') {
				$additionalItems = $additionalItems . 
			'
          					<li class="dropdown '.isImportant('tasks').' '.is_active('tasks').'">
          						<a data-toggle="dropdown" role="button" class="n'.isImportant('tasks').' dropdown-toggle '.is_active('tasks').'" href="#"><i class="icon-tasks" style="height: 22px; font-size: 18px;"></i></a>
          						<ul class="dropdown-menu">
          							<li class="nav-header">no new tasks</li>
          							<li class="divider"></li>
          							<li><a href="/tasks/">All tasks</a></li>

          						</ul>
          					</li>

          					<li class="dropdown '.isImportant('admin').' '.is_active('admin').'">
          						<a data-toggle="dropdown" role="button" class="'.isImportant('admin').' dropdown-toggle '.is_active('admin').'" href="#"><i class="icon-legal" style="height: 22px; font-size: 18px;"></i></a>
          						<ul class="dropdown-menu">
          							<li class="nav-header">Administration</li>
          							<li class="divider"></li>
          							<li><a href="/admin/">Administration panel</a></li>

          						</ul>
          					</li>
			';
			}

			return $additionalItems;

		}
	}

	function userMenu() {
		global $db;
		global $auth;

		$userMenu = '
		          			<li class="dropdown '.isImportant('my').' '.is_active('my').'">
          						<a data-toggle="dropdown" role="button" class="navbar-important-no dropdown-toggle '.is_active('my').'" href="#"><i class="icon-rocket" style="height: 22px; font-size: 18px;"></i></a>
          						<ul class="dropdown-menu">
          							<li class="nav-header">my menu</li>
          							<li class="divider"></li>
          							<li><a href="/my/">My dashboard</a></li>

          						</ul>
          					</li>';
         return $userMenu;
	}
	
	function loginMenu() {
	
	global $auth;
	global $db;
	
	if (!$auth->id) {
	$loginmenu = '
		          			<li class="dropdown '.is_active('me').'">
				                <a data-toggle="dropdown" role="button" class="dropdown-toggle '.is_active('usermenu').'" href="#"><i class="icon-user" style="height: 22px; font-size: 19px;"></i></a>
				                <ul class="dropdown-menu">
				                  <li class="nav-header">Welcome, guest!</li>
				                  <li><a href="#logInWindow" data-toggle="modal">Login</a></li>
				                  <li><a href="#registerWindow" data-toggle="modal">Register</a></li>
				                  <li class="divider"></li>
				                  <li class="nav-header">Forgot something?</li>
				                  <li><a href="#forgotPassword" data-toggle="modal">Recover password</a></li>
				                  <li><a href="#adminRecovery" data-toggle="modal">Contact administrator</a></li>
					            </ul>
					        </li>
	';
	}
	
	else {
		$loginmenu = '
			          		<li class="dropdown">
				                <a data-toggle="dropdown" role="button" class="dropdown-toggle '.is_active('usermenu').'" href="#"><i class="icon-user" style="height: 22px; font-size: 19px;"></i></a>
				                <ul class="dropdown-menu" style="width: 200px;">
				                  <li class="nav-header">Welcome, '.$auth->displayname.'!</li>
				                  <li><a href="/user/'.$auth->id.'/" data-toggle="modal">My account</a></li>
								  <li><a href="/blog/'.$auth->id.'/" data-toggle="modal">My blog</a></li>
								  <li><a href="/miniblog/'.$auth->id.'/" data-toggle="modal">My miniblog</a></li>
								  <li><a href="/articles/'.$auth->id.'/" data-toggle="modal">My articles</a></li>
								  <li><a href="/pictures/'.$auth->id.'/" data-toggle="modal">My gallery</a></li>
				                  <li class="divider"></li>
				                  <li><a href="/logout" data-toggle="modal">Logout</a></li>
					            </ul>
					        </li>
		';
	}
	
	return $loginmenu;
	
	}

	echo '
	              		<ul class="nav">
             				<li class="'.is_active('home').'"><a href="/"><i class="icon-home" style="height: 22px; font-size: 19px;"></i></a></li>
             				'.userMenu().'
			                <li class="'.is_active('articles').'"><a href="/articles/">Articles</a></li>
			                <li class="'.is_active('forum').'"><a href="/forum/">Forum</a></li>
			                <li class="'.is_active('pictures').'"><a href="/pictures/">Pictures</a></li>
			                <li class="'.is_active('blogs').'"><a href="/blogs/">Blogs</a></li>
			                <li class="'.is_active('miniblogs').'"><a href="/miniblogs/">Miniblogs</a></li>
			                <li class="'.is_active('test').'"><a href="/test/">Test</a></li>
          				</ul>
          				<ul class="nav pull-right">


						'.additionalItems('true','1').'
						'.loginMenu().'
          				</ul>
';

// <b class="caret"></b> <- bultiņa dropdowniem
// ^ 2 fag 4 me to use.


// Revīzija - 03.06.2013 - salaboju linkus un pašu menubaru.

}