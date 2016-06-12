<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<div class="container">
	<h1 class="text-center">Ventas</h1>
	<table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Cliente</th>
					<th>Fecha de venta</th>
					<th>País de entrada</th>
					<th>Puerto de entrada</th>
					<th>Linea naviera</th>
					<th>Estatus</th>					
					<th>Acciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Id</th>
					<th>Cliente</th>
					<th>Fecha de venta</th>
					<th>País de entrada</th>
					<th>Puerto de entrada</th>
					<th>Linea naviera</th>
					<th>Estatus</th>					
					<th>Acciones</th>
				</tr>
			</tfoot>
		</table>
	<a class="btn btn-default"  href="<?php echo full_url."/adm/sales/index.php?action=new"?>"><i class="fa fa-file-o fa-pull-left fa-border"></i>Agregar</a>
</div>
	<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo full_url."/adm/sales/index.php?action=sales_list_json"?>",
		"language": {
                "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        "columns": [
            { "data": "id_sale" },
			{ "data": "client_name" },
			{ "data": "date_sale" },
			{ "data": "country_name" },
			{ "data": "port_name" },
			{ "data": "name_shipping_lines" },
			{ "data": "status" },
            { "data": "actions" }
        ],
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 7 ] }
       ]				
    });
} );

</script>
