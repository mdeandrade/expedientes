<?php 

    $ListasDependientes = new ListasDependientes();
    $listado_ubicaciones = $ListasDependientes->getListadoUbicacioneslActivas();
    $listadoCargosActivos = $ListasDependientes->getListadoCargosActivos();
?>
  <div class="form-group col-sm-4">
      <label for="doc_iden">Cédula<small class="text-danger">(*)</small></label>
    <input type="text" name="doc_iden" class="form-control" id="doc_iden" placeholder="V-12345678" value="<?php if(isset($values['doc_iden']) and $values['doc_iden'] !='') echo $values['doc_iden'];?>" <?php echo $disabled;?>>
        <?php if(isset($errors['doc_iden']) and $errors['doc_iden']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['doc_iden'];?></div>
        <?php endif;?>
  </div>
  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">Nombres<small class="text-danger">(*)</small></label>
    <input type="text " class="form-control" name="nombres" id="nombres" placeholder="Pedro Javier" value="<?php if(isset($values['nombres']) and $values['nombres'] !='') echo $values['nombres'];?>">
        <?php if(isset($errors['nombres']) and $errors['nombres']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['nombres'];?></div>
        <?php endif;?>
    
  </div>
  <div class="form-group col-sm-4">
    <label for="apellidos">Apellidos<small class="text-danger">(*)</small></label>
    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Pérez Gonzalez" value="<?php if(isset($values['apellidos']) and $values['apellidos'] !='') echo $values['apellidos'];?>">
        <?php if(isset($errors['apellidos']) and $errors['apellidos']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['apellidos'];?></div>
        <?php endif;?>
  </div>
  <div class="form-group col-sm-6">

        <label for="sexo">Sexo <small class="text-danger">(*)</small></label>

                <SELECT NAME="sexo" class="form-control">
                  <OPTION VALUE="">Seleccione...</OPTION>
                  <OPTION VALUE="F" <?php if(isset($values['sexo']) and $values['sexo']=='F') echo "selected='selected'"?>>Femenino</OPTION>
                  <OPTION VALUE="M" <?php if(isset($values['sexo']) and $values['sexo']=='M') echo "selected='selected'"?>>Masculino</OPTION>

                </SELECT> 
        <?php if(isset($errors['sexo']) and $errors['sexo']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['sexo'];?></div>
        <?php endif;?>
  </div>
  <div class="form-group col-sm-6">
    <label for="fec_nac">Fecha de Nacimiento <small class="text-danger">(*)</small></label>
    <input type="text" maxlength="10" class="form-control" id="fec_nac" name="fec_nac" placeholder="1980-02-01" value="<?php if(isset($values['fec_nac']) and $values['fec_nac'] !='') echo $values['fec_nac'];?>" />
        <?php if(isset($errors['fec_nac']) and $errors['fec_nac']!=''):?>
        <div class="alert alert-danger"><?php echo $errors['fec_nac'];?></div>
        <?php endif;?>
  </div>

  <div class="form-group col-sm-6">
    <label for="Cargos">Cargo <small class="text-danger">(*)</small></label>

            <SELECT NAME="id_cargo" class="form-control">
                
                <OPTION VALUE="">Seleccione...</OPTION>  
              <?php foreach($listadoCargosActivos as $cargos):?> 
              
                <OPTION VALUE="<?php echo $cargos['id_cargo'];?>" <?php if(isset($values['id_cargo']) and $values['id_cargo']==$cargos['id_cargo']) echo "selected='selected'"?>><?php echo $cargos['nom_cargo']?></OPTION>

              <?php endforeach;?>
            </SELECT> 	
                <?php if(isset($errors['id_cargo']) and $errors['id_cargo']!=''):?>
                <div class="alert alert-danger"><?php echo $errors['id_cargo'];?></div>
                <?php endif;?>
  </div>

 <div class="form-group col-sm-6">

    <label for="Cargo">Ubicación administrativa <small class="text-danger">(*)</small></label>

            <SELECT NAME="id_ubicacion" class="form-control">
            
                <OPTION VALUE="">Seleccione...</OPTION>  
              <?php foreach($listado_ubicaciones as $ubicaciones):?> 
              
                <OPTION VALUE="<?php echo $ubicaciones['id_ubicacion'];?>" <?php if(isset($values['id_ubicacion']) and $values['id_ubicacion']==$ubicaciones['id_ubicacion']) echo "selected='selected'"?>><?php echo $ubicaciones['nom_ubicacion']?></OPTION>

              <?php endforeach;?>
                
            </SELECT> 	
                <?php if(isset($errors['id_ubicacion']) and $errors['id_ubicacion']!=''):?>
                <div class="alert alert-danger"><?php echo $errors['id_ubicacion'];?></div>
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

