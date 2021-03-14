<?php

class Route {
	private $persistence;
	private $loginService;
        
function __construct(){
            $this->persistence = new Persistence();
            $this->loginService = new LoginService();
        }

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
					$password = $_POST["password"];
					try{
						if ($actor == "administrator") {
							$this->persistence -> addAdministrator(new Usuario($id, $user, $password));
	                                        header("HTTP/1.1 202 Accepted");
	                                        exit();
						}elseif ($actor == "auditor") {
							$this->persistence -> addAuditor(new Usuario($id, $user, $password));
	                                        header("HTTP/1.1 202 Accepted");
	                                        exit();
						}else{
							$this->persistence -> addUser(new Usuario($id, $user, $password));
	                                        header("HTTP/1.1 202 Accepted");
	                                        exit();
						}
					}catch(PDOException $e){
						print_r($e);
						header("HTTP/1.1 500 Server Error");
                        exit();
					}
					
					
					break;
				case 'user':
					if(isset($_POST["solicitud"])){
						$solicitud = $_POST["solicitud"];
						switch ($solicitud) {
							case 'transaccion':
                                                            $idCuenta1 = $_POST["id1"];
                                                            $idCuenta2 = $_POST["id2"];
                                                            $valor = $_POST["valor"];
                                                            $this->persistence -> transacction($idCuenta1,$idCuenta2,$valor);
                                                            header("HTTP/1.1 202 Accepted");
                                                            exit();
                                                            break;
							case 'totalDineroDisponible':
                                                            $id = $_POST["id"];
                                                            header("HTTP/1.1 202 Accepted");
                                                            echo json_encode($this->persistence -> consultarSaldo($id));
                                                            exit();
                                                            break;
							case 'addDineroCuenta':
                                                            $id = $_POST["id"];
                                                            $valor = $_POST["valor"];
                                                            $this->persistence -> addSaldoCuenta($id,$valor);
                                                            header("HTTP/1.1 202 Accepted");
                                                            exit();
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