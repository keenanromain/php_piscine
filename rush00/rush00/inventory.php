<?php

function loadInventory()
{
	$invPath = "public/inv/meta";
	if (!file_exists("public"))
		mkdir("public");
	if (!file_exists("public/inv"))
		mkdir("public/inv");
	$inventory = FALSE;
	if (file_exists($invPath))
	{
		$inventory = unserialize(file_get_contents($invPath));
	}
	return ($inventory);
}

function saveInventory($user, $pwHash, $inventory)
{
	if (hashAdmin($user, $pwHash))
	{
		$invPath = "public/inv/meta";
		$invData = serialize($inventory);
		if ($invData)
		{
			return (file_put_contents($invPath, $invData));
		}
	}
	return (FALSE);
}

function getItem($barcode)
{
	$itemData = FALSE;
	$inventory = loadInventory();
	if ($inventory)
	{
		$path = "public/inv/";
		$path .= $inventory[$barcode];
		if (file_exists($path))
			$itemData = unserialize(file_get_contents($path));
	}
	return ($itemData);
}

function putItem($user, $pwHash, $barcode, $itemData)
{
	if (hashAdmin($user, $pwHash))
	{
		$inventory = loadInventory();
		if ($inventory[$barcode])
		{
			$itemPath = "public/inv/".$inventory[$barcode];
			return (file_put_contents($itemPath, serialize($itemData)));
		}
	}
	return (FALSE);
}

function addItem($user, $pwHash, $barcode, $info)
{
	if (hashAdmin($user, $pwHash))
	{
		$inventory = loadInventory();
		if (!$inventory[$barcode])
		{
			$inventory[$barcode] = hash("md5", $barcode);
			if (saveInventory($user, $pwHash, $inventory))
			{
				return (putItem($user, $pwHash, $barcode, $info));
			}
		}
	}
	return (FALSE);
}

function modItem($user, $pwHash, $barcode, $itemData)
{
	if (hashAdmin($user, $pwHash))
	{
		$oldItem = getItem($barcode);
		if ($oldItem)
		{
			foreach($itemData as $key => $field)
			{
				$oldItem[$key] = $field;
			}
			return (putItem($user, $pwHash, $barcode, $oldItem));
		}
	}
	return (FALSE);
}

function delItem($user, $pwHash, $barcode)
{
	if (hashAdmin($user, $pwHash))
	{
		$inventory = loadInventory();
		if ($inventory[$barcode])
		{
			$itemPath = "public/inv/".$inventory[$barcode];			
			unset($inventory[$barcode]);
			if (saveInventory($user, $pwHash, $inventory))
			{
				return (unlink($itemPath));
			}
		}
	}
	return (FALSE);
}

?>