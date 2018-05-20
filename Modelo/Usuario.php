<?php 

	require_once("Conexion.php");

	class Usuario extends Conexion
	{

		private $nombre;
		private $apellido;
		private $celular1;
		private $celular2;
		private $rubro;
		private $rol;
		private $username;
		private $password;
		
		function __construct($nombre=null, $apellido=null, $celular1=null, $celular2=null, $rubro=null, $rol=null, $username=null, $password=null)
		{

			parent:: __construct();
			$this->nombre= $nombre;
			$this->apellido= $apellido;
			$this->celular1 = $celular1;
			$this->celular2 = $celular2;
			$this->rubro = $rubro;
			$this->rol = $rol;
			$this->username= $username;
			$this->password= sha1($password);
			
			
		}
	
    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelular1()
    {
        return $this->celular1;
    }

    /**
     * @param mixed $celular1
     *
     * @return self
     */
    public function setCelular1($celular1)
    {
        $this->celular1 = $celular1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelular2()
    {
        return $this->celular2;
    }

    /**
     * @param mixed $celular2
     *
     * @return self
     */
    public function setCelular2($celular2)
    {
        $this->celular2 = $celular2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRubro()
    {
        return $this->rubro;
    }

    /**
     * @param mixed $rubro
     *
     * @return self
     */
    public function setRubro($rubro)
    {
        $this->rubro = $rubro;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     *
     * @return self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

 ?>