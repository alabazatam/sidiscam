<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<link href="<?php echo full_url;?>/web/css/buttons.dataTables.min.css" rel="stylesheet">
<div>
	<table id="example" class="table table-responsive table-bordered">
    <thead>
    <tr>
        <th>ID.Venta</th>
        <th>Cliente</th>
        <th>Naviera</th>
        <th>Contenedor</th>
        <th>Destino</th>
        <th>Fecha de salida estimada</th>
        <th>Días de retraso en salida</th>
        <th>Fecha de salida</th>
        <th>Fecha de llegada</th>
        <th>Días de tránsito</th>
        <th>KG</th>
        <th>Bultos</th>
        <th>Factura</th>
        <th>Monto</th>
        <th>Comisión comercial</th>
        <th>Status</th>
        <th>Observación</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data_list as $data): ?>
    <tr>
        <td><?php echo $data['id_sale'];?></td>
        <td><?php echo $data['client_name'];?></td>
        <td><?php echo $data['naviera'];?></td>
        <td><?php echo $data['number'];?></td>
        <td><?php echo $data['destino'];?></td>
        <td><?php echo $data['estimada_salida'];?></td>
        <td><?php echo $data['retraso_salida'];?></td>
        <td><?php echo $data['salida'];?></td>
        <td><?php echo $data['llegada'];?></td>
        <td><?php echo $data['dias_transito'];?></td>
        <td><?php echo $data['kgs'];?></th>
        <td><?php echo $data['cases'];?></th>
        <td><?php echo $data['company_name'];?></td>
        <td><?php echo $data['monto'];?></td>
        <td><?php echo $data['comision'];?></td>
        <td><?php echo $data['status'];?></td>
        <td><?php echo $data['observacion_seguimiento'];?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>    
    
    <tfoot>
    <tr>
        <th>ID.Venta</th>
        <th>Cliente</th>
        <th>Naviera</th>
        <th>Contenedor</th>
        <th>Destino</th>
        <th>Fecha de salida estimada</th>
        <th>Días de retraso en salida</th>
        <th>Fecha de salida</th>
        <th>Fecha de llegada</th>
        <th>Días de tránsito</th>
        <th>KG</th>
        <th>Bultos</th>
        <th>Factura Pomadrosa</th>
        <th>Monto</th>
        <th>Comisión comercial</th>
        <th>Status</th>
        <th>Observación</th>
    </tr>
    </tfoot>
</table>
								<a class="btn btn-default"  href="<?php echo full_url."/adm/reporte1/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>

</div>       

<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
    $('#example').DataTable({
		dom: 'Bfrtip',
         "scrollX": true,
        "processing": true,
        "bFilter": false,
        "language": {
        "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        buttons: [
            'excelHtml5',
            'csvHtml5',
        ]
    });
} );
</script>