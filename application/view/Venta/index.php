<div id="page-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="hover">
                <i class="fa fa-dashboard"></i> <a href="..." id="eti">Ayuda    </a>
            </li>
            <li class="active">
                <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
            </li>
        </ol>
        
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Venta
                </h1>

                <form>
                <h5>Filtrar por:
                <a href = "<?=URL?>Venta/index?estado=Cancelada" class="btn btn-success">Canceladas</a>
                <a href = "<?=URL?>Venta/index?estado=Activa" class="btn btn-success">Activas</a>
                <br><br>
                </form>

                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <!--Fila-->
                        <tr>
                            <!--Columna-->
                            <th>N° Documento</th>
                            <th>Cliente</th>
                            <th>Membresía</th>
                            <th>Cantidad</th>
                            <th>Horario Mañana</th>
                            <th>Horario Tarde</th>
                            <th>Días que aplica</th>
                            <th>Valor</th>
                            <th>Año de vencimiento</th>
                            <th>Fecha de vencimiento</th>
                            <th>Total pagado</th>
                            <th>Estado</th>
                            <th>Opción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!--Listar la varible-->
                        <?php foreach($registros as $key => $value): ?>
                            <tr>
                            <td><?= $value->documento ?></td>
                                <td><?= $value->primerNombre." ".$value->segundoNombre." ".$value->primerApellido." ".$value->segundoApellido?></td>
                                <td><?= $value->nombreTipoMembresia." ".$value->nombreMembresia ?></td>
                                <td><?= $value->cantidad?></td>
                                <td><?= $value->rangoInicioM." am ".$value->rangoFinM ?></td>
                                <td><?= $value->rangoInicioT." pm ".$value->rangoFinT ?></td>
                                <td><?= $value->dia ?></td>
                                <td><?= $value->valor?></td>
                                <td><?= $value->year?></td>
                                <td><?= $value->fechaFin?></td>
                                <td><?= $value->total?></td>
                                <td><?= $value->estadoVenta?></td>
                                <td>
                                    <?php if($value->estadoVenta == "Activa"): ?>
                                        <!--controlador/metodo/id parametro-->
                                        <a href="<?= URL ?>Venta/estado/Cancelada/<?= $value->idcomprobanteServicio ?>" class="btn btn-default">Anular venta</a>
                                    <?php else: ?>
                                        <button class="btn btn-danger">Cancelada</button>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
