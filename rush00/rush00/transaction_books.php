<?php

function loadStoreTransactions($user, $pwHash)
{
	$adminTransactions['meta'] = array('numOrders' => '0');
	$adminTransactions['orders'] = array('0' => '0');
	if (hashAuth($user, $pwHash))
	{
		$bookPath = "private/book";
		if (file_exists($bookPath))
		{
			$adminTransactions = unserialize(file_get_contents($bookPath));
		}
	}
	return ($adminTransactions);
}

function saveStoreTransactions($user, $pwHash, $adminTransactions)
{
	if (hashAuth($user, $pwHash))
	{
		$bookPath = "private/book";
		$saveData = serialize($adminTransactions);
		if ($saveData)
		{
			return (file_put_contents($bookPath, $saveData));
		}
	}
	return (FALSE);
}

function addTransaction($user, $pwHash, $basket)
{
	if (hashAuth($user, $pwHash) && validateBasket($basket))
	{
		$order['basket'] = $basket;
		$order['user'] = $user;
		$order['datePlaced'] = time();
		$trans = loadStoreTransactions($user, $pwHash);
		if ($trans['meta']['numOrders'])
			$trans['meta']['numOrders'] += '1';
		else
			$trans['meta']['numOrders'] = '1';
		if (!$trans['orders'][($trans['meta']['numOrders'])])
		{
			$trans['orders'][($trans['meta']['numOrders'])] = $order;
			if (saveStoreTransactions($user, $pwHash, $trans))
				return ($order);
		}
	}
	return (FALSE);
}

?>