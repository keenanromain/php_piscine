<?php

function loadAddressBook($user, $pwHash)
{
	$addrBook = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$tag = hash("md5", $pwHash);
		$preHash = $user.$tag.$user;
		$dataPath = hash("md5", $preHash);
		$tag = hash("md5", "addr".$user);
		$preHash = $user.$tag.$user;
		$addrName = hash("md5", $prehash);
		$addrPath = $dataPath."/".$addrName;
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
		$tag = hash("md5", $pwHash);
		$preHash = $user.$tag.$user;
		$dataPath = hash("md5", $preHash);
		$tag = hash("md5", "addr".$user);
		$preHash = $user.$tag.$user;
		$addrName = hash("md5", $prehash);
		$addrPath = $dataPath."/".$addrName;
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
		if ($addresses)
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