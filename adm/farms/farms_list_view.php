<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<h1 class="text-center"><label class="label label-default">Granjas</label></h1>
<table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Status</th>
                <th>Fecha creado</th>
		<th>Fecha Modificado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Status</th>
                <th>Fecha creado</th>
		<th>Fecha Modificado</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
<a class="btn btn-default"  href="<?php echo full_url."/adm/farms/index.php?action=new"?>"><i class="fa fa-file-o fa-pull-left fa-border"></i>Agregar</a>
<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo full_url."/adm/farms/index.php?action=farms_list_json"?>",
		"language": {
                "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        "columns": [
            { "data": "id_farm" },
            { "data": "name" },
            { "data": "status" },
            { "data": "date_created" },
            { "data": "date_updated" },
            { "data": "actions" }
        ],
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 5 ] }
       ]				
    });
} );

</script>
