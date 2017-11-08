<?PHP

include ('user_basket.php');
include ('user_paths.php');
include ('user_transactions.php');
include ('transaction_books.php');
include ('account_actions.php');
include ('auth.php');
include ('inventory.php');

$user = $_POST['login'];
$pass = $_POST['passwd'];
$pwHash = hash('whirlpool', $pass);

if (buyBasket($user, $pwHash))
	echo("OK\n");
else
	echo("KO\n");
?>