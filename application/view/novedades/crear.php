<div id="page-wrapper">
   <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <!--<h1 class="page-header">
                    <center> Energym Xtreme</center>
                </h1>-->
                <ol class="breadcrumb">
                    <li class="hover">
                        <i class="fa fa-dashboard"></i> <a href="..." id="eti">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
                    </li>
                </ol>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Novedades
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?> novedades/registrar'>
                <div class="form-group">
                    <label for="">Descripción:</label>
                    <input type="text" class="form-control" name='descripcion'>
                </div>
                <div class="form-group">
                    <label for="">Fecha novedad:</label>
                    <input type="text" class="form-control" name='fechaNovedad'>
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-success">GUARDAR</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->