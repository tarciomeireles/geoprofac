<?php
namespace Controller;

use View\View;
use Model\Perfis;

/**
 * Application Controller
 */
final class Controller 
{
	/**
	 * Construtor - @param string $tipo - @throws \Exception
	 */
  	public function __construct($tipo) 
	{
		date_default_timezone_set("Brazil/East");
	
		$this->sessionTimeout();
	
    	if (isset ($_GET['modulo']))
    	{
    		$modulo    = "\Model\\{$_GET['modulo']}";

       		if (class_exists($modulo))
      		{	
      			$model_obj = new $modulo();

        		if (isset($_GET['acao']))
        		{	
        			if ($tipo == Perfis::ADMINISTRATIVO && $_GET['acao'] != 'logar')
        			{	
						
						
						if (!isset($_SESSION['funcionarios']))
        				{
        					header('Location: admin.php');
        				}
        			}        			
        			
        			$acao     = $_GET['acao'];
            		$dados    = $model_obj->$acao();
            		$template = "{$_GET['modulo']}/{$acao}";
          			          			
				}
				else
				{					
					throw new \Exception("Acao deve ser informada!");					
        		}
        	}
        	else
        	{
        		throw new \Exception("Model '{$_GET['modulo']}' nao encontrada!");
      		}
      		
      		return View::carregar($tipo, strtolower($template), $dados);
      		
      	}
      	else
      	{
      		// default view
			return View::carregar($tipo, 'index');
       	}		
  	}

	private function sessionTimeout(){
	
		if(isset($_SESSION['timecreation']) && time() - $_SESSION['timecreation'] > 60*30){
			$_SESSION = Array();
			session_destroy();
		}				
						
	}
}