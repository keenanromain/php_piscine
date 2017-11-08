<?PHP

session_start();

$user = $_SESSION['login'];
$pwHash = $_SESSION['pwHash'];

$action = $_POST['action'];
$catName = $_POST['category'];
$barcode = $_POST['barcode'];

if ($action == 'addCat')
	$result = addCategory($user, $pwHash, $catName);
elseif ($action == 'delCat')
	$result = delCategory($user, $pwHash, $catName);
elseif ($action == 'catItem')
	$result = categorizeItem($user, $pwHash, $catName, $barcode);

if ($result)
	echo ("$action OK\n");
else
	echo ("$action KO\n");

?>