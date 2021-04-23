<?php

class LoginService {
	function loginAdministrator($empleado){
		$persistence = new Persistence();
		$ac = $persistence->getAdministratorById($empleado);
		if ($empleado->is_password == $ac->is_password) {
			$_SESSION["actor"] = "auditor";
			$_SESSION["names"] = $ac->is_nombre;
			return true;
		}
		return false;
	}

	function loginAuditor($empleado){
		$persistence = new Persistence();
		$ac = $persistence->getAuditorById($empleado);
		if ($empleado->is_password == $ac->is_password) {
			$_SESSION["actor"] = "auditor";
			$_SESSION["names"] = $ac->is_nombre;
			return true;
		}
		return false;
	}

	function loginUser($user){
		$persistence = new Persistence();
		$ac = $persistence->getUserById($user);
		if ($user->is_password == $ac->is_password) {
			$_SESSION["actor"] = "auditor";
			$_SESSION["names"] = $ac->is_nombre;
			return true;
		}
		return false;		
	}
}