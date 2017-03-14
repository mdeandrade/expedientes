<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<h1 class="text-center">Control de préstamos de expedientes</h1>
<div class="col-sm-12 text-right">
    <form style="background-color: #ccc;" class="form-inline" enctype="multipart/form-data" action="index.php" method="POST">
    <input autocomplete="off" type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
    <div class="form-group">
    <label for="exampleInputName2">Cédula</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="V-12345678">
    </div>
    <button type="submit" class="btn btn-success">Buscar  </button>
    </form>    
</div>

  <div class="form-group col-sm-12">
    <h2 class="text-center">Expediente N° V- </h2>
  </div>
  <div class="form-group col-sm-3">
    Expediente N°: <b>V-</b>
  </div> 
  <div class="form-group col-sm-3" >
    Funcionario: <b> AAA</b>
  </div>  
  <div class="form-group col-sm-3" >
    Cargo: <b>BBB</b>
  </div> 
  <div class="form-group col-sm-3" >
    Ubicación administrativa: <b>CCC</b>
  </div> 
  <div class="form-group col-sm-12">
    <h2 class="text-center">Datos solicitante</h2>
  </div>
  <div class="form-group col-sm-12">
      <label for="exampleInputEmail1">Cédula del Solicitante <small class="text-danger">(*)</small></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="V-12345678">
  </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Nombres del Solicitante <small class="text-danger">(*)</small></label>
    <input type="email " class="form-control" id="exampleInputEmail1" placeholder="Pedro Javier">
  </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Apellidos del Solicitante <small class="text-danger">(*)</small></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Pérez Gonzalez">
  </div>

  <div class="form-group col-sm-6">

    <label for="UbiadminSolicitante">Ubicación administrativa <small class="text-danger">(*)</small></label>

            <SELECT NAME="UbiadminSolicitante" size="1" required class="form-control">
              <OPTION VALUE="0">Seleccione...</OPTION>
              <OPTION VALUE="1">DESPACHO DEL CONTRALOR METROPOLITANO DE CARACAS</OPTION>
              <OPTION VALUE="2">DESPACHO DEL SUB CONTRALOR METROPOLITANO DE CARACAS</OPTION>
              <OPTION VALUE="3">DIRECCIÓN DE CONSULTORÍA JURÍDICA</OPTION>
            </SELECT> 	
 
  </div>

  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Fecha y Hora de la Solicitud del Expediente <small class="text-danger">(*)</small></label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="2017-02-01"/>
  </div>

  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Fecha y Hora de Devolución del Expediente <small class="text-danger">(*)</small></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="2017-02-01"/>
  </div>

  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Nombres del responsable del archivo, que entrega y recibe el expediente <small class="text-danger">(*)</small></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Recursos Humanos">
  </div>
 </div>
   <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Apellidos del responsable del archivo, que entrega y recibe el expediente <small class="text-danger">(*)</small></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Recursos Humanos">
  </div>
 </div>
   <div class="form-group col-sm-6">
      <label for="exampleInputEmail1">Documento de Justificación para el Prestamo del Expediente <small class="text-danger">(*)</small></label>
        <input type="file" class="form-control" id="exampleInputEmail1" placeholder="V-12345678">
  </div> 
  <div class="form-group col-sm-6">    
      <button class="btn btn-success">Guardar</button>
  </div>
<?php include('../../view_footer_solicitud.php')?>


