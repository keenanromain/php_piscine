<?php

include 'user_paths.php';

function loadAddressBook($user, $pwHash)
{
	$addrBook = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$addrPath = addrPath($user, $pwHash);
		if (file_exists($addrPath))
		{
			$addrBook = unserialize(file_get_contents($addrPath));
		}
	}
	return ($addrBook);
}

function saveAddressBook($user, $pwHash, $addrBook)
{
	if (hashAuth($user, $pwHash))
	{
		$addrPath = addrPath($user, $pwHash);
		$saveData = serialize($addrBook);
		if ($saveData)
		{
			return (file_put_contents($addrPath, $saveData));
		}
	}
	return (FALSE);
}

function addAddress($user, $pwHash, $name, $address)
{
	if (hashAuth($user, $pwHash))
	{
		$addresses = loadAddressBook($user, $pwHash);
		if ($name && $address)
		{
			if (!$addresses[$name])
			{
				$addresses[$name] = $address;
				return (saveAddressBook($user, $pwHash, $addresses));
			}
		}
	}
	return (FALSE);
}

?>