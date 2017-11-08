<?PHP

session_start();

$user = $_SESSION['login'];
$pwHash = $_SESSION['pwHash'];

$action = $_POST['action'];
$pass = $_POST['pass'];
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$targetUser = $_POST['targetUser'];
$accPath = "private/accounts";

if ($action == 'addAccount')
	$result = addAccount($accPath, $user, $pass);
elseif ($action == 'modAccount')
	$result = modAccount($accPath, $user, $oldPass, $newPass);
elseif ($action == 'delAccount')
	$result = delAccount($accPath, $user, $pwHash, $targetUser);

if ($result)
	echo ("$action OK\n");
else
	echo ("$action KO\n");

?>