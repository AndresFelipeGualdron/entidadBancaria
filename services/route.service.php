<?php

class Route {
	public function initRoute() {
		if(isset($_GET["ruta"])){
			$ruta = $_GET["ruta"];
			switch ($ruta) {
				case 'login':
					$user = $_POST["user"];
					$password = $_POST["password"];
					if($user == "admin" && $password == "admin"){
						header("HTTP/1.1 202 Accepted");
					}else {
						header("HTTP/1.1 401 Unauthorized");
					}
					exit();
					break;
				case 'register':
					$user = $_POST["user"];
					$password = $_POST["password"];
					break;
				case 'user':
					# code...
					break;
				case 'auditor':
					# code...
					break;
				case 'administrator':
					# code...
					break;
				default:
					header("HTTP/1.1 404 not found");
					exit();
					break;
			}
			
		}

	}
}