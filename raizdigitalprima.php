<?php
/**
 * Proyecto Raiz Digital Prima
 *
 * @package			php
 * @author			Tomas Losis<tlosis@gmail.com>
 * @since			Version 1.0 septiembre 2019
 * @description		Clase que determina si un numero pasado por consola tiene raiz digital prima, indicando su valor de ser afirmativo
 */

//Entrada de argumentos por consola y validacion basica
if(empty($argv[1])){
	echo "debe introducir un numero";
	exit();
}
//Ejecucion de la clase
$process = new RaizDigitalPrima($argv[1]);
echo $process->main();

//----------------------//

class RaizDigitalPrima {

	public $numero = 0;
	public $numeroBase = 0;

    function __construct($dato) {
		$this->numero = $dato;
		$this->numeroBase = $dato;		
	}

	//metodo principal////////////////

	public function main()
	{
		$ciclo=0;
		//analisis del numero pasado por parametros
		do{
			if($this->numeroPrimo($this->numero)){
				$ciclo=1;
			}else{
				if($this->numero <10){
					$ciclo=2;
				} else {
					$this->numero = $this->adicionarNumero($this->numero);
				}
			}			
		}while($ciclo<1);
		
		//resultados
		if($ciclo==1){
			echo "Del numero: ".$this->numeroBase." su raiz digital Prima es: ".$this->numero;
		}else{
			echo "El numero: ".$this->numeroBase." NO TIENE raiz digital prima";
		}
		
	}
	
	//Metodos de soporte////////////////
	
	private function numeroPrimo($valor){
		$bandera = 0;
		for($i = 1; $i <= $valor; $i++){
			if($valor % $i == 0){
				$bandera++;
			}
		}	
		if($bandera==2){
			return true;
		}else{
			return false;
		}
	}
	
	private function adicionarNumero($valor){
		if($valor>9){
			$arrayValor = str_split($valor);
			$resultado = array_sum($arrayValor);
			return $resultado; 
		}
		return false;
	}
	
}
?>