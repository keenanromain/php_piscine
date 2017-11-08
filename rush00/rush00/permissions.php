<?php

function elevateUser($rootPass, $targetUser, $accPath)
{
	if (!file_exists("private/._root"))
		file_put_contents("private/._root", hash("whirlpool", "defaultRootPass"));
	if (hash("whirlpool", $rootPass) == file_get_contents("private/._root"))
	{
		$accounts = loadAccounts($accPath);
		if ($accounts[$targetUser])
		{
			$accounts[$targetUser]['admin?'] = TRUE;
			return (saveAccounts($accounts, $accPath));
		}
	}
	return (FALSE);
}

function changeRootPass($oldRootPass, $newRootPass)
{
	if (!file_exists("private/._root"))
		file_put_contents("private/._root", hash("whirlpool", "defaultRootPass"));
	if (hash("whirlpool", $oldRootPass) == file_get_contents("private/._root"))
	{
		return (file_put_contents("private/._root", hash("whirlpool", $newRootPass)));
	}
	return (FALSE);
}

?>