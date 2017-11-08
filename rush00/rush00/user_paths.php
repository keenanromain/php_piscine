<?PHP

function userPath($user, $pwHash)
{
	$dataPath = FALSE;
	if (hashAuth($user, $pwHash))
	{
    	$tag = hash("md5", $user);
    	$preHash = $user.$tag.$user;
    	$dataPath = "private/".hash("md5", $preHash);
	}
	return ($dataPath);
}

function addrPath($user, $pwHash)
{
	$dataPath = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$dataPath = userPath($user, $pwHash);
        $tag = hash("md5", "addr".$user);
        $preHash = $user.$tag.$user;
        $addrName = hash("md5", $prehash);
        $addrPath = $dataPath."/".$addrName;
	}
	return ($addrPath);
}

function ccPath($user, $pwHash)
{
	$ccPath = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$dataPath = userPath($user, $pwHash);
        $tag = hash("md5", "cripwalcc".$user);
        $preHash = $user.$tag.$user;
        $ccName = hash("md5", $prehash);
        $ccPath = $dataPath."/".$ccName;
	}
	return ($ccPath);
}

function infoPath($user, $pwHash)
{
	$infoPath = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$dataPath = userPath($user, $pwHash);
        $tag = hash("md5", "lightmeup".$user);
        $preHash = $user.$tag.$user;
        $infoName = hash("md5", $prehash);
        $infoPath = $dataPath."/".$infoName;
	}
	return ($infoPath);
}

function baskPath($user, $pwHash)
{
	$baskPath = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$dataPath = userPath($user, $pwHash);
        $tag = hash("md5", "catchacase".$user);
        $preHash = $user.$tag.$user;
        $baskName = hash("md5", $prehash);
        $baskPath = $dataPath."/".$baskName;
	}
	return ($baskPath);
}

function transPath($user, $pwHash)
{
	$transPath = FALSE;
	if (hashAuth($user, $pwHash))
	{
		$userPath = userPath($user, $pwHash);
        $tag = hash("md5", "handyouthedopehandmethecheddar".$user);
        $preHash = $user.$tag.$user;
        $transName = hash("md5", $prehash);
        $transPath = $userPath."/".$transName;
	}
	return ($transPath);
}

?>
