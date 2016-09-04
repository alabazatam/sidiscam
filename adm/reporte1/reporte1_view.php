<?php include('../../view_header.php')?>
<?php include('../menu.php')?>

<table id="example">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nro</th>
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
    </thead>
    <tbody>
    <?php foreach($data_list as $data): ?>
    <tr>
        <td><?php echo $data['id_sale'];?></td>
        <td>Nro</td>
        <td><?php echo $data['client_name'];?></td>
        <td><?php echo $data['naviera'];?></td>
        <td><?php echo $data['number'];?></td>
        <td><?php echo $data['destino'];?></td>
        <td><?php echo $data['estimada_salida'];?></td>
        <td>Días de retraso en salida</td>
        <td><?php echo $data['salida'];?></td>
        <td><?php echo $data['llegada'];?></td>
        <td>Días de tránsito</td>
        <td><?php echo $data['kgs'];?></th>
        <td><?php echo $data['cases'];?></th>
        <td>Factura Pomadrosa</td>
        <td><?php echo $data['monto'];?></td>
        <td><?php echo $data['comision'];?></td>
        <td><?php echo $data['status'];?></td>
        <td>Observación</td>
    </tr>
    <?php endforeach; ?>
    </tbody>    
    
    <tfoot>
    <tr>
        <th>ID</th>
        <th>Nro</th>
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
        

<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
    $('#example').DataTable({
         "scrollX": true,
        "processing": true,
        "bFilter": false,
        "language": {
        "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
    });
} );
</script>