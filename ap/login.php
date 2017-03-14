<?php include("../view_header.php");?>

        	<div class="col-md-4 col-lg-4">
        	</div>
        	
            <div class="col-md-4 col-lg-4">
				 <div class="panel panel-vinotinto ">
					<div class="panel-heading" >
					  <h4 class="panel-title">Sistema de registro y control de expedientes</h4>
					</div>
				  <div class="panel-body">
                                      
                                      <div align='center' class="visible-lg visible-md">
                                         <img src="<?php echo full_url;?>/web/img/contraloria.png" class="img-responsive" width="150"> 
                                      </div>
                                      <div align='center' class="visible-sm visible-xs">
                                         <!--<img src="<?php echo full_url;?>/web/img/g190.png" class="img-responsive" width="100"> -->
                                      </div>					
                                        <form name="" id="" novalidate action="<?php echo full_url;?>/ap/index.php" method="POST">
			                
                                <input type="hidden" name="action" value="acceso"/>
			                    <div class="control-group form-group">
			                        <div class="controls">
			                            <label>Usuario:</label>
										
										<input type="text" autocomplete="off" class="form-control" name="nom_usuario" placeholder=""  required />
											
										
			                            <p class="help-block"></p>
			                        </div>
			                    </div>
			                    <div class="control-group form-group">
			                        <div class="controls">
			                            <label>Clave:</label>
			                            <input autocomplete="off" name='clave' type="password" class="form-control" id="password" required data-validation-required-message="">
			                        </div>
			                    </div>
								<div class="control-group form-group">
			                        <div class="controls">
										<?php /*

											  $options = array();
											  $options['input_name']             = 'ct_captcha'; // change name of input element for form post
											  $options['disable_flash_fallback'] = false; // allow flash fallback
											  $options['show_audio_button'] = false;

											  if (!empty($_SESSION['ctform']['captcha_error'])) {
												// error html to show in captcha output
												$options['error_html'] = $_SESSION['ctform']['captcha_error'];
											  }

											  echo "<div id='captcha_container_1' class='text-center'>\n";
											  echo Securimage::getCaptchaHtml($options);
											  echo "\n</div><strong><p class='text-center small'>Respete letras mayúsculas y minúsculas</p></strong>\n";
										 */?>
			 							
							
								                           
			                           
			                        </div>
			                    </div>
							<div class="row">
                                                            <div align="center">
                                                                <button type="submit" class="btn-lg btn-success">Conectar <i class="fa fa-arrow-right"></i></button>


                                                            </div>
							</div>
							<div class="row">
                                                            <div align="center">
                                                                <a href="<?php echo full_url;?>/ap/registrarse.php"> ¡Recuperación de clave !</a>
								<hr>
                                                            </div>
                                                            
							</div>
			                    <!-- For success/fail messages -->
			                    
			                    <?php if(isset($values['message']) and $values['message']!=''):?>
											<script>
												$(document).ready(function(){
												$('.modal-body').html('<div class="alert alert-success" role="alert"><?php echo $values['message']?></div>');
												$('#myModal').modal('show');	
												});


											</script>

			                    <?php endif;?>
								<?php if(isset($values['errors']) and $values['errors']!=''):?>
			                    	
			                    	<div id="" class="alert alert-danger"><?php echo $values['errors'];?></div>
			                    <?php endif;?>
			                </form>
				  </div>
				</div>              
            </div>

<?php include("../view_footer_clean.php");?>		
