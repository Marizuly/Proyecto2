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
            <h1 class="page-header">Control de entradas y salidas</h1>
            <!--aca listamos-->
            <table class="table">
                <thead>
                    <!--fila-->
                    <tr>
                        <!--columna-->
                        <th>Hora entrada</th>
                        <th>Hora salida</th>
                        <th>Fecha</th>
                        <
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $key => $value): ?>
                        <tr>
                            <td><?= $value->horaE ?></td>
                            <td><?= $value->horaS ?></td>
                            <td><?= $value->fecha ?></td>
                            
                            <td>
                        <a href="<?= URL ?>controE_S/editar/<?= $value->idcontrolE_S ?>">Editar</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->