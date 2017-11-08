<?PHP
$path = "private/accounts";

include ('account_actions.php');
include ('user_paths.php');
include ('auth.php');

if (!file_exists("private"))
    mkdir("private");
if ($_POST['submit'] == "OK")
{
	$user = $_POST['login'];
	$pass = $_POST['passwd'];
	$pwHash = hash("whirlpool", $pass);
    if (addAccount($path, $user, $pass))
    {
		mkdir(userPath($user, $pwHash));
        echo("OK\n");
    }
    else
    {
        echo("ERROR\n");
    }
}
?>