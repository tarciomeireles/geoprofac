<?php

namespace Lib;
use Lib\Config;

/**
 * Trait para escrita de log
 * 
 * @package    Lib
 */
trait Log 
{
	
	/**
	 * Escreve log
	 * 
	 * @return void
	 */
	public function escrever( $mensagem )
	{
		$data        = date('d/m/Y H:i:s');
		$mensagem    = "[ {$data} ] {$mensagem}" . PHP_EOL;
		
		$arquivo     = Config::get('log.path');
		
	}
	
}