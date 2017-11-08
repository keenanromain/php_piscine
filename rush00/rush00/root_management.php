<?PHP

session_start();

$user = $_SESSION['login'];
$pwHash = $_SESSION['pwHash'];

$action = $_POST['action'];
$rootPass = $_POST['rootPass'];
$newRootPass = $_POST['newRootPass'];
$targetUser = $_POST['targetUser'];
$accPath = "private/accounts";

if ($action == 'elevateUser')
	$result = elevateUser($rootPass, $targetUser, $accPath);
elseif ($action == 'changeRootPass')
	$result = changeRootPass($rootPass, $newRootPass);

if ($result)
	echo ("$action OK\n");
else
	echo ("$action KO\n");

?>