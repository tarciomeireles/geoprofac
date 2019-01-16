<?php
namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Classe de Servicos 
 * @package Model
 */
class Servicos extends ModelBase
{
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'shr_servicos';
	
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
								'descricao',
								'abrangencia',
								'valor'
								); //virgula permitida
								
	/**
	 * Link padrão da classe (método gerenciar ou listar);
	 *
	 * @var string
	 */
	const INDEX_MODEL_URL = "admin.php?modulo=Servicos&acao=gerenciar";
	
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
		return $this->obj_Banco->selecionar( $this->obj_ModelData );
	}
	
	/**
	 * Acao ao para tratar Inserir
	 * 
	 * @return \stdClass
	 */
	public function inserir()
	{
		if( $this->salvar() ) {
			@header('Location: ' . self::INDEX_MODEL_URL);
		}

		return $this->obj_ModelData->getDados();
	}
	
	/**
	 * Acao ao para tratar Editar
	 *
	 * @return \stdClass
	 */
	public function editar()
	{	
		if( $this->salvar() ) {
			@header('Location: ' . self::INDEX_MODEL_URL);
		}
		
		return $this->obj_Banco->selecionar( $this->obj_ModelData, false );
	}
	
	/**
	 * Salvar (valido para Edicao / Insercao)
	 * 
	 * @return boolean
	 */
	private function salvar()
	{
		// alimentar objeto ModelData a partir do $_POST
		$this->extrairDadosPost();
		
    	// $_GET => Obj Registro
    	$this->extrairDadosGet();
		
		if($_POST) {				
				
				
				// Salvar Dados na tabela
				if( isset( $this->obj_ModelData->{static::PRIMARY_KEY} ) ) {
					$this->obj_Banco->atualizar( $this->obj_ModelData );
				} else {					
					$this->obj_Banco->inserir( $this->obj_ModelData );
				}
		
				Mensagem::set("Dados salvos com sucesso!", 'success');
				
				return true;
			
		}

		return false;
	}
    
    /**
     * Deletar cliente
     * 
     * @return void
     */
    public function excluir() 
    {
    	
    	// $_GET => Obj Registro
    	$this->extrairDadosGet();
    
    	// excluir o registro
    	$this->obj_Banco->deletar( $this->obj_ModelData );
    	
    	Mensagem::set("Registro excluído com sucesso!", 'success');
    
    	@header('Location: ' . self::INDEX_MODEL_URL);
    }
    
}