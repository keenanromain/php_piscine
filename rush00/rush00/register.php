<?php
	include 'account_actions.php';
	include 'user_paths.php';
	include 'auth.php';

	$path = 'private/accounts';
	session_start();
	if (!file_exists('private'))
		mkdir('private');
	if ($_POST['submit'] == 'OK') {
		if ($_POST['passwd'] == $_POST['confpw']) {
			$user = $_POST['login'];
			$pass = $_POST['passwd'];
			$hash = hash('whirlpool', $pass);
			if (addAccount($path, $user, $pass)) {
				mkdir(userPath($user, $hash));
				$alert_text = 'Account creation successfull! Go out there and buy things!';
			} else {
				$alert_text = 'Something went wrong, try again.';
			}
		} else {
			$alert_text = 'Passwords not the same!';
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
	<header>Home</header>
	<nav id="drawer">
		<label for="drawer-toggle">
		<ul>
			<li><a href="./store.php">Store</a></li>
			<li><a href="./profile.php">Profile</a></li>
			<li><a href="./settings.php">Settings</a></li>
		</ul>
		</label>
	</nav>
	<div id="page-content">
		<div id="view">
			<div id="register">
				<?php if ($alert_text) {echo $alert_text.'<br /><br />'; exit;} ?>
				<form action="register.php" method="post">
					<h3>Create Account</h3><br />
					<span id="help-text">Login</span><br />
					<input name="login" placeholder="" type="text" /><br /><br />
					<!-- <span id="help-text">Email</span><br /> -->
					<!-- <input title="email" placeholder="42@theanswer.com" type="text" /><br /><br /> -->
					<span id="help-text">Password</span><br />
					<input name="passwd" type="password" /><br />
					<span id="help-text">Confirm Password</span><br />
					<input name="confpw" type="password" /><br /><br />
					<!-- <span id="help-text">Profile image</span><br /> -->
					<!-- <input title="image" type="file" accept="image/gif, image/jpeg, image/png" /><br /><br /> -->
					<button type="submit" name="submit" value="OK">Register</button>
				</form>
			</div>
		</div>
		<footer>
			<a>&copy; 2017 Austin Daly &amp; Keenan Romain</a>
		</footer>
	</div>

</body>
</html>
