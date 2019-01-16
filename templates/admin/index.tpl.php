<?php 
if( !isset( $_SESSION['funcionarios'] ) ) {
  	include('funcionarios/logar.tpl.php');
}else{
	//header('Location: admin.php?modulo=Rastreamentos&acao=ultimo');
	echo "<h1>Clique nos menus acima</h1>";
}