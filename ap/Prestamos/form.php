<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<?php 

$ListasDependientes = new ListasDependientes();
$listado_personal = $ListasDependientes->getListadoPersonalActivo();
$listado_ubicaciones = $ListasDependientes->getListadoUbicacioneslActivas();
$listado_cargos = $ListasDependientes->getListadoCargosActivos();
$listado_grupos = $ListasDependientes->getListadoGruposActivos();

?>

<h1 class="text-center">Control de préstamos de expedientes</h1>
<div class="col-sm-12 text-right">
    <form style="background-color: #ccc;" class="form-inline" enctype="multipart/form-data" action="index.php" method="POST">
    <input autocomplete="off" type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>

    </form>    
</div>


            <div class="form-group col-sm-12">
              <h2 class="text-center">Datos solicitante</h2>
            </div>

    <div class="form-group col-sm-6">
      <?php if($values['action'] == 'add'):?>
        <label for="exampleInputEmail1">Funcionario Solicitante<small class="text-danger">(*)</small></label>
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

    <div class="form-group col-sm-6">
      <?php if($values['action'] == 'add'):?>
        <label for="exampleInputEmail1">Expediente a solicitar <small class="text-danger">(*)</small></label>
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

  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Fecha de la Solicitud del Expediente <small class="text-danger">(*)</small></label>
        <input type="tex" class="form-control" id="exampleInputEmail1" placeholder="AAAA-MM-DD"/>
  </div>
  <div class="form-group col-sm-12">

        <label for="tipo_documento">Tipo de Documento <small class="text-danger">(*)</small></label>

                <SELECT NAME="tipo_documento" class="form-control">
                  <OPTION VALUE="">Seleccione...</OPTION>
                  <OPTION VALUE="MEMORANDO">Memorando</OPTION>
                  <OPTION VALUE="OFICIO">Oficio</OPTION>

                </SELECT> 
        <?php if(isset($errors['tipo_documento']) and $errors['tipo_documento']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['tipo_documento'];?></div>
        <?php endif;?>
  </div>

  <!--<div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Fecha de Devolución del Expediente <small class="text-danger">(*)</small></label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="AAAA-MM-DD"/>
  </div>-->

  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Número de Memorando o Oficio <small class="text-danger">(*)</small></label>
        <input type="tex" class="form-control" id="exampleInputEmail1" placeholder="Memorando N° DC-2017-000  / OFICIO N° DC-2017-000"/>
  </div>

  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Fecha del Memorando o Oficio <small class="text-danger">(*)</small></label>
        <input type="tex" class="form-control" id="exampleInputEmail1" placeholder="AAAA-MM-DD"/>
  </div>

   <div class="form-group col-sm-12">
      <label for="exampleInputEmail1">Documento de Justificación para el Prestamo del Expediente <small class="text-danger">(*)</small></label>
        <input type="file" class="form-control" id="exampleInputEmail1" placeholder="V-12345678">
  </div>
    <div class="form-group col-sm-12">
      <?php if($values['action'] == 'add'):?>
        <label for="exampleInputEmail1">Autorizado por: <small class="text-danger">(*)</small></label>
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

  <div class="form-group col-sm-12">    
      <button class="btn btn-success">Guardar</button>
  </div>
<?php include('../../view_footer_solicitud.php')?>


