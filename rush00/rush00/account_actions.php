<?PHP

function loadAccounts($path)
{
	$accounts = FALSE;
	$account_data = file_get_contents($path);
	if ($account_data)
	{
		$accounts = unserialize($account_data);
	}
	return ($accounts);
}

function saveAccounts($accounts, $path)
{
	$account_data = FALSE;
	$account_data = serialize($accounts);
	if ($account_data)
	{
		file_put_contents($path, $account_data);
		return (TRUE);
	}
	return (FALSE);
}

function addAccount($path, $user, $pass)
{
	$passHash = hash("whirlpool", $pass);
	if (file_exists($path))
		$accounts = loadAccounts($path);
	if ($passHash && $user && $pass)
	{
		if (!$accounts[$user])
		{
			$accounts[$user] = array('login' => $user, 'passwd' => $passHash);
			return (saveAccounts($accounts, $path));
		}
	}
	return (FALSE);
}

function modAccount($path, $user, $oldPass, $newPass)
{
    $oldHash = hash("whirlpool", $oldPass);
    if (file_exists($path))
        $accounts = loadAccounts($path);
    else
        return (FALSE);
    if ($oldHash && $user && $newPass)
    {
        if ($accounts[$user]['passwd'] == $oldHash)
	{
            $accounts[$user]['passwd'] = hash("whirlpool", $newPass);
            return (saveAccounts($accounts, $path));
        }
    }
    return (FALSE);
}

function delAccount($path, $user, $pwHash, $targetUser)
{
	if (hashAuth($user, $pwHash))
	{
		if (!hashAdmin($user, $pwHash) && $user != $targetUser)
		{
			return (FALSE);
		}
		else
		{
			$accounts = loadAccounts($path);
			if ($accounts)
			{
				unset($accounts[$targetUser]);
				return (saveAccounts($accounts, $path));
			}
		}
	}
	return (FALSE);
}

?>