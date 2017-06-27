<?php
class usuario
{
    public $id;
    public $mail;
    public $clave;
	public $estado;
 	public $rol;

  
  	
  	function __struct($id,$mail,$clave, $estado, $salida, $rol)
	{	

		$this-> $id = $id;
	    $this-> $mail = $mail;
	    $this-> $clave= $clave;
		$this-> $estado = $estado;
	 	$this-> $salida = $salida;
	 	$this-> $rol= $rol;
	
	}

    public function Insertar($id,$mail,$clave, $estado, $salida, $rol)
	 {

       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario 
	   	                                               (id, mail, clave, estado, salida, rol)
						                               values('$id', '$mail', '$clave','$estado','$salida', '$rol");
			$resultado = $consulta->execute();	

			return $resultado;

	 }

	 public function Modificar($id,$mail,$clave, $estado, $salida, $rol)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(" 
				update usuario 
					set id = '$id',
				        mail = '$mail',
				        clave ='$clave', 
				        estado= '$estado',
				        salida = '$salida', 
				        rol = '$rol'		
				WHERE id= $id and mail = $mail and clave = $clave");             
			return $consulta->execute();

	 }
	

	public function Baja($id,$mail,$clave, $estado, $salida, $rol)
  	{
  		 
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornaSrConsulta("delete from usuario WHERE id= $id");	
			$consulta->execute();		
				
			return $consulta->rowCount();
	 }
	public static function traerTodos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, mail as mail, clave as clave, estado as estado, rol as rol from usuario");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}
   public static function TraerUno($mail, $clave) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, mail as mail, clave as clave, estado as estado, rol as rol from usuario where mail = '$mail' and clave = '$clave'");
			$consulta->execute();
			$objetoBuscado= $consulta->fetchObject('usuario');
			return $objetoBuscado;				

			
	}
  	
	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}

}