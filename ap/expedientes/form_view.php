<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>
<h1 class="text-center">Consultas de expedientes</h1>
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
<?php include('../../view_footer_solicitud.php')?>
