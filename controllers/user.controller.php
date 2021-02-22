<?php

class UserController {
	static public function init() {
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			header("HTTP/1.1 200 ok");
			echo json_encode("OK");
			exit();
		}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
			# code...
		}elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
			# code...
		}
	}
}

