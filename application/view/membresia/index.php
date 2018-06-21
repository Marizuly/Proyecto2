<div id="page-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="hover">
                <i class="fa fa-dashboard"></i> <a href="..." id="eti">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
            </li>
        </ol>
        
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Membresia
                </h1>
                <div class="table-responsive">  
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <!--Fila-->
                            <tr>
                                <!--Columna-->
                                <th>Nombre</th>
                                <th>Tipo de Membresía</th>
                                <th>Cantidad</th>
                                <th>Horario Inicio Mañana</th>
                                <th>Horario Fin Mañana</th>
                                <th>Horario Inicio Tarde</th>
                                <th>Horario Fin Tarde</th>
                                <th>Día</th>
                                <th>Valor</th>
                                <th>Año vencimiento</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Listar la varible-->
                            <?php foreach($registros as $key => $value): ?>
                                <tr>
                                    <td><?= $value->nombreMembresia?></td>
                                    <td><?= $value->nombreTipoMembresia?></td>
                                    <td><?= $value->cantidad?></td>
                                    <td><?= $value->rangoInicioM?></td>
                                    <td><?= $value->rangoFinM?></td>
                                    <td><?= $value->rangoInicioT?></td>
                                    <td><?= $value->rangoFinT?></td>
                                    <td><?= $value->dia?></td>
                                    <td><?= $value->valor?></td>
                                    <td><?= $value->year?></td>
                                    <td><?= $value->estadoMembresia?></td>
                                    <td>
                                        <a onclick="editar(<?= $value->idMembresia ?>)" class=" btn btn-success">Editar</a>
                                        <?php if($value->estadoMembresia == "Activo"): ?>
                                            <!--controlador/metodo/id parametro-->
                                            <a href="<?= URL ?>Membresia/estado/Inactivo/<?= $value->idMembresia ?>" class=" btn btn-default">Estado</a>
                                        <?php else: ?>
                                            <a href="<?= URL ?>Membresia/estado/Activo/<?= $value->idMembresia ?>" class=" btn btn-danger">Estado</a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<div id="ModalEditarMembresia" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"  style="width:60%">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Membresía</h4>
    </div>

    <div class="modal-body">
        <div class="well">
            <form class="form-inline" id="formularioEditarMembresia">
                <input type="hidden" name="id" id="id">
                <!-- <input type="hidden" name="idTarifa" id="idTarifa"> -->
                <div class="row contenedor">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" class="form-control"  name='nombre' id='nombre'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tipo de Membresía:</label>
                            <select name="tipoM"  id="tipoM" class="form-control">
                                <option value=""selected hidden></option>
                                <?php foreach ($tipoM as $k) { ?>
                                <option value="<?php echo $k->idtipoMembresia ?>"><?php echo $k->nombreTipoMembresia ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Cantidad: </label>
                            <input type="text" class="form-control" name='cantidad' id='cantidad'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de inicio Mañana </label>
                            <input type="time" class="form-control" name='iam' id='iam'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de Fin Mañana </label>
                            <input type="time" class="form-control" name='fam' id='fam'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de inicio Tarde </label>
                            <input type="time" class="form-control" name='ipm' id='ipm'>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Hora de Fin Tarde </label>
                            <input type="time" class="form-control" name='fpm' id='fpm'>
                        </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Día: </label>
                        <select class="multiple" name="states[]" id="dia" multiple="multiple">
                            <option value="Ninguno">Ninguno</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                </div>

                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Valor: </label>
                        <select name="tar" id="tar" class="form-control select2">
                            <option value="" selected hidden></option>
                            <?php foreach($tar as $key){?>
                            <option value="<?php echo $key->idtarifas ?>"><?php echo $key->valor ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group btnDiv">
                        <input type="checkbox" name="beneficiarioM" id="bene" /> Aplica Beneficiario
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-success" onclick="modificar()">Guardar</button>
</div>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        $(".multiple").select2({
        // placeholder: "Ninguno",
        // allowClear: true
    });
    })

    function editar(id){
        $.ajax({
            url: '<?=URL?>Membresia/editar/'+id,
            type: 'GET',
            dataType: 'JSON'
        }).done(function(data){
            // debugger;   
            $(".dtr-bs-modal").modal("hide");
            $("#id").val(data.idMembresia);
            $("#idTarifa").val(data.idtarifas);
            $("#nombre").val(data.nombreMembresia);
            $("#tipoM option[value="+data.idtipoMembresia+"]").attr("selected",true);
            $("#cantidad").val(data.cantidad);
            $("#iam").val(data.rangoInicioM);
            $("#fam").val(data.rangoFinM);
            $("#ipm").val(data.rangoInicioT);
            $("#beneficiario").val(data.beneficiarioM);
            if(data.beneficiarioM == 1){
                $("#bene").prop("checked", true);
            }else{
                $("#bene").prop("checked", false);
            }
            //si es vacio que tome el valor, pero si no coge el valor que trae y lo parte donde tenga coma-espacio
            var states = (data.dia == "") ? "" : data.dia.split(', ');
            if(states != ""){
                //para cargar el select2
                setTimeout(function(){
                    $("#dia").val(states).trigger("change");
                },200);
            }
            //$("#dia option[value="+states+"]").attr("selected",true);
            $("#tar option[value="+data.idtarifas+"]").attr("selected",true);
            $("#fpm").val(data.rangoFinT);
            $("#ModalEditarMembresia").modal("show");
        })
    }

    function modificar(){
        $.ajax({
            url: '<?=URL?>Membresia/modificar',
            data: $("#formularioEditarMembresia").serialize(),
            type: 'POST',
            dataType: 'JSON'
        }).done(function(data){
            if(data.success){
                $("#ModalEditarMembresia").modal("hide");
                swal({
                    position: 'top-end',
                    type: 'success',
                    title: '!Éxito!',
                    text: 'Modificación Exitosa',
                    showConfirmButton: false,
                    timer: 2000
                });
                setTimeout(function(){
                    location.reload();
                },2100);
            }else{
                swal({
                    position: 'top-end',
                    type: 'error',
                    title: '!Error!',
                    text: 'No se pudo hacer el registro',
                    showConfirmButton: false,
                    timer: 2000
                });
                setTimeout(function(){
                    location.reload();
                },2100);
            }
        }).fail(function(){
            swal({
                position: 'top-end',
                type: 'error',
                title: '!Error!',
                text: 'Algo salío mal',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(function(){
                location.reload();
            },2100);
        });
    }
</script>




