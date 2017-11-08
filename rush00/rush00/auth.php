<?PHP

function auth($login, $passwd)
{
	$path = "private/accounts";
	if ($passwd)
		$pwHash = hash("whirlpool", $passwd);
	$accounts = loadAccounts($path);
	if ($accounts[$login])
	{
		if($accounts[$login]['passwd'] == $pwHash)
			return (TRUE);
	}
	return (FALSE);
}

function hashAuth($login, $pwHash)
{
	$path = "private/accounts";
	$accounts = loadAccounts($path);
	if ($accounts[$login])
	{
		if($accounts[$login]['passwd'] == $pwHash)
			return (TRUE);
	}
	return (FALSE);
}

function hashAdmin($login, $pwHash)
{
	$path = "private/accounts";
	$accounts = loadAccounts($path);
	if ($accounts[$login])
	{
		if($accounts[$login]['passwd'] == $pwHash)
		{
			if ($accounts[$login]['admin?'])
				return (TRUE);
		}
	}
	return (FALSE);
}

?>
