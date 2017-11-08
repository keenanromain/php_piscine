<?php
	session_start();
	$_SESSION['loggued_on_user'] = "";
	setcookie("PHPSESSID", '', 1, "/");
	$alert_text = "Logged out, thanks for dropping by!";
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
 	<header>Logged out</header>
 	<nav id="drawer">
 		<label for="drawer-toggle">
 		<ul>
			<li><a href="./home.php">Homet</a></li>
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
 				<?php if ($alert_text) {echo $alert_text.'<br /><br />'; exit;} ?>
 		</div>
 		<p class="footer">&copy; 2017 Austin Daly &amp; Keenan Romain</p>
 	</div>

 </body>
 </html>
