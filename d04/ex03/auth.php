<?php
	function auth($login, $passwd) {
		if (file_exists('../private/passwd') && $login && $passwd){
			$ret = FALSE;
			$data = unserialize(file_get_contents('../private/passwd'));
			foreach($data as $key => $val)
			{
				if ($data[$key]['passwd'] === $passwd && $data[$key]['login'] === $login)
					$ret = TRUE;
			}
			return ($ret);
		}
		return (FALSE);
	}
?>
