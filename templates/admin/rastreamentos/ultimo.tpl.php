<?php 
use Model\Perfis;

if(!isset($_GET['norefresh'])){
	?><meta http-equiv="refresh" content="30"><?php
}

?>

<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Última Localização Conhecida</legend>
    
        <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
    var locations = [
	<?php
		if ($dados){
			foreach($dados as $rastro){
				$distancia = round($rastro->distancia,1);
				$points[] = "['Veloc:{$rastro->speed}Km/h - {$rastro->direcao}<br />Dist último ponto: {$distancia}Km<br />Batt: {$rastro->battery}%<br />Precisão: {$rastro->precisao}<br />{$rastro->dta}',{$rastro->lat},{$rastro->lng},{$rastro->id}]";
			}
			echo implode(',',$points);
		}    
	?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(<?php echo $rastro->lat ?>, <?php echo $rastro->lng ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
	
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