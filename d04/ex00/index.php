<?php
	session_start();
	if ($_GET['login'] && $_GET['passwd']) {
		if ($_GET['submit'] === "OK") {
			$_SESSION['login'] = $_GET['login'];
			$_SESSION['passwd'] = $_GET['passwd'];
		}
	}
?>

<html>
	<head>
		<title>My Title Goes here</title>
	</head>
	<body>
		<form action="index.php" method="get">
		Login: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" /><br />
		Password: <input type="text" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" /><br />
		<input type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>
