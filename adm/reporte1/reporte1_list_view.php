<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<link href="<?php echo full_url;?>/web/css/buttons.dataTables.min.css" rel="stylesheet">
<div class="container">
	<h1 class="text-center">Reporte de contenedores</h1>

 	<div class="col-sm-12 col-md-12 alert alert-info">
		<div class="col-sm-4 col-md-4">
			<label>Fecha desde: </label>
			<input id="desde" name="desde" type="text">
		</div>
		<div class="col-sm-4 col-md-4">
			<label>Fecha hasta: </label>
			<input id="hasta" name="hasta" type="text">
		</div>
		<div class="col-sm-4 col-md-4">
			<a id="buscar" class="btn btn-success"><i class="fa fa-filter"></i> Filtrar por fechas</a>
		</div>			

            

	</div>           

 
	<table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>ID.Venta</th>
					<th>Cliente</th>
					<th>Nro de contenedor</th>
					<th>Total de Kgs</th>
					<th>Destino</th>
					<th>Naviera</th>					
					<!--<th>Acciones</th>-->
					<th>Granja</th>
					<th>Fecha estimada salida</th>
					<th>Retraso en salida</th>
					<th>Fecha de salida</th>
					<th>Fecha de llegada</th>
					<th>Días en tránsito</th>
					<th>KGS</th>
					<th>Bultos</th>
					<th>Factura</th>
					<th>Monto</th>
					<th>Comisión</th>
					<th>Status</th>
					<th>Observación</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID.Venta</th>
					<th>Cliente</th>
					<th>Nro de contenedor</th>
					<th>Total de Kgs</th>
					<th>Destino</th>
					<th>Naviera</th>					
					<!--<th>Acciones</th>-->
					<th>Granja</th>
					<th>Fecha estimada salida</th>
					<th>Retraso en salida</th>
					<th>Fecha de salida</th>
					<th>Fecha de llegada</th>
					<th>Días en tránsito</th>
					<th>KGS</th>
					<th>Bultos</th>
					<th>Factura</th>
					<th>Monto</th>
					<th>Comisión</th>
					<th>Status</th>
					<th>Observación</th>
				</tr>
			</tfoot>
		</table>

</div>
	<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
	$('#example tfoot th').each( function () {
		/*var title = $('#example thead th').eq( $(this).index() ).text();
		
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
		}	*/	

	} );
    var table = $('#example').DataTable({
		dom: 'Bfrtip',
        "scrollX": true,
        "processing": true,
        "serverSide": true,
		"bFilter": false,
        "ajax": {
			"url": "<?php echo full_url."/adm/reporte1/index.php?action=reporte1_list_json"?>",
			"data": function(d) {
                    d.desde = $('#desde').val();
                    d.hasta =  $('#hasta').val();
					d.id = $('#column_0').val();
					}
			},
		"language": {
                "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        buttons: [
            'excelHtml5',
            'csvHtml5',
        ],
        "columns": [
            { "data": "id_sale" },
			{ "data": "client_name" },
			{ "data": "number" },
			{ "data": "KGS" },
			{ "data": "destino" },
			{ "data": "naviera" },
            //{ "data": "actions" },
			{ "data": "granja" },
			{ "data": "estimada_salida" },
			{ "data": "retraso_salida" },
			{ "data": "salida" },
			{ "data": "llegada" },
			{ "data": "dias_transito" },
			{ "data": "KGS" },
			{ "data": "cases" },
			{ "data": "factura" },
			{ "data": "monto" },
			{ "data": "comision" },
			{ "data": "status_seguimiento" },
			{ "data": "observacion_seguimiento" }
        ],
      "aoColumnDefs": [
          { 
			  'bSortable': false, 
			  'aTargets': [ 3 ] 
		  },
          {
                "targets": [ 6,7,8,9,10,11,12,13,14,15,16,17,18 ],
                "visible": false
           }
		  
       ],
			   
    });
/*$('#column_0').on ('keypress', function(e){
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
	});*/
	
$('#buscar').click(function(){
	 table.draw();
});


} );

</script>