<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="container">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel"></h3>
          </div>
              <div class="modal-body" >
                
              </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> Cerrar</i></button>
          </div>
        </div>
    </div>                                      
</div>
			<div class="modal fade" id="myModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalMessageLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalMessageLabel"></h4>
				  </div>
				  <div class="modal-body">
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				  </div>
				</div>
			  </div>
			</div>
</body>
</html>
<script src="<?php echo full_url;?>/web/js/jquery.js"></script>
<script src="<?php echo full_url;?>/web/js/jqBootstrapValidation.js"></script>
<script src="<?php echo full_url;?>/web/js/datatables.js"></script>
<script src="<?php echo full_url;?>/web/js/dataTables.buttons.min.js"></script>
<script src="<?php echo full_url;?>/web/js/jszip.min.js"></script>
<script src="<?php echo full_url;?>/web/js/pdfmake.min.js"></script>
<script src="<?php echo full_url;?>/web/js/vfs_fonts.js"></script>
<script src="<?php echo full_url;?>/web/js/buttons.html5.min.js"></script>
<script src="<?php echo full_url;?>/web/js/fnReloadAjax.js"></script>

<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/moment/moment.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/transition.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/collapse.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo full_url;?>/web/bootstrap/js/moment/locale/es.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
        $('#fec_nac,#fec_prestamo,#fec_documento,#fec_devolucion').datetimepicker({
			 viewMode: 'days',
			 locale: 'es',
			 format: 'YYYY-MM-DD',
			 //useCurrent: true,
			 showTodayButton: true,
			 showClear: true,
                         inline: false,
			 showClose: true,
			tooltips: {
				today: 'Ir a hoy',
				clear: 'Limpiar selección',
				close: 'Cerrar el calendario',
				selectMonth: 'Seleccionar mes',
				prevMonth: 'Mes anterior',
				nextMonth: 'Próximo mes',
				selectYear: 'Seleccionar año',
				prevYear: 'Previous Year',
				nextYear: 'Próximo año',
				selectDecade: 'Select Decade',
				prevDecade: 'Previous Decade',
				nextDecade: 'Next Decade',
				prevCentury: 'Previous Century',
				nextCentury: 'Next Century'
			}
			 
        });		
	});
</script>