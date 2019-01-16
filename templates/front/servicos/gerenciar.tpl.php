<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Servicos</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=Servicos&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Novo Servico</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome / Razão Social</th>
                        <th>CPF / CNPJ</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $Servico): ?>
                        <tr>
                            <td><?php echo $Servico->id; ?></td>
                            <td><?php echo $Servico->descricao; ?></td>
                            <td><?php echo $Servico->abrangencia; ?></td>
                            <td><?php echo $Servico->valor; ?></td>
                            <td>
                                <a href="admin.php?modulo=Servicos&acao=editar&id=<?php echo $Servico->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="admin.php?modulo=Servicos&acao=excluir&id=<?php echo $Servico->id; ?>"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Servico' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>