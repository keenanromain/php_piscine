<?php
	include "auth.php";
	include "account_actions.php";

	session_start();

	if ($_SESSION['logged_in_user']) {
		$alert_text = 'You\'re already logged in!';
	} else {
		if ($_POST['login'] && $_POST['passwd']) {
			if (auth($_POST['login'], $_POST['passwd'])) {
				$alert_text = 'Welcome back '.$_POST['login'].'!';
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['passwd'] = hash('whirlpool', $_POST['passwd']);
			} else {
				$alert_text = 'Whoops, try that again.';
			}
		}
	}

 ?>

<html>
	<head>
		<title>Vintage Boujee</title>
		<link rel="stylesheet" href="./style.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	</head>
<body>
	<input type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
	<label for="drawer-toggle" id="drawer-toggle-label"></label>
	<header>
		<img class="page-title" src="./small.png" />
	</header>
	<nav id="drawer">
		<label for="drawer-toggle">
		<ul>
			<li><a href="./home.php">Home</a></li>
			<li><a href="./about.html">About</a></li>
			<li><a href="./store.php">Store</a></li>
			<li><a href="./profile.php">Profile</a></li>
			<li><a href="./settings.php">Settings</a></li>
			<li><a href="./partners.html">Partners</a></li>
		</ul>
		</label>
	</nav>
	<div id="page-content">
		<div id="view">
			<br />
			<br />
			<br />
			<br />
			 <p class="page-description">Login to view your Vintage Boujee account. If you do not have an account, please sign up to gain access.</p>
			<div id="login" style="margin-top: 10px;">
				<?php if ($alert_text) {echo $alert_text.'<br /><br />'; exit;} ?>
				<form action="login.php" method="post">
					<span id="help-text">Enter Username</span><br />
					<input name="login" type="text" /><br />
					<span id="help-text">Enter Password</span><br />
					<input name="passwd" type="password" /><br /><br />
					<button type="submit" title="login" value="OK" style="margin-bottom: 10px;">Login</button>
				</form>
			</div>
		</div>
		<p class="footer">&copy; 2017 Austin Daly &amp; Keenan Romain</p>
	</div>

</body>
</html>
