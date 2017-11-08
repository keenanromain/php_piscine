<?PHP

include 'permissions.php';
include 'account_actions.php';

$rootPass = $_POST['rootPass'];
$targetUser = $_POST['targetUser'];
$accPath = "private/accounts";

if (elevateUser($rootPass, $targetUser, $accPath))
	echo("OK!\n");
else
	echo("KO!\n");

?>