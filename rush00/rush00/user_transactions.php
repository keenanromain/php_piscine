<?php

function userLoadTransactions($user, $pwHash)
{
    $userTrans['meta'] = array('numOrders' => '0');
    $userTrans['orders'] = array('0' => '0');
	if (hashAuth($user, $pwHash))
	{
		$transPath = transPath($user, $pwHash);
		if (file_exists($transPath))
		{
			$userTrans = unserialize(file_get_contents($transPath));
		}
	}
	return ($userTrans);
}

function userSaveTransactions($user, $pwHash, $userTrans)
{
	if (hashAuth($user, $pwHash))
	{
		$transPath = transPath($user, $pwHash);
		$saveData = serialize($userTrans);
		return (file_put_contents($transPath, $saveData));
	}
	return (FALSE);
}

function userAddTransaction($user, $pwHash, $order)
{
	if (hashAuth($user, $pwHash))
	{
		$trans = userLoadTransactions($user, $pwHash);
		if ($trans['meta']['numOrders'])
			$trans['meta']['numOrders'] += '1';
		else
			$trans['meta']['numOrders'] = '1';
		if (!$trans['orders'][($trans['meta']['numOrders'])])
		{
			$trans['orders'][($trans['meta']['numOrders'])] = $order;
			return (userSaveTransactions($user, $pwHash, $userTrans));
		}
	}
	return (FALSE);
}

?>
