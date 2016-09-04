<?php include('../../view_header.php')?>
<?php include('../menu.php')?>

<div class="container">
    <h1 class="text-center">Clientes</h1>
    <table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Identificador fiscal</th>
                    <th>Persona Contacto</th>
                    <th>Teléfono</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Identificador fiscal</th>
                    <th>Persona Contacto</th>
                    <th>Teléfono</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    <a class="btn btn-default"  href="<?php echo full_url."/adm/clients/index.php?action=new"?>"><i class="fa fa-file-o fa-pull-left fa-border"></i>Agregar</a>
</div>
<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo full_url."/adm/clients/index.php?action=clients_list_json"?>",
		"language": {
                "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        "columns": [
            { "data": "id_client" },
            { "data": "name" },
            { "data": "rif" },
            { "data": "contact1" },
            { "data": "phone1" },
            { "data": "status" },
            { "data": "actions" }
        ],
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 6 ] }
       ]				
    });
} );

</script>