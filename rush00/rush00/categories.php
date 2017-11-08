<?PHP

function loadCategories()
{
    $catPath = "public/inv/categories";
    if (!file_exists("public"))
        mkdir("public");
    if (!file_exists("public/inv"))
        mkdir("public/inv");
    $categories = FALSE;
    if (file_exists($catPath))
    {
        $categories = unserialize(file_get_contents($catPath));
    }
    return ($categories);
}

function saveCategories($user, $pwHash, $categories)
{
    if (hashAdmin($user, $pwHash))
    {
        $catPath = "public/inv/categories";
        $saveData = serialize($categories);
        return (file_put_contents($catPath, $saveData));
    }
    return (FALSE);
}

function getCategory($category)
{
	$category = FALSE;
    $categories = loadCategories();
    if ($categories)
    {
		foreach($categories[$category] as $itemCode)
		{
			$category[$itemCode] = getItem($itemCode);
		}
    }
    return ($category);
}

function addCategory($user, $pwHash, $catName)
{
	if (hashAdmin($user, $pwHash))
	{
		$categories = loadCategories();
		if ($categories && !$categories[$catName])
		{
			$categories[$catName] = array[];
			return (saveCategories($user, $pwHash, $categories));
		}
	}
	return (FALSE);
}

function delCategory($user, $pwHash, $catName)
{
	if (hashAdmin($user, $pwHash))
	{
		$categories = loadCategories();
		if ($categories && $categories[$catName])
		{
			unset($categories[$catName]);
			return (saveCategories($user, $pwHash, $categories));
		}
	}
	return (FALSE);
}

function categorizeItem($user, $pwHash, $catName, $barcode)
{
	$categories = loadCategories();
	if (hashAdmin($user, $pwHash) && $categories)
	{
		$item = getItem($barcode);
		if ($item && $categories[$catName])
		{
			if (!$item['categories'])
				$item['categories'] = array[];
			array_push($item['categories'], $catName);
			array_push($categories[$catName], $barcode);
			if (saveCategories($user, $pwHash, $categories))
				return (putItem($user, $pwHash, $barcode, $item));
		}
	}
	return (FALSE);
}

?>
