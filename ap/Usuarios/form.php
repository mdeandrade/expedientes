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

<h1 class="text-center big_title">Usuarios</h1>
<form action="index.php" method="post">
    <input autocomplete="off" type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
    <input autocomplete="off" type="hidden" name='id_usuario' value='<?php if(isset($values['id_usuario']))echo $values['id_usuario'];?>'>

    <div class="form-group col-sm-4">
      <?php if($values['action'] == 'add'):?>
        <label for="exampleInputEmail1">Funcionario <small class="text-danger">(*)</small></label>
            <SELECT NAME="id_persona" size="1" class="form-control" <?php if(isset($values['action']) and ($values['action']=='edit' or $values['action'] == 'update')) echo "disabled='disabled'"?>>
              <OPTION VALUE="">Seleccione...</OPTION>
              <?php foreach($listado_personal as $personal):?>
                <OPTION <?php if(isset($values['id_persona']) and $values['id_persona']== $personal['id_persona']) echo "selected='selected'";?> VALUE="<?php echo $personal['id_persona']?>"><?php echo $personal['nombres']." ".$personal['apellidos']." - ".$personal['doc_iden']?></OPTION>

              <?php endforeach;?>
            </SELECT> 
        <?php if(isset($errors['id_persona']) and $errors['id_persona']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['id_persona'];?></div>
        <?php endif;?>
     <?php endif;?>
  </div>
  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">Nombre de usuario <small class="text-danger">(*)</small></label>
    <input type="text" class="form-control" id="" name="nom_usuario" placeholder="PGonzalez" value="<?php if(isset($values['nom_usuario']) and $values['nom_usuario']!='') echo $values['nom_usuario'];?>">
        <?php if(isset($errors['nom_usuario']) and $errors['nom_usuario']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['nom_usuario'];?></div>
        <?php endif;?>
  </div>
 <div class="form-group col-sm-4">
    <label for="id_grupo">Grupo <small class="text-danger">(*)</small></label>

            <SELECT NAME="id_grupo" size="1" class="form-control">
              <OPTION VALUE="">Seleccione...</OPTION>
              <?php foreach($listado_grupos as $grupos):?>
                <OPTION <?php if(isset($values['id_grupo']) and $values['id_grupo']== $grupos['id_grupo']) echo "selected='selected'";?> VALUE="<?php echo $grupos['id_grupo']?>"><?php echo $grupos['nom_grupo']?></OPTION>

              <?php endforeach;?>
            </SELECT> 	
        <?php if(isset($errors['id_grupo']) and $errors['id_grupo']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['id_grupo'];?></div>
        <?php endif;?>
  </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Clave <small class="text-danger">(*)</small></label>
    <input type="password" name="clave" class="form-control" id="exampleInputEmail1" placeholder="******">
        <?php if(isset($errors['clave']) and $errors['clave']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['clave'];?></div>
        <?php endif;?>
  </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Confirme clave <small class="text-danger">(*)</small></label>
    <input type="password" name="clave2" class="form-control" id="exampleInputEmail1" placeholder="******">
        <?php if(isset($errors['clave2']) and $errors['clave2']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['clave2'];?></div>
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
    <a class="btn btn-default" href="<?php echo full_url?>/ap/Usuarios/index.php">Regresar</a>
    <button type="submit" class="btn btn-success">Aceptar</button>
</div> 
</form>
 
<?php include('../../view_footer_solicitud.php')?>
