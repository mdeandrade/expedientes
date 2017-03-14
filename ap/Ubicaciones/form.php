<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<?php 

$ListasDependientes = new ListasDependientes();
$listado_personal = $ListasDependientes->getListadoPersonalActivo();
$listado_ubicaciones = $ListasDependientes->getListadoUbicacioneslActivas();
$listado_cargos = $ListasDependientes->getListadoCargosActivos();
$listado_grupos = $ListasDependientes->getListadoGruposActivos();

?>
  <!-- Nav tabs -->

<h1 class="text-center big_title">Ubicaciones</h1>
<form action="index.php" method="post">
    <input autocomplete="off" type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
    <input autocomplete="off" type="hidden" name='id_ubicacion' value='<?php if(isset($values['id_ubicacion']))echo $values['id_ubicacion'];?>'>

   
  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Nombre de ubicación <small class="text-danger">(*)</small></label>
    <input type="text" class="form-control" id="" name="nom_ubicacion" placeholder="Asistente" value="<?php if(isset($values['nom_ubicacion']) and $values['nom_ubicacion']!='') echo $values['nom_ubicacion'];?>">
        <?php if(isset($errors['nom_ubicacion']) and $errors['nom_ubicacion']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['nom_ubicacion'];?></div>
        <?php endif;?>
  </div>
 

    <div class="form-group col-sm-12">

        <label class="radio-inline bg-success">
            <input type="radio" name="id_estatus" id="inlineRadio1" value="1" <?php if(isset($values['id_estatus']) and ($values['id_estatus']=='1')) echo "checked='checked'"?> <?php if(!isset($values['id_estatus']) and $values['action']=='add') echo "checked='checked'";?>> Habilitado
        </label>
        <label class="radio-inline bg-danger">
          <input type="radio" name="id_estatus" id="inlineRadio2" value="0" <?php if(isset($values['id_estatus']) and ($values['id_estatus']=='0')) echo "checked='checked'"?>> Deshabilitado
        </label>
 
    </div>
<div class="col-sm-12 col-sm-12">
    Campos obligatorios <small class="text-danger">(*)</small>
</div>   
<div class="col-sm-12 col-sm-12">
    <a class="btn btn-default" href="<?php echo full_url?>/ap/Ubicaciones/index.php">Regresar</a>
    <button type="submit" class="btn btn-success">Aceptar</button>
</div> 
</form>
 
<?php include('../../view_footer_solicitud.php')?>
