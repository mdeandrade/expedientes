<?php include('../../view_header_app.php')?>
<?php include('../menu.php')?>

  <!-- Nav tabs -->
<h1 class="text-center">Cambio de clave</h1>
<div class="container">
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

      <div class="form-group col-sm-12">
        <label for="exampleInputEmail1">Clave anterior</label>
        <input type="password" name="clave_anterior" class="form-control" id="exampleInputEmail1" placeholder="******">
            <?php if(isset($errors['clave_anterior']) and $errors['clave_anterior']!=''):?>
            <div class="alert alert-danger"><?php echo $errors['clave_anterior'];?></div>
            <?php endif;?>
      </div>
      <div class="form-group col-sm-12">
        <label for="exampleInputEmail1">Clave nueva <small class="text-danger">(*)</small></label>
        <input type="password" name="clave_nueva" class="form-control" id="exampleInputEmail1" placeholder="******">
            <?php if(isset($errors['clave_nueva']) and $errors['clave_nueva']!=''):?>
            <div class="alert alert-danger"><?php echo $errors['clave_nueva'];?></div>
            <?php endif;?>
      </div>
        <div class="form-group col-sm-12">
        <label for="exampleInputEmail1">Confirme clave nueva <small class="text-danger">(*)</small></label>
        <input type="password" name="clave_nueva2" class="form-control" id="exampleInputEmail1" placeholder="******">
            <?php if(isset($errors['clave_nueva2']) and $errors['clave_nueva2']!=''):?>
            <div class="alert alert-danger"><?php echo $errors['clave_nueva2'];?></div>
            <?php endif;?>
        </div>
    <div class="col-sm-12 col-sm-12">
        Campos obligatorios <small class="text-danger">(*)</small>
    </div>   
    <div class="col-sm-12 col-sm-12">
        <button type="submit" class="btn btn-success">Aceptar</button>
    </div>  

    </form>    
</div>


<?php include('../../view_footer_solicitud.php')?>