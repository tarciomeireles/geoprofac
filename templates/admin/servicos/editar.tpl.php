<form action="" method="POST" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Editar Cliente</legend>
    
        <div class="control-group">
            <label class="control-label">Descrição:</label>
            <div class="controls">
                <input name="descricao" value="<?php echo $dados->descricao?>" class="input-xlarge" type="text">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">Abrangência:</label>
            <div class="controls">
                <input name="abrangencia" value="<?php echo $dados->abrangencia?>" class="input-xlarge" type="text">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">Valor:</label>
            <div class="controls">
                <input name="valor" value="<?php echo $dados->valor?>" class="input-xlarge" type="text">
            </div>
        </div>           
        
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <button class="btn btn-primary">Salvar</button>
            </div>
        </div>

    </fieldset>
</form>