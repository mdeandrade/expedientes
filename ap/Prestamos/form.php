<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<?php 

$ListasDependientes = new ListasDependientes();
$listado_personal = $ListasDependientes->getListadoPersonalActivo2();
$listado_ubicaciones = $ListasDependientes->getListadoUbicacioneslActivas();
$listado_cargos = $ListasDependientes->getListadoCargosActivos();
$listado_grupos = $ListasDependientes->getListadoGruposActivos();

?>
  <!-- Nav tabs -->
<?php //echo $values['id_persona'];die;?>
<h1 class="text-center big_title">Préstamo de expedientes</h1>
<form action="index.php" method="post">
    <input autocomplete="off" type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
    <input autocomplete="off" type="hidden" name='id_expediente_prestamo' value='<?php if(isset($values['id_expediente_prestamo']))echo $values['id_expediente_prestamo'];?>'>
    <input autocomplete="off" type="hidden" name='id_expediente' value='<?php if(isset($values['id_expediente']))echo $values['id_expediente'];?>'>

    <div class="form-group col-sm-6">

        <label for="exampleInputEmail1">Funcionario Solicitante<small class="text-danger">(*)</small></label>
            <SELECT NAME="id_persona" size="1" class="form-control" >
              <OPTION VALUE="">Seleccione...</OPTION>
              <?php foreach($listado_personal as $personal):?>
                <OPTION <?php if(isset($values['id_persona']) and $values['id_persona']== $personal['id_persona']) echo "selected='selected'";?> VALUE="<?php echo $personal['id_persona']?>"><?php echo $personal['nombres']." ".$personal['apellidos']." - ".$personal['doc_iden']?></OPTION>
              <?php endforeach;?>
            </SELECT> 
        <?php if(isset($errors['id_persona']) and $errors['id_persona']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['id_persona'];?></div>
        <?php endif;?>
  </div>
  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Fecha de la Solicitud del Expediente <small class="text-danger">(*)</small></label>
        <input type="tex" class="form-control" id="fec_prestamo" name="fec_prestamo" placeholder="AAAA-MM-DD" value="<?php if(isset($values['fec_prestamo']) and $values['fec_prestamo']!='') echo $values['fec_prestamo']?>"/>
          <?php if(isset($errors['fec_prestamo']) and $errors['fec_prestamo']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['fec_prestamo'];?></div>
        <?php endif;?>
  </div>
  <div class="form-group col-sm-12">

        <label for="documento">Tipo de Documento <small class="text-danger">(*)</small></label>

                <SELECT NAME="documento" class="form-control">
                  <OPTION VALUE="">Seleccione...</OPTION>
                  <OPTION VALUE="MEMORANDO" <?php if(isset($values['documento']) and $values['documento']=='MEMORANDO') echo "selected='selected'";?>>Memorando</OPTION>
                  <OPTION VALUE="OFICIO" <?php if(isset($values['documento']) and $values['documento']=='OFICIO') echo "selected='selected'";?>>Oficio</OPTION>

                </SELECT> 
        <?php if(isset($errors['documento']) and $errors['documento']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['documento'];?></div>
        <?php endif;?>
  </div>

  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Número de Memorando o Oficio <small class="text-danger">(*)</small></label>
    <input type="tex" class="form-control" id="numero_documento" name="numero_documento" placeholder="Memorando N° DC-2017-000  / OFICIO N° DC-2017-000" value="<?php if(isset($values['numero_documento']) and $values['numero_documento']!='') echo $values['numero_documento']?>"/>
        <?php if(isset($errors['numero_documento']) and $errors['numero_documento']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['numero_documento'];?></div>
        <?php endif;?>
  </div>

  <div class="form-group col-sm-12">
    <label for="exampleInputEmail1">Fecha del Memorando o Oficio <small class="text-danger">(*)</small></label>
        <input type="tex" class="form-control" id="fec_documento" name="fec_documento" placeholder="AAAA-MM-DD" value="<?php if(isset($values['fec_documento']) and $values['fec_documento']!='') echo $values['fec_documento']?>"/>
        <?php if(isset($errors['fec_documento']) and $errors['fec_documento']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['fec_documento'];?></div>
        <?php endif;?>
  </div>

   <!--<div class="form-group col-sm-12">
      <label for="exampleInputEmail1">Documento de Justificación para el Prestamo del Expediente <small class="text-danger">(*)</small></label>
        <input type="file" class="form-control" id="exampleInputEmail1" placeholder="V-12345678">
  </div>-->
    <div class="form-group col-sm-12">

        <label for="exampleInputEmail1">Autorizado por: <small class="text-danger">(*)</small></label>
            <SELECT NAME="autorizado_por" size="1" class="form-control" >
              <OPTION VALUE="">Seleccione...</OPTION>
              <?php foreach($listado_personal as $personal):?>
                <OPTION <?php if(isset($values['autorizado_por']) and $values['autorizado_por']== $personal['id_persona']) echo "selected='selected'";?> VALUE="<?php echo $personal['id_persona']?>"><?php echo $personal['nombres']." ".$personal['apellidos']." - ".$personal['doc_iden']?></OPTION>
              <?php endforeach;?>
            </SELECT> 
        <?php if(isset($errors['autorizado_por']) and $errors['autorizado_por']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['autorizado_por'];?></div>
        <?php endif;?>

  </div>
        <?php if(isset($values['id_expediente_prestamo']) and $values['action']=='update'):?>
        <div class="form-group col-sm-12">
    <label for="fec_devolucion">Fecha de devolución <small class="text-danger"></small></label>

        <input type="tex" class="form-control" id="fec_devolucion" name="fec_devolucion" placeholder="AAAA-MM-DD" value="<?php if(isset($values['fec_devolucion']) and $values['fec_devolucion']!='') echo $values['fec_devolucion']?>"/>
        </div>
        <?php endif;?>   
  <div class="form-group col-sm-12">
      <a class="btn btn-default" href="<?php echo full_url?>/ap/Prestamos/index.php">Regresar</a>
      <button class="btn btn-success">Guardar</button>
  </div>
<?php include('../../view_footer_solicitud.php')?>

