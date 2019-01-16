<?php 
use Model\Perfis;
?>
<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Rastreamentos <?php echo (isset($_GET['pag'])?$_GET['pag']:1) ?></legend>
    
        <div class="btn-toolbar">
			<?php if(isset($_GET['pag']) && ctype_digit($_GET['pag']) && $_GET['pag'] > 1){ 
				$pagina = (int) $_GET['pag'];
			?>
			<a href="admin.php?modulo=Rastreamentos&acao=gerenciar&pag=<?php echo $pagina - 1; ?>"  class="btn"><i class="icon-minus"></i> <strong>Registros</strong></a>
			<?php }else{
						$pagina = 1;
					}
			?>			
			<a href="admin.php?modulo=Rastreamentos&acao=gerenciar&pag=<?php echo $pagina + 1; ?>" class="btn"><i class="icon-plus"></i> <strong>Registros</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Coord</th>
                        <th>Data</th>
                        <th>Veloc</th>
						<th>Dist.</th>
                        <th>Bateria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados as $rastro): ?>
                        <tr>
                            <td><?php echo $rastro->id; ?></td>
                            <td><?php echo round($rastro->lat,7) .','. round($rastro->lng,7); ?></td>
                            <td><?php echo $rastro->dta ?></td>
                            <td><?php echo $rastro->speed; ?></td>
							<td><?php echo round($rastro->distancia,1) .'Km' ?></td>
                            <td><?php echo $rastro->battery .'%' ?></td>
                            <td>
                                <a target="_blank" href="http://maps.google.com/maps?q=loc:<?php echo $rastro->lat. ',' .$rastro->lng ?>"><i class="icon-road"></i> <strong>Google</strong></a>
                                -
                                <a href="admin.php?modulo=Rastreamentos&acao=excluir&id=<?php echo $rastro->id; ?>"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Rastreamento' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>