<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div id="calendar" class="col-centered">
				</div>
			</div>

		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- Modal agregar evento -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="<?= URL ?>programacion/registrar" onsubmit="return validarprogramacion()">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Agregar programación</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="title" class="col-md-4 control-label">Clase</label>
						<div class="col-md-8">
							<select name="clase" id="clase" class="form-control">
								<option value="">Seleccione...</option>
								<?php
								foreach($registro as $key){
									echo "<option value='".$key->idClase."'>".$key->nombreClase."</option>";
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">Instructor</label>
						<div class="col-sm-8">
							<select name="instructor" id="instructor" class="form-control">
								<option value="">Seleccione...</option>                    
								<?php 
								foreach($reg as $key){
									echo"<option value='".$key->idusuario."'>".$key->primerNombre." ".$key->segundoNombre." ".$key->primerApellido." ".$key->segundoApellido."</option>";
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="color" class="col-sm-4 control-label">Color</label>
						<div class="col-sm-8">
							<select name="color" class="form-control" id="color">
								<option value="">Seleccione...</option>
								<option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#008000;" value="#008000">&#9724; Green</option>
								<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
								<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
								<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="horaInicio" class="col-sm-4 control-label">Hora de inicio</label>
						<div class="col-sm-8">
							<input type="time" name="horaInicio" class="form-control" id="horaInicio">
						</div>
					</div>

					<div class="form-group">
						<label for="horaFinal" class="col-sm-4 control-label">Hora final</label>
						<div class="col-sm-8">
							<input type="time" name="horaFinal" class="form-control" id="horaFinal" >
						</div>
					</div>

					<div class="form-group">
						<label for="fecha" class="col-sm-4 control-label">Fecha</label>
						<div class="col-sm-8">
							<input type="date" name="fecha" class="form-control" id="fecha" readonly >
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal editar evento -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" onsubmit="return validareditprogramcion()">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Editar programaciòn</h4>
				</div>

				<div class="modal-body">
					<div id="divCampos">
						<input type="hidden" name="idProgramacion" id="idProgramacion">
						<div class="form-group">
							<label for="claseEdit" class="col-md-4 control-label">Clase</label>
							<div class="col-md-8">
								<select name="claseEdit" id="claseEdit" class="form-control select2">
									<option value="">Seleccione...</option>
									<?php
									foreach($registro as $key){
										echo "<option value='".$key->idClase."'>".$key->nombreClase."</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="title" class="col-sm-4 control-label">Instructor</label>
							<div class="col-sm-8">
								<select name="instructorEdit" id="instructorEdit" class="form-control select2">
									<option value="">Seleccione...</option>                    
									<?php 
									foreach($reg as $key){
										echo"<option value='".$key->idusuario."'>".$key->primerNombre." ".$key->segundoNombre." ".$key->primerApellido." ".$key->segundoApellido."</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="color" class="col-sm-4 control-label">Color</label>
							<div class="col-sm-8">
								<select name="colorEdit" class="form-control" id="colorEdit">
									<option value="">Seleccione...</option>
									<option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
									<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
									<option style="color:#008000;" value="#008000">&#9724; Green</option>
									<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
									<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
									<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
									<option style="color:#000;" value="#000">&#9724; Black</option>

								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="horaInicioEdit" class="col-sm-4 control-label">Hora de inicio</label>
							<div class="col-sm-8">
								<input type="time" name="horaInicioEdit" class="form-control" id="horaInicioEdit">
							</div>
						</div>

						<div class="form-group">
							<label for="horaFinalEdit" class="col-sm-4 control-label">Hora final</label>
							<div class="col-sm-8">
								<input type="time" name="horaFinalEdit" class="form-control" id="horaFinalEdit" >
							</div>
						</div>

						<div class="form-group">
							<label for="fechaEdit" class="col-sm-4 control-label">Fecha</label>
							<div class="col-sm-8">
								<input type="date" name="fechaEdit" class="form-control" id="fechaEdit" readonly >
							</div>
						</div>
					</div>

					<div id="divInfo">
						<h4><strong>Clase:&nbsp;</strong><span id="spanClase"></span></h4>
						<h4><strong>Instructor:&nbsp;</strong><span id="spanInstructor"></span></h4>
						<h4><strong>Hora de Inicio:&nbsp;</strong><span id="spanHoraIni"></span></h4>
						<h4><strong>Hora Final:&nbsp;</strong><span id="spanHoraFin"></span></h4>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button style="float: left" id="btnEditarProg" type="button" class="btn btn-success" >Editar</button>
					<button type="submit" class="btn btn-danger" id="btnEliminarProg" formaction="<?=URL?>programacion/eliminar">Eliminar</button>
					<button type="submit" class="btn btn-success" id="btnGuardarProg" formaction="<?=URL?>programacion/modificar">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
// $(document).ready(function(){
//     $(".select2").select2({
//             placeholder: "Buscar..",
//             allowClear: true
//         })
//     var buttonCommon = {
//         exportOptions: {
//             format: {
//                 body: function ( data, row, column, node ) {
//                         // Strip $ from salary column to make it numeric
//                         return column === 5 ?
//                         data.replace( /[$,]/g, '' ) :
//                         data;
//                     }
//                 }
//             }
//         };

//         $('#tblPersona').DataTable({
//             responsive: {
//                 details: {
//                     display: $.fn.dataTable.Responsive.display.modal( {
//                         header: function ( row ) {
//                             var data = row.data();
//                             return 'Detalles para '+data[0]+' '+data[0];  
//                         }
//                     } ),
//                     renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
//                         tableClass: 'table'
//                     } )
//                 }
//             },
//             "language": {
//                 "sProcessing":     "Procesando...",
//                 "sLengthMenu":     "Mostrar _MENU_ Registros",
//                 "sZeroRecords":    "No se encontraron resultados",
//                 "sEmptyTable":     "Ningún dato disponible en esta tabla",
//                 "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                 "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
//                 "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
//                 "sInfoPostFix":    "",
//                 "sSearch":         "Buscar:",
//                 "sUrl":            "",
//                 "sInfoThousands":  ",",
//                 "sLoadingRecords": "Cargando...",
//                 "oPaginate": {
//                     "sFirst":    "Primero",                
//                     "sLast":     "Último",
//                     "sNext":     "Siguiente",
//                     "sPrevious": "Anterior"
//                 },
//                 "oAria": {
//                     "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
//                     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//                 }
//             },
//             dom: 'Bfrtip',
//             buttons: [
//             $.extend( true, {}, buttonCommon, {
//                 extend: 'copyHtml5'
//             } ),
//             $.extend( true, {}, buttonCommon, {
//                 extend: 'excelHtml5'
//             } ),
//             $.extend( true, {}, buttonCommon, {
//                 extend: 'pdfHtml5'
//             } )
//             ]
//         });
//     });
//
  function validarprogramacion(){
  	
	// horaincio = $("#horaInicio").val();
	var horaF = $("#horaFinal").val();
	var horaI = $("#horaInicio").val();
    var clase = $("#clase").val();
    var instructor = $("#instructor").val();
    // $("#horaInicio").val("");
    // $("#horaFinal").val("");
    var fecha = $("#fecha").val();
    var color = $("#color").val();

    // console.log(hora);

	if (clase=="" || instructor==""|| color=="" || horaI== ""||horaF=="") {
		
		// alert("holi")
		if (clase==""||clase==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo clase esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#clase").focus();
		}else if (instructor==""||instructor==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo instructor esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#instructor").focus();
		}else if (color==""||color==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo color esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#color").focus();
		}else if (horaI=="" ||horaI==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'La hora inicio esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#horaI").focus();
		}else if (horaF==""||horaF==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'La hora final esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#horaI").focus();
		}

  		return false;

	}
  	return true;
  }

  function validareditprogramcion(){
  	
	// horaincio = $("#horaInicio").val();
	var horaF = $("#horaFinalEdit").val();
	var horaI = $("#horaInicioEdit").val();
    var clase = $("#claseEdit").val();
    var instructor = $("#instructorEdit").val();
    // $("#horaInicio").val("");
    // $("#horaFinal").val("");
    var fecha = $("#fecha").val();
    var color = $("#colorEdit").val();

    // console.log(hora);

	if (clase=="" || instructor==""|| color=="" || horaI== ""||horaF=="") {
		
		// alert("holi")
		if (clase==""||clase==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo clase esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#clase").focus();
		}else if (instructor==""||instructor==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo instructor esta vacio ',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#instructor").focus();
		}else if (color==""||color==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo instructor esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#color").focus();
		}else if (horaI=="" ||horaI==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo hora inicio esta vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#horaI").focus();
		}else if (horaF==""||horaF==null) {
			swal({
	                position: 'top-end',
	                type: 'error',
	                title: '!Error!',
	                text: 'El campo hora final esat vacio',
	                showConfirmButton: false,
	                timer: 2000
	            });
			$("#horaI").focus();
		}

  		return false;

	}
  	return true;
  }
	

    $(document).ready(function(){
    	// $("#horaInicio").val("");
    	// $("#horaFinal").val("");

        $("#clase").val("");
        $("#instructor").val("");
        // $("#horaInicio").val("");
        // $("#horaFinal").val("");
        $("#fecha").val("");
        $("#color").val("");
        $("#calendar").fullCalendar({
            lang: "es",
            header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
            buttonText:{
                today:    'Hoy',
                month:    'Mes',
                week:     'Semana',
                day:      'Día'
            },
            dayClick: function(start) {
            	//Validación que fecha no sea inferior a la actual
            
            	<?php
            		$FechaActual = date('Y-m-d'); ?>
            		SystemHoy = <?php echo $FechaActual;
            	 ?>
            	
            	// FechaUsuario = date.format('YYYY-MM-DD');           	
            	$FechaActual =  $('#fecha').val(moment(start).format('YYYY-MM-DD'));


            	var hoy = new Date();
				var fechaFormulario = new Date($FechaActual.val());
				// Comparamos solo las fechas => no las horas!!
				hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas
				fechaFormulario.setHours(0,0,0,0);
				fechaFormulario.setDate(fechaFormulario.getDate() + 1);
				if (hoy <= fechaFormulario) {
					console.log($("#clase").val())
				  	$('#fecha').val(moment(start).format('YYYY-MM-DD'));
                	$('#ModalAdd').modal('show');
				}
				else {
				  swal({
			                position: 'top-end',
			                type: 'error',
			                title: '!Error!',
			                text: 'La fecha no puede ser inferior a la fecha actual',
			                showConfirmButton: false,
			                timer: 2000
			            });
				}

            	// if (FechaUsuario < $FechaActual.val()) {            		
            	// 	swal({
			          //       position: 'top-end',
			          //       type: 'error',
			          //       title: '!Error!',
			          //       text: 'La fecha no puede ser inferior a la fecha actual',
			          //       showConfirmButton: false,
			          //       timer: 2000
			          //   });
            	// }else{ 
            	// // 	console.log(moment(start).format('YYYY-MM-DD'));           		
            	// 	$('#fecha').val(moment(start).format('YYYY-MM-DD'));
             //    	$('#ModalAdd').modal('show');
            	// };           	            	
            	          	
            },
            events: [
			<?php foreach($registros as $event): 
                $start = $event->fecha."T".$event->horaInicio;
                $end = $event->fecha."T".$event->horaFin;
			?>
				{
					id: '<?php echo $event->idProgramacion; ?>',
					idClase: '<?php echo $event->idClase; ?>',
					fecha: '<?php echo $event->fecha; ?>',
					horaInicio: '<?php echo $event->horaInicio; ?>',
					horaFin: '<?php echo $event->horaFin; ?>',
					title: '<?php echo $event->nombreClase; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event->color; ?>',
					instructor: '<?php echo $event->idusuario; ?>',
					instructorStr: '<?php echo $event->primerNombre." ".$event->segundoNombre." ".$event->primerApellido." ".$event->segundoApellido; ?>',
				},
			<?php endforeach; ?>
            ],
            eventClick: function(event){
				console.log(event.id);
                $("#idProgramacion").val(event.id);
                $("#claseEdit").val(event.idClase);
                $("#instructorEdit").val(event.instructor);
                $("#horaInicioEdit").val(event.horaInicio);
                $("#horaFinalEdit").val(event.horaFin);
                $("#fechaEdit").val(event.fecha);
                $("#colorEdit").val(event.color);
                //Consultar 
                $("#spanClase").text(event.title);
                $("#spanInstructor").text(event.instructorStr);
                $("#spanHoraIni").text(event.horaInicio);
                $("#spanHoraFin").text(event.horaFin);
                // $("#spanFecha").text(event.fecha);
                $("#divCampos").hide();
                $("#divInfo").show();
                $("#btnGuardarProg").hide();
								$("#btnEliminarProg").show();
                $("#btnEditarProg").text("Editar");
                $("#btnEditarProg").removeClass("btn-warning").addClass("btn-success");
                $("#ModalEdit").modal("show");
            }
        });
    });

    $("#btnEditarProg").click(function(){
        if($("#btnEditarProg").text() == "Editar"){
            $("#divCampos").show();
            $("#divInfo").hide();
            $("#btnEliminarProg").hide();
            $("#btnGuardarProg").show();
            $("#btnEditarProg").removeClass("btn-success").addClass("btn-warning"); 
            $("#btnEditarProg").text("Cancelar");
        }else{
            $("#divCampos").hide();
            $("#divInfo").show();
            $("#btnGuardarProg").hide();
            $("#btnEliminarProg").show();
            $("#btnEditarProg").removeClass("btn-warning").addClass("btn-success"); 
            $("#btnEditarProg").text("Editar");
        }
    });

  
</script>
