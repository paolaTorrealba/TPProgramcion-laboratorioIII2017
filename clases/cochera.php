<?php
class cochera
{
    public $id;
	public $tipoCochera;
 	public $estadoCochera;
  
  	
  	function __struct($tipoCochera,$estadoCochera)
	{	
		
		$this->tipoCochera= $tipoCochera;
		$this->estadoCochera=$estadoCochera;
	
		
	}

    public function Insertar($tipoCochera, $estadoCochera)
	 {

       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cochera (tipoCochera, estadoCochera)
						                                    values('$tipoCochera', '$estadoCochera')");
			$resultado = $consulta->execute();	

			return $resultado;

	 }

	 public function Modificar($id,$tipoCochera, $estadoCochera)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(" 
				update cochera 
				set tipoCochera='$tipoCochera',
				estadoCochera='$estadoCochera'				
				WHERE id='$id'");             
			return $consulta->execute();

	 }
	

	public function Baja($id)
  	{
  		 
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete from cochera WHERE id = $id");	
			$consulta->execute();		
				
			return $consulta->rowCount();
	 }
	public static function traerTodos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, tipoCochera as tipoCochera, estadoCochera as estadoCochera from cochera");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cochera");		
	}
   public static function TraerUno($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, tipoCochera as tipoCochera, estadoCochera as estadoCochera  from cochera where id = $id");
			$consulta->execute();
			$cocheraBuscado= $consulta->fetchObject('cochera');
			return $cocheraBuscado;				

			
	}
  	
	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}

}