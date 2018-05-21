<?php 
	require_once 'Conexion.php';

	/**
	* Clase usuario
	*/
	class Usuario extends Conexion
	{
		
		private $id;
		private $nombreUsuario;
		private $pass;
		private $nivel;
		private $email;
		private $fechaRegistro;
		private $fechaModificacion;
		private $estado;


		function __construct($user=null,$pass=null,$nivel=null,$email=null,$fechaR=null,$fechaM=null,$estado=null,$id=null)
		{
			parent::__construct();

			$this->id=$id;
			$this->nombreUsuario=$user;
			$this->pass=sha1($pass);
			$this->nivel=$nivel;
			$this->email=$email;
			$this->fechaRegistro=$fechaR;
			$this->fechaModificacion=$fechaM;
			$this->estado=$estado;
		}


// SETTER Y GETTERS
		public function getNombreUsuario()
		{
			return $this->nombreUsuario;
		}

		public function setNombreUsuario($value)
		{
			$this->nombreUsuario = $value;
		}

		public function getPass()
		{
			return $this->pass;
		}

		public function setPass($value)
		{
			$this->pass = $value;
		}

		public function getNivel()
		{
			return $this->nivel;
		}

		public function setNivel($value)
		{
			$this->nivel = $value;
		}

		public function getFechaRegistro()
		{
			return $this->fechaRegistro;
		}

		public function setFechaRegistro($value)
		{
			$this->fechaRegistro = $value;
		}

		public function getFechaModificacion()
		{
			return $this->fechaModificacion;
		}

		public function setFechaModificacion($value)
		{
			$this->fechaModificacion = $value;
		}

		public function getEstado()
		{
			return $this->estado;
		}

		public function setEstado($value)
		{
			$this->estado=$value;
		}

// OTRAS FUNCIONES
		// INICIAR SESION
		public function login()
		{
			// ABRIR CONEXION
			$con=$this->conectar();
			if($con=='error'){
				$resultado=0;
			}else{

				$resultado = mysqli_query($con,"SELECT * FROM usuario WHERE nombreUsuario='".$this->nombreUsuario."' and pass='".$this->pass."' and estado=1");
				if($resultado->num_rows>0){

					//USUARIO ENCONTRADO
					$datos=$resultado->fetch_assoc();

					session_start();
					$_SESSION['idUser']=$datos['id'];
					$_SESSION['nombre']=$datos['nombreUsuario'];

					switch ($datos['nivel']) {
					case '1':
						$_SESSION['rol']='Administrador';
						break;
					case '2':
						$_SESSION['rol']='Usuario';
						break;
					case '3':
						$_SESSION['rol']='Cliente';
						break;
					}

					$resultado=1;
				}else{
					//USUARIO NO ENCONTRADO
					$resultado=2;
				}

			}

			$con->close();
			return $resultado;
		}
		

		// INSERTAR USUARIO
		public function insertar()
		{
			// EJEMPLO
			// $user = new Usuario('rafa','1234',2,date('y/m/d h:i:s'));

			// ABRIR CONEXION
			$con=$this->conectar();

			$sentencia=$con->prepare("INSERT INTO `usuario`(`nombreUsuario`, `pass`, `nivel`, `email`, `fechaRegistro`) VALUES (?,?,?,?,?)");
			$sentencia->bind_param('ssiss',$nombre,$pass,$nivel,$email,$fecha);

			$nombre=$this->nombreUsuario;
			$pass=$this->pass;
			$nivel=$this->nivel;
			$email=$this->email;
			$fecha=$this->fechaRegistro;


			$sentencia->execute();

			if ($sentencia) {
				return true;
			}
			else{
				return false;
			}

			$sentencia->close();
			$con->close();
			
		}

		// mostrar
		public function mostrar()
		{
			$con=$this->conectar();

			if ($stmt = $con->prepare("SELECT id, nombreUsuario, pass FROM usuario")) {

			    $stmt->execute();

			    if(!$stmt){
			    	echo "Fallo al mostrar datos: ".$stmt->errno;
			    }
			    else{
		    		// Vinculamos variables a columnas
			    	$stmt->bind_result($id, $nombre, $pass);
			    	// Obtenemos los valores
			    	while ($stmt->fetch()) {
			        	printf($id.$nombre,$pass);
			    	}
			    }

			    // Cerramos la sentencia preparada
			    $stmt->close();
			}
			$con->close();

		}

		public function buscarUsername()
		{
			$con=$this->conectar();
			$sentencia= $con->prepare("SELECT COUNT(`nombreUsuario`) as `encontrado` FROM `usuario` WHERE `nombreUsuario`= ?");

			$estado;
			if($sentencia){
		// SENTENCIA PREPARADA CON EXITO
				$sentencia->bind_param('s',$username);
				$username=$this->nombreUsuario;

				$sentencia->execute();
				$sentencia->bind_result($resultado);

				while ($sentencia->fetch()) {
					if($resultado>0){
						// 	NOMBRE DE USUARIO EXISTENTE
						$estado=1;
					}else{
						$estado=0;
					}
				}
			}else{
				$estado='error';
			}

			return $estado;
			$sentencia->close();
			$con->close();
		}


	}
?>