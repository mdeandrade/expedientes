<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<div class="container">
	<h1 class="text-center big_title">Expedientes</h1>
	<table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>ID.Expediente</th>
                                        <th>Cod.Expediente</th>
                                        <th>Funcionario</th>
                                        <th>Estatus</th>
					<th>Detalle</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th><input id="id_expediente" name="id_expediente" type="text"></th>
                                        <th><input id="cod_expediente" name="cod_expediente" type="text"></th>
                                        <th><input id="id_persona" name="id_persona" type="text"></th>
                                        <th><input id="id_estatus" name="id_estatus" type="text"></th>			
					<th>Detalle</th>
				</tr>
			</tfoot>
		</table>

	<a class="btn btn-success"  href="<?php echo full_url."/ap/expedientes/index.php?action=new"?>"><i class="fa fa-file-o fa-pull-left fa-border"></i> Agregar</a>
</div>
	<?php include('../../view_footer_solicitud.php')?>
<script>

	
$(document).ready(function() {
	
	$('#example tfoot th').each( function () {
		var title = $('#example thead th').eq( $(this).index() ).text();
		
		if(title != 'Detalle')
		{
			$(this).html( '<input size="10" class="input-sm filtros" id="column_'+$(this).index()+'" type="text" placeholder="'+title+'" />' );			
		}
		if(title == 'Detalle')
		{
			$(this).html( '<button id="clear">Limpiar</button>' );	
		}

	} );

	
    var table = $('#example').DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
		 "sDom": 'ltrip',
        "ajax": "<?php echo full_url."/ap/expedientes/index.php?action=list_json"?>",
		"language": {
                "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        "columns": [
            { "data": "id_expediente" },
            { "data": "cod_expediente" },
            { "data": "nom_funcionario" },
            { "data": "nom_estatus" },
            { "data": "actions" }
        ],
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 4 ] }
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

	$('#clear').click(function(){
		table.search( '' ).columns().search( '' ).draw();
		$('.filtros').val('');
	});


} );

</script>