<?php

if(isset($_POST["actor"])) {
	if ($_POST["user"] == "admin" && $_POST["password"]=="admin") {
		$_SESSION["name"] = $_POST["user"];
		if ($_POST["actor"] == "user") {
			header("Location: http://localhost:8081/entidadBancaria/?ruta=user");
		}else {
			header("Location: http://localhost:8081/entidadBancaria/?ruta=administrator");
		}
		
	}else {
		echo "error login";
		header("Location: http://localhost:8081/entidadBancaria/?ruta=login");
	}
	
}