<?php

class Route {
	public function initRoute() {
		if(isset($_GET["ruta"])){
			echo $_GET["ruta"];
		}

	}
}