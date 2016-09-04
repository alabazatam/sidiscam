<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<link href="<?php echo full_url;?>/web/css/buttons.dataTables.min.css" rel="stylesheet">
<div class="container">
	<h1 class="text-center">Reporte de contenedores</h1>
	<table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Cliente</th>
					<th>Nro de contenedor</th>
					<th>Total de Kgs</th>
					<th>Destino</th>
					<th>Naviera</th>					
					<th>Acciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Id</th>
					<th>Cliente</th>
					<th>Nro de contenedor</th>
					<th>Total de Kgs</th>
					<th>Destino</th>
					<th>Naviera</th>					
					<th>Acciones</th>
				</tr>
			</tfoot>
		</table>
	<a class="btn btn-default"  href="<?php echo full_url."/adm/sales/index.php?action=new"?>"><i class="fa fa-file-o fa-pull-left fa-border"></i>Agregar</a>
</div>
	<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
	$('#example tfoot th').each( function () {
		var title = $('#example thead th').eq( $(this).index() ).text();
		
		if(title != 'Acciones')
		{       //$('#toogles').append('- <a class="btn btn-success toggle-vis" data-column="'+$(this).index()+'">'+title+'</a>' );
			$(this).html( '<input size="10" class="input-sm" id="column_'+$(this).index()+'" type="text" placeholder="'+title+'" />' );			
		}
		if(title == 'Acciones')
		{
			$(this).html( '<button id="clear">Limpiar</button>' );	
		}
		if(title == 'Total de Kgs')
		{
			$(this).html( '' );	
		}		

	} );
    var table = $('#example').DataTable({
		dom: 'Bfrtip',
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo full_url."/adm/reporte1/index.php?action=reporte1_list_json"?>",
		"language": {
                "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "columns": [
            { "data": "id_sale" },
			{ "data": "client_name" },
			{ "data": "number" },
			{ "data": "KGS" },
			{ "data": "destino" },
			{ "data": "naviera" },
            { "data": "actions" }
        ],
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 3,6 ] }
       ]				
    });
$('#column_0').on ('keypress', function(e){
    if(e.which == 13) {
        table.column(table.column(0)).search($(this).val()).draw();
    }
});
$('#column_1').on ('keypress', function(e){
    if(e.which == 13) {
        table.column(table.column(1)).search($(this).val()).draw();
    }
});
$('#column_2').on ('keypress', function(e){
    if(e.which == 13) {
        table.column(table.column(2)).search($(this).val()).draw();
    }
});
$('#column_3').on ('keypress', function(e){
    if(e.which == 13) {
        table.column(table.column(3)).search($(this).val()).draw();
    }
});
$('#column_4').on ('keypress', function(e){
    if(e.which == 13) {
        table.column(table.column(4)).search($(this).val()).draw();
    }
});
$('#column_5').on ('keypress', function(e){
    if(e.which == 13) {
        table.column(table.column(5)).search($(this).val()).draw();
    }
});
	$('#clear').click(function(){
		table.search( '' ).columns().search( '' ).draw();
	});
} );

</script>
