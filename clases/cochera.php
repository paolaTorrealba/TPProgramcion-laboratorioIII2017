<?php
class cochera
{
    public $id;
    public $nroCochera;
	public $tipoCochera;
 	public $estadoCochera;
  
  	
  	function __struct($tipoCochera,$estadoCochera)
	{	
		
		$this->tipoCochera= $tipoCochera;
		$this->estadoCochera=$estadoCochera;
	
		
	}

	public static function TraerUno($nroCochera) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id,
															 nroCochera as nroCochera,
															 tipoCochera as tipoCochera,
															 estadoCochera as estadoCochera
															 from cochera
															 where nroCochera = $nroCochera");
			$consulta->execute();
			$cocheraBuscado= $consulta->fetchObject('cochera');
			return $cocheraBuscado;				

			
	}

	public static function traerTodos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id,
			                                                 nroCochera as nroCochera, 
														     tipoCochera as tipoCochera,
															 estadoCochera as estadoCochera
															 from cochera");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cochera");		
	}

    public function Insertar($nroCochera, $tipoCochera)
	 {
       $estadoCochera = 1; //1: libre -  0: ocupada
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cochera 
	   	                                           (nroCochera, tipoCochera, estadoCochera)
						                           values('$nroCochera','$tipoCochera', '$estadoCochera')");
			$resultado = $consulta->execute();	
			return $resultado;

	 }

	//  public function Modificar($id,$tipoCochera, $estadoCochera)
	//  {

	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta(" 
	// 			update cochera 
	// 			set tipoCochera='$tipoCochera',
	// 			estadoCochera='$estadoCochera'				
	// 			WHERE id='$id'");             
	// 		return $consulta->execute();

	//  }
	

	// public function Baja($id)
 //  	{
  		 
	//  		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("delete from cochera WHERE id = $id");	
	// 		$consulta->execute();		
				
	// 		return $consulta->rowCount();
	//  }
	

	// //traer cocheras libres (estado = 1)
	// // public static function traerLibres()
	// // {
	// // 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// // 		$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, tipoCochera as tipoCochera, estadoCochera as estadoCochera from cochera where estadoCochera = 1");
	// // 		$consulta->execute();			
	// // 		return $consulta->fetchAll(PDO::FETCH_CLASS, "cochera");		
	// // }
	// //traer cocheras libres (estado =1 ) por Tipo de cocheras (reservada - comun) 
	// public static function traerLibres($tipoCochera)
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, 
	// 														tipoCochera as tipoCochera, 
	// 														estadoCochera as estadoCochera 
	// 														from cochera where estadoCochera = 1
	// 														and tipoCochera = $tipoCochera");
	// 		$consulta->execute();			
	// 		return $consulta->fetchAll(PDO::FETCH_CLASS, "cochera");		
	// }

   
  	
	// public function mostrarDatos()
	// {
	//   	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	// }

}