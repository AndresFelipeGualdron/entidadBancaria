<?php

class Route {
	public function initRoute() {
		if(isset($_GET["ruta"])){
			if(
				$_GET["ruta"] == "login" ||
				$_GET["ruta"] == "register" ||
				$_GET["ruta"] == "user" ||
				$_GET["ruta"] == "auditor" ||
				$_GET["ruta"] == "administrator"
			){
				include "vistas/".$_GET["ruta"].".view.php";
			}
			else {
				include "vistas/404.view.php";
			}
		}

	}
}