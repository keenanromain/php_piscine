<?PHP

session_start();

$user = $_SESSION['login'];
$pwHash = $_SESSION['pwHash'];
$action = $_POST['action'];
$barcode = $_POST['barcode'];
$quantity = $_POST['itemQuantity'];
$price = $_POST['itemPrice'];
$name = $_POST['itemName'];
$description = $_POST['itemDescription'];
$imageData = $_POST['imageData'];

$info['barcode'] = $barcode;
$info['name'] = $name;
$info['quantity'] = $quantity;
$info['price'] = $price;
$info['description'] = $description;
$info['image'] = $imageData;

if ($action == 'addItem')
	$result = addItem($user, $pwHash, $barcode, $info);
elseif ($action == 'modItem')
	$result = modItem($user, $pwHash, $barcode, $info);
elseif ($action == 'delItem')
	$result = delItem($user, $pwHash, $barcode);

if ($result)
	echo ("$action OK\n");
else
	echo ("$action KO\n");

?>