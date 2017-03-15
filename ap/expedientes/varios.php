<?php $data_archivo = $Folios->getListadoFoliosArchivo('varios.php');?>

<?php foreach($data_archivo as $data):?>

  <div class="form-group col-sm-6" id="div_<?php echo $data['nom_variable']."_".$data['id_tipdoc'];?>">
        <label><?php echo $data['nom_tipdoc']?> 
            <?php if($data['multiple']=='S'):?>
            <b class=""><a onclick="sumaCampo('<?php echo $data['nom_variable']?>','<?php echo $data['id_tipdoc']?>');">[ + ]</a></b>
            <?php endif; ?>
        </label>
        <?php if(isset($values['id_persona']) and $values['id_persona']!=''):?>
        
            <?php $listado_archivos = $ExpedientesDetalles->getDocumentosExpedienteArchivo($values['id_persona'],'varios.php',$data['id_folio'],$data['id_tipdoc']);?>
                <?php if(count($listado_archivos)>0):?>
                    <?php foreach($listado_archivos as $archivo):?>
                        <div class="bg bg-success">
                        <?php $porciones = explode("/",$archivo['ubi_docserver']);?>
                            <a href="<?php echo full_url?>/web/files/Expedientes<?php echo $archivo['ubi_docserver'];?>" target="_blank"><?php echo $porciones[3]?></a>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
        
         <?php endif;?> 
        <input type="file" class="form-control" id="" name="<?php echo "documentos_".$data['nom_variable']."_".$data['id_folio']."_".$data['id_tipdoc']?>[0]">
  </div>


<?php endforeach;?>
