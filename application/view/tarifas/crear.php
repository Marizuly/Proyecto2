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
                    Tarifas
                </h1>
            </div>
        </div>

        <div class="well">
            <form class="form-inline" method='post' action='<?= URL; ?> Tarifas/registrar' onsubmit="return validarNumeros()">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Valor &nbsp;<span class="ast">*&nbsp;</span></label>
                            <input type="text" maxlength="9" class="form-control num" name='valor' id="valor">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Año &nbsp;<span class="ast">*&nbsp;</span></label>
                            <input type="text" maxlength="4" class="form-control num" name='ano' id="ano">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" >GUARDAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
