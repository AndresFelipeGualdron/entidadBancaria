<?php
include "models/persistence.php";
include "models/Usuario.php";

class Route {
	private $persistence = new persistence();
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
					$actor = $_POST["actor"];
					$id = $_POST["id"];
					$user = $_POST["user"];
					$persistence -> addUser(new Usuario($id, $user));
					break;
				case 'user':
					if(isset($_POST["solicitud"])){
						$solicitud = $_POST["solicitud"];
						switch ($solicitud) {
							case 'transaccion':
								
								break;
							case 'viwMoney':
								break;
							case 'allTransferencias':
								break;
							
							default:
								# code...
								break;
						}
					}
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