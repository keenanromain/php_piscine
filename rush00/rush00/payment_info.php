<?php

function loadPaymentBook($user, $pwHash)
{
	$paymentBook = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$paymentPath = payPath($user, $pwHash);
		if (file_exists($paymentPath))
		{
			$paymentBook = unserialize(file_get_contents($paymentPath));
		}
	}
	return ($paymentBook);
}

function savePaymentBook($user, $pwHash, $paymentBook)
{
	if (hashAuth($user, $pwHash))
	{
		$paymentPath = paymentPath($user, $pwHash);
		$saveData = serialize($paymentBook);
		if ($saveData)
		{
			return (file_put_contents($paymentPath, $saveData));
		}
	}
	return (FALSE);
}

function addPayment($user, $pwHash, $name, $newPayment)
{
	if (hashAuth($user, $pwHash))
	{
		$paymentMethods = loadPaymentBook($user, $pwHash);
		if ($newPayment)
		{
			if (!$paymentMethods[$name])
			{
				$paymentMethods[$name] = $newPayment;
				return (savePaymentBook($user, $pwHash, $paymentMethods));
			}
		}
	}
	return (FALSE);
}

?>