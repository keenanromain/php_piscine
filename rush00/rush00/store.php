<?php

	include "inventory.php";

	function render_item($id, $img, $title, $desc, $price) {
		echo ('
			<div id="item">
				<div id="cont"><img src="'.$img.'" /></div>
				<form method="post" action="addToBasket.php">
				<div class="item content">
				<span id="title">'.$title.'</span>
				<div class="truncate" id="desc">'.$desc.'</span>
				<span id="price">'.$price.'</span>
				<input type="hidden" name="sku" value="'.$id.'"/>
				<input type="hidden" name="login" value="'.$_SESSION['logged_in_user'].'"/>
				<button id="add-to-cart" type="submit" name="submit" value="OK">Add to cart</button>
				</div>
				</form>
			</div>');
	}

	session_start();
	if (!$_SESSION['login']) {
		$alert_text = "You need to log in to buy stuff!";
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
			<div class=store>
			<?php if ($alert_text) {echo $alert_text.'<br /><br />'; exit;} ?>
 			<?php
				$inventory = loadInventory();
				foreach ($inventory as $path) {
					$item = unserialize(file_get_contents("./public/inv/".$path));
					// var_dump($item);
					render_item($item['barcode'], NULL, $item['name'], $item['description'], $item['price']);
				}
			?>
			</div>
 		</div>
 		<footer>
 			<a>&copy; 2017 Austin Daly &amp; Keenan Romain</a>
 		</footer>
 	</div>

 </body>
 </html>
