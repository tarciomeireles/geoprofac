<?php
// Inclusao do arquivo de bootstrap
require __DIR__ . '/bootstrap.php';

use Controller\Controller; //o mesmo que: use Controller\Controller as Controller;
use Model\Perfis; //o mesmo que: use Model\Perfis as Perfis;


try
{
	new Controller(Perfis::FRONTEND);
}
	catch (\Exception $e)
	{
		echo $e->getMessage();
	}