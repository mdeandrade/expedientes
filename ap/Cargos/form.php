<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<?php 

$ListasDependientes = new ListasDependientes();
$listado_personal = $ListasDependientes->getListadoPersonalActivo();
$listado_ubicaciones = $ListasDependientes->getListadoUbicacioneslActivas();
$listado_cargos = $ListasDependientes->getListadoCargosActivos();
$listado_grupos = $ListasDependientes->getListadoCargosActivos();

?>
  <!-- Nav tabs -->

<h1 class="text-center big_title">Cargos</h1>
<form action="index.php" method="post">
    <input autocomplete="off" type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
    <input autocomplete="off" type="hidden" name='id_cargo' value='<?php if(isset($values['id_cargo']))echo $values['id_cargo'];?>'>

   
  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Nombre de cargo <small class="text-danger">(*)</small></label>
    <input type="text" class="form-control" id="" name="nom_cargo" placeholder="Asistente" value="<?php if(isset($values['nom_cargo']) and $values['nom_cargo']!='') echo $values['nom_cargo'];?>">
        <?php if(isset($errors['nom_cargo']) and $errors['nom_cargo']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['nom_cargo'];?></div>
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
    <a class="btn btn-default" href="<?php echo full_url?>/ap/Cargos/index.php">Regresar</a>
    <button type="submit" class="btn btn-success">Aceptar</button>
</div> 
</form>
 
<?php include('../../view_footer_solicitud.php')?>
