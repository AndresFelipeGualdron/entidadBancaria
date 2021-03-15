<?php

class LoginService {
	function loginAdministrator($empleado){
		$persistence = new Persistence();
		$ac = $persistence->getAdministratorById($empleado);
		if ($empleado->password == $ac->password) {
			$_SESSION["actor"] = "auditor";
			$_SESSION["names"] = $ac->nombres;
			return true;
		}
		return false;
	}

	function loginAuditor($empleado){
		$persistence = new Persistence();
		$ac = $persistence->getAuditorById($empleado);
		if ($empleado->password == $ac->password) {
			$_SESSION["actor"] = "auditor";
			$_SESSION["names"] = $ac->nombres;
			return true;
		}
		return false;
	}

	function loginAuditor($user){
		$persistence = new Persistence();
		$ac = $persistence->getUserById($user);
		if ($user->password == $ac->password) {
			$_SESSION["actor"] = "auditor";
			$_SESSION["names"] = $ac->nombres;
			return true;
		}
		return false;		
	}
}