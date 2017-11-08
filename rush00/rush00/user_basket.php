<?php

function loadBasket($user, $pwHash)
{
	$addrBook = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$baskPath = baskPath($user, $pwHash);
		if (file_exists($baskPath))
		{
			$basket = unserialize(file_get_contents($baskPath));
		}
	}
	return ($basket);
}

function saveBasket($user, $pwHash, $basket)
{
	if (hashAuth($user, $pwHash))
	{
		if (!file_exists(userPath($user, $pwHash)))
			mkdir(userPath($user, $pwHash));
		$baskPath = baskPath($user, $pwHash);
		$saveData = serialize($basket);
		return (file_put_contents($baskPath, $saveData));
	}
	return (FALSE);
}

function basketTotal($basket)
{
	$total = '0';
	if ($basket)
	{
		foreach ($basket['items'] as $item)
		{
			$total += ($item['price'] * $item['qty']);
		}
	}
	return ($total);
}

function addToBasket($user, $pwHash, $barcode, $qty)
{
	if (hashAuth($user, $pwHash))
	{
		$basket = loadBasket($user, $pwHash);
		$item = getItem($barcode);
		if ($barcode && $qty && $item)
		{
			if (!$basket['items'][$barcode])
			{
				$basket['items'][$barcode]['qty'] = $qty;
				$basket['items'][$barcode]['price'] = $item['price'];
				$basket['items'][$barcode]['name'] = $item['name'];
				$basket['items'][$barcode]['barcode'] = $item['barcode'];
				$basket['total'] = basketTotal($basket);
				return (saveBasket($user, $pwHash, $basket));
			}
			else
			{
				$basket['items'][$barcode]['qty'] += $qty;
				$basket['total'] = basketTotal($basket);
				return (saveBasket($user, $pwHash, $basket));
			}
		}
	}
	return (FALSE);
}

function validateBasket($basket)
{
	if ($basket)
	{
		foreach($basket['items'] as $item)
		{
			print_r($item);
			$itemData = getItem($item['barcode']);
			print_r($itemData);
			if ($itemData['quantity'] < $item['qty'])
				return (FALSE);
		}
		return (TRUE);
	}
	return (FALSE);
}

function buyBasket($user, $pwHash)
{
	if (hashAuth($user, $pwHash))
	{
		$basket = loadBasket($user, $pwHash);
		$order = addTransaction($user, $pwHash, $basket);
		if ($order)
		{
			echo("HELLO\n");
			$basket = "";
			saveBasket($user, $pwHash, $basket);
			return(userAddTransaction($user, $pwHash, $order));
		}
	}
	return (FALSE);
}

?>