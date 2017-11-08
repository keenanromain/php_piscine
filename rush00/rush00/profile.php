<?php
	session_start();

	$img = "./public/images/question-mark-1750942_1280.png";

	if ($_SESSION['logged_in_user']) {
		$name = $_SESSION['logged_in_user'];
	} else {
		$alert_text = 'You\'re not <a href="./login.php">logged in.</a>';
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
			<li><a href="./about.html">About</a></li>
			<li><a href="./store.php">Store</a></li>
			<li><a href="./profile.php">Profile</a></li>
			<li><a href="./settings.php">Settings</a></li>
		</ul>
		</label>
	</nav>
	<div id="page-content">
		<div id="view">
			<br />
			<br />
			<br />
			<br />
			<div id="profile">
				<?php if ($alert_text) {echo $alert_text.'<br /><br />'; exit;} ?>
				<img src="<?php echo $img ?>" /><br />
				<div id="name"><h2><?php echo $name ?></h2></div><br />
				<form action="./logout.php" method="post"><button id="logout-button" value="Logout" type="submit" value="OK">Logout</button>
			</div>
		</div>
		<footer>
			<p class="footer">&copy; 2017 Austin Daly &amp; Keenan Romain</p>
		</footer>
	</div>

</body>
</html>
