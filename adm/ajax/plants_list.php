
<div class="row">
	<div class="container">
		
		<div class="col-sm-8">
<?php $i = 0;foreach($plants_list as $plants):?>
			<form name="plants_form_<?php echo $i?>" class='plants_form'>
			<table class="table-responsive table-bordered">
				<tr>
					<th>Plantas procesadoras</th>
				</tr>

				

				<tr>	
					<td><?php echo strtoupper($plants['name']);?></td>
					<td><a class="btn btn-default" onclick="addPlants(<?php echo $plants['id_plant']?>);">Agregar</a></td>
				</tr>
				



			</table>
			</form>
<?php $i++;endforeach;?>
		</div>	
	</div>	
</div>