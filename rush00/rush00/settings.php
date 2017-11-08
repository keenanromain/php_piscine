<?php
	session_start();
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
			<div id="settings">
				<form action="save-settings.php" method="post">
					<div id="reset-pw">
						<h3>Reset Password</h3><br />
						<span id="help-text">Old Password<span id="help-text"><br />
						<input title="oldpw" type="password" /><br />
						<span id="help-text">New Password</span><br />
						<input title="newpw" type="password" /><br />
						<br />
					</div>
					<div id="change-email">
						<h3>Change Email</h3><br />
						<span id="help-text">New Email</span><br />
						<input title="newemail" placeholder="me@myself.com" type="text" /><br />
						<br />
					</div>
					<div id="change-image">
						<h3>Change Profile Image</h3><br />
						<input type="file" name="filename" accept="image/gif, image/jpeg, image/png" /><br />
						<br />
					</div>
					<button type="submit" title="save" value="OK">Save</button>
				</form>
			</div>
		</div>
		<footer>
			<a>&copy; 2017 Austin Daly &amp; Keenan Romain</a>
		</footer>
	</div>

</body>
</html>
