<?php

class UserController {
	static public function init() {
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			print_r($_SERVER["PATH_INFO"]);
			header("HTTP/1.1 200 ok");
			echo json_encode("OK");
			exit();
		}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
			exit();
		}elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
			exit();
		}
	}
}

