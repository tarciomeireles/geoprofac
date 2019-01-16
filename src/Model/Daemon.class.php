<?php
namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Daemon to add Latitude/Longitude to Database
 *
 * @package Model
 */
class Daemon extends ModelBase
{
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'shr_gpslogger';
	
	/**
	 * Constante com nome da chave-primaria
	 * @var string
	 */
	const PRIMARY_KEY = 'id';	
	
	/**
	 * Colunas existente na tabela
	 *
	 * @var array
	 */
	protected $colunas = array( 'id',
								'lat',
								'lng',
								'alt',
								'dta',
								'speed',
								'battery',
								'satelites', 
								'precisao',
								'direcao',
								'provedor',
								'androidid',
								'serial',
								'distancia'); 
	
	/**
	 * Link padrão da classe (método gerenciar ou listar);
	 *
	 * @var string
	 */
	const INDEX_MODEL_URL = "admin.php?modulo=Daemon&acao=add";
	
	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function __construct() 
	{
		parent::__construct();
	}
	
    
    /**
     * Adiciona um registro no banco de dados 
     * 
     * @return void
     */
    public function add() 
    {
    	
		
    	// $_GET => Obj Registro
    	if(isset($_GET['hash']) && $_GET['hash'] == '37b860c0ea'){			
			$lastPoint = $this->getLastPoint();
			$this->extrairDadosGet(); //alimentando $this->obj_ModelData com $_GET
			if($lastPoint){
				$this->obj_ModelData->distancia = $this->distance($this->obj_ModelData->lat, $this->obj_ModelData->lng, $lastPoint[0]->lat, $lastPoint[0]->lng);
			}else{
				$this->obj_ModelData->distancia = 0;
			}
			$this->obj_Banco->inserir( $this->obj_ModelData );
			$this->limpaLog();
		}
    	die();    	    
    	//@header('Location: ' . self::INDEX_MODEL_URL); //Redirecionamento em caso de sucesso
    }
	
	
	 /**
     * Clear Log
     * 
     * @return void
     */
	private function limpaLog(){
		$semanas = 4*7;		
		$sql = 	"DELETE FROM ". self::TABELA
				." WHERE DATEDIFF(NOW(),dta) > $semanas";
		return $this->obj_Banco->executarSQL( $sql );	
	}
	
	private function getLastPoint(){
		$sql = "SELECT * FROM " . self::TABELA
			. " ORDER BY dta DESC LIMIT 1";						
			return  $this->obj_Banco->consultarSQL($sql);
	}
	
	private function distance($lat1, $lon1, $lat2, $lon2, $unit = 'K') { 
	  //http://www.zipcodeworld.com/samples/distance.php.html
	  $theta = $lon1 - $lon2; 
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
	  $dist = acos($dist); 
	  $dist = rad2deg($dist); 
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K"){
		return ($miles * 1.609344); 
	  } else if ($unit == "N") {
		  return ($miles * 0.8684);
	  } else {
			return $miles;
	  }
	}
}