<?php
namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Classe Rastreamentos, model com toda regra de negocios de rastreamentos
 *
 * @package Model
 */
class Rastreamentos extends ModelBase
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
								'dta',
								'speed', 								
								);
	
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
	 * Gerenciar
	 * 
	 * @return boolean | array
	 */
	public function gerenciar()
	{	
			$regporpag = 30;
			if(isset($_GET['pag']) && is_numeric($_GET['pag']) && $_GET['pag'] > 0 && ctype_digit($_GET['pag'])){
				//$pag = $_GET['pag'];
				$start = ($_GET['pag']-1) * $regporpag ;
				$paginacao = "$start, $regporpag";				
			}else{
				$paginacao = $regporpag;
			}			
			$sql = "SELECT * FROM " . self::TABELA
			. " ORDER BY dta DESC  LIMIT " . $paginacao;		
						
			return  $this->obj_Banco->consultarSQL($sql);
	}
	public function rota()
	{	
			$regporpag = 30;
			if(isset($_GET['pag']) && is_numeric($_GET['pag']) && $_GET['pag'] > 0 && ctype_digit($_GET['pag'])){
				//$pag = $_GET['pag'];
				$start = ($_GET['pag']-1) * $regporpag ;
				$paginacao = "$start, $regporpag";				
			}else{
				$paginacao = $regporpag;
			}			
			$sql = "SELECT * FROM " . self::TABELA
			. " ORDER BY dta DESC LIMIT " . $paginacao;		
						
			return  $this->obj_Banco->consultarSQL($sql);
	}
	
	
	public function ultimo()
	{	
			$sql = "SELECT * FROM " . self::TABELA
			. " ORDER BY dta DESC LIMIT 1";		
						
			return  $this->obj_Banco->consultarSQL($sql);
	}
	

	

}