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
					$id = $_POST["id"];
					$user = $_POST["userName"];
					$password = $_POST["password"];
					$rol = $_POST["actor"];
					if($rol == "administrator"){
						if ($loginService->loginAdministrator(new Empleado($id,$user,"administrator",$password))) {
							header("HTTP/1.1 202 Accepted");
							exit();
						}
					}elseif ($rol == "auditor") {
						if ($loginService->loginAuditor(new Empleado($id,$user,"auditor",$password))) {
							header("HTTP/1.1 202 Accepted");
							exit();
						}
					}else{
						if ($loginService->loginUser(new Usuario($id, "CC", $user, $password))) {
							header("HTTP/1.1 202 Accepted");
							exit();
						}
					}
					header("HTTP/1.1 401 Unauthorized");
					exit();
					break;
				case 'register':
					
					$user = $_POST["userName"];
                                        /* @var $_POST type */
                                        $tipo = $_POST["tipoIdentificacion"];
					$password = $_POST["password"]; 
                                        $rol = $_POST["rol"];
                                        echo $user;
					try{
						if ($rol == "administrador") {
							$this->persistence -> addAdministrator(new Empleado($user,$rol,$password,$tipo));
	                                        header("HTTP/1.1 202 Accepted");
	                                        exit();     
						}elseif ($rol == "auditor") {
							$this->persistence -> addAuditor(new Empleado($user,$rol, $password,$tipo));
	                                        header("HTTP/1.1 202 Accepted");
	                                        exit();
						}else{
							$this->persistence -> addUser(new Usuario($tipo, $user, $password));
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
                                                            echo 'route.service';
                                                            $idCuenta1 = $_POST["cuentaOrigen"];
                                                            $idCuenta2 = $_POST["cuentaDestino"];
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
                                                        case 'ultimosMovimientos':
                                                            
                                                            $accountId = $_POST["accountId"];
                                                            echo json_encode($this->persistence -> consultarMovimientosCuenta($accountId));
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
                                        if(isset($_POST["solicitud"])){
                                                $solicitud = $_POST["solicitud"];   
                                                switch ($solicitud) {
                                                    case 'crearCuenta':
                                                        $idCuenta = $_POST["numeroDeCuenta"];
                                                        $tipo = $_POST["tipo"];
                                                        $persona = $_POST["persona"];
                                                        $this->persistence -> createAccountUsuario(new Cuenta($idCuenta, $tipo), $persona );
                                                        header("HTTP/1.1 202 Accepted");
                                                        exit();
                                                        break;
                                                    case 'movimientos':
                                                        echo json_encode($this->persistence -> todosLosMovimientos());
                                                        header("HTTP/1.1 202 Accepted");
                                                        exit();
                                                        break;
                                                    case 'totalMovimientos':
                                                        echo json_encode($this->persistence -> totalDeTransferencias());
                                                        header("HTTP/1.1 202 Accepted");
                                                        exit();
                                                        break;
                                                    default:
                                                        # code...
                                                    break;
                                                }
                                        }
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