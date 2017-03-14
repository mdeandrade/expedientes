<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<?php 
    $disabled = '';
    $Folios = new Folios();
    $ListasDependientes = new ListasDependientes();
    $listado_folios = $ListasDependientes -> getListadoFoliosActivos();
    $Utilitarios = new Utilitarios();
    //$Utilitarios ->getNombreArchivoPHP();
    $ExpedientesDetalles = new ExpedientesDetalles();
    if(isset($values['action']) and $values['action'] == 'update'){
        $disabled = "disabled";
    }

?>
<?php $data_archivo = $Folios->getListadoFolios();?>

<?php foreach($data_archivo as $data):?>

   <input type="hidden" class="form-control" id="<?php echo $data['nom_variable']."_".$data['id_tipdoc']?>" name="<?php echo $data['nom_variable']."_".$data['id_tipdoc']?>" value="0">


<?php endforeach;?>
<h1 class="text-center big_title">Expedientes</h1>
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php if(isset($values['action']) and $values['action']!='') echo $values['action'];?>">
    <input type="hidden" name="id_persona" value="<?php if(isset($values['id_persona']) and $values['id_persona']!='') echo $values['id_persona'];?>">

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#datos_personales" aria-controls="datos_personales" role="tab" data-toggle="tab">Datos personales</a></li>
    <?php foreach($listado_folios as $folio):?>
    <li role="presentation"><a href="#<?php echo $folio['nom_folio'];?>" aria-controls="<?php echo $folio['nom_folio'];?>" role="tab" data-toggle="tab"><?php echo $folio['des_folio'];?></a></li>
    <?php endforeach;?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="datos_personales">
         <?php require('datos_personales.php');?> 
      </div>
      <?php foreach($listado_folios as $folio):?>
      <div role="tabpanel" class="tab-pane" id="<?php echo $folio['nom_folio'];?>">
          <?php require($folio['archivo']);?> 
      </div>
      <?php endforeach;?>
  </div>

</div>
<div class="col-sm-12 col-sm-12">
    Campos obligatorios <small class="text-danger">(*)</small>
</div>   
<div class="col-sm-12 col-sm-12">
    <a class="btn btn-default" href="<?php echo full_url?>/ap/expedientes/index.php" >Regresar</a>
    <button type="submit" class="btn btn-success">Aceptar</button>
</div>  
</form>

<?php include('../../view_footer_solicitud.php')?>
<script>
    function sumaCampo(nom_variable,id_tipdoc){
        var val_actual = $("#"+ nom_variable + "_" + id_tipdoc).val();
        //alert($("#"+ nom_variable + "_" + id_tipdoc).val());
        var val_nuevo = parseInt(val_actual)+1;
        $("#"+ nom_variable + "_" + id_tipdoc).val(val_nuevo)
        //alert(val_nuevo);
        $("#div_" + nom_variable + "_" + id_tipdoc).append('<input type="file" class="form-control" id="" name="documentos_'+ nom_variable + "_" + id_tipdoc +'['+ val_nuevo+']">');
        

    }
    
</script>