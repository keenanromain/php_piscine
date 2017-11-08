<?php
	session_start();
 ?>

<html>
	<head>
		<title>Vintage Boujee</title>
		<link rel="stylesheet" href="./style.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
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
			<div id=home>
			<br />
			<br />
			<br />
			<br />
				 <p class="page-description">Vintage Boujee is a collection of the greatest works in black entertainment. We curate our material from three distinct genres: hip-hop, soul, and RnB.</p>
				<br />
			</div>
		</div>
 <div class="gallery">
      <figure class="gallery-item">
        <p>About</p>
        <a href="./about.html"><img class="thumbnail" height="400" width="400" src="http://coverlandia.net/sites/default/files/artist_pictures/azealiabanks.jpg"></a>
      </figure>
      <figure class="gallery-item">
        <p>Login</p>
        <a href="./login.php"><img class="thumbnail" height="400" width="400" src="http://images.genius.com/f9c991a8f021b26424a0ce9efa8ccee3.1000x1000x1.jpg"></a>
      </figure>
      <figure class="gallery-item">
        <p>Store</p>
		<a href="./store.php"><img class="thumbnail" height="400" width="400" src="http://img.wennermedia.com/social/rs-246712-20160628_Future_1_HP.jpg"></a>
      </figure>
      <figure class="gallery-item">
        <p>Contact</p> 
		<a href="mailto:webmaster@example.com"><img class="thumbnail" height= "400" width="400" src="https://s3.amazonaws.com/hiphopdx-production/2016/04/Lil-Uzi-Vert-Hands-On-Face.jpg"></a>
      </figure>
      <figure class="gallery-item">
        <p>Settings</p>
        <a href="./settings.php"><img class="thumbnail" height="400" width="400" src="http://images.genius.com/66dcc06b58c51a9c3ed8d42abfdc4f3d.783x783x1.jpg"></a>
      </figure>
      <figure class="gallery-item">
        <p>Partners</p>
        <a href="./partners.html"><img class="thumbnail" height="400" width="400" src="http://staticimg.myfirstclasslife.com/wp-content/uploads/2016/08/29084259/Young-Thug.jpg"></a>
      </figure>
    </div>
	<p class="footer">&copy; 2017 Austin Daly &amp; Keenan Romain</p>
	</div>

</body>
</html>
