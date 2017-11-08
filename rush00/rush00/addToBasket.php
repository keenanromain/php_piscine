<?PHP

	include ('user_basket.php');
	include ('user_paths.php');
	include ('account_actions.php');
	include ('auth.php');
	include ('inventory.php');

	if ($_SESSION && $_SESSION['login'] && $_SESSION['passwd']) {
		$login = $_SESSION['login'];
		$login = $_SESSION['passwd'];
		$barcode = $_POST['barcode'];
		$qty = $_POST['itemQuantity'];

		addToBasket($user, $pwHash, $barcode, $qty);
		$basket = loadBasket($user, $pwHash);
		if ($basket)
			print_r($basket);
		else
			echo("KO\n");
	} else {
		echo "KO";
	}
?>
