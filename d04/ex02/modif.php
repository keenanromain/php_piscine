<?php
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK") {
		if (!file_exists('../private'))
			mkdir('../private');
		if (!file_exists('../private/passwd'))
			file_put_contents('../private/passwd', null);
		$data = unserialize(file_get_contents('../private/passwd'));
		$correct = false;
		if ($data) {
			foreach($data as $key => $val) {
				if ($val['login'] === $_POST['login'] && $val['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
					$correct = true;
					$data[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
				}
			}
			if ($correct) {
				file_put_contents('../private/passwd', serialize($data));
				echo "OK\n";
			}
			else {
				echo "ERROR\n";
			}
		}
		else {
			echo "ERROR\n";
		}
	} else {
		echo "ERROR\n";
	}

?>
