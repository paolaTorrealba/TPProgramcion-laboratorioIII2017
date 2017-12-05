<?php
class auto
{
    public $id;
	public $patente;
 	public $color;
  	public $marca;
  	
  	function __struct($patente,$color,$marca)
	{	
		
		$this->patente= $patente;
		$this->color=$color;
		$this->marca=$marca;
		
	}

	//busco el auto por patente
	   public static function TraerUno($id) 
		{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, 
					                                             patente as patente, 
					                                             color as color,
					                                             marca as marca 
					                                             from auto 
					                                             where id = '$id'");
				$consulta->execute();
				$autoBuscado= $consulta->fetchObject('auto');
				return $autoBuscado;				

				
		}

  public static function traerTodos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("select id as id, 
															 patente as patente,
															 color as color,
															 marca as marca
															 from auto");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "auto");		
	}
	

    //registro un auto nuevo - devuelvo true o false
    public function Insertar($patente, $color, $marca)
	 {

       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into auto (patente,marca,color)
						                               values('$patente','$marca','$color')");
			$resultado = $consulta->execute();	

			return $resultado;

	 }

	 public function Modificar($id,$patente, $color,$marca)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta(" 
				update auto 
				set patente='$patente',
				color='$color',
				marca='$marca'
				WHERE id='$id'");             
			return $consulta->execute();

	 }
	
    public function Baja($id)
{
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
    $consulta = $objetoAccesoDato->RetornarConsulta("delete from auto WHERE id = '$id'");
    return $consulta->execute();
}
	
  	

 //  	//Los autos quedan registrados, no se eliminan
	// public function Baja($patente)
 //  	{
  		 
	//  		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("delete from alquilerCochera WHERE patente = $id");	
	// 		$consulta->execute();		
				
	// 		return $consulta->rowCount();
	//  }
	// public function mostrarDatos()
	// {
	//   	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	// }

}