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
            <h1 class="page-header">Novedades</h1>
            <!--aca listamos-->
            <table class="table">
                <thead>
                    <!--fila-->
                    <tr>
                        <!--columna-->
                        <th>Descripción</th>
                        <th>Fecha novedad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $key => $value): ?>
                        <tr>
                            <td><?= $value->descripcion ?></td>
                            <td><?= $value->fechaNovedad ?></td>
                            <td>
                        <a href="<?= URL ?>novedades/editar/<?= $value->idNovedades ?>">Editar</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->