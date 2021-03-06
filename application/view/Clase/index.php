<div id="page-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="hover">
        <i class="fa fa-dashboard"></i> <a href="..." id="eti">Ayuda</a>
      </li>
      <li class="active">
        <i class="fa fa-desktop"></i> <a href="..." id="eti">Bootstrap Elements</a>
      </li>
    </ol>

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
            Clase
        </h1>
        <a href="<?= URL ?>Clase/crear" class="btn btn-success"><i class= "fa fa-plus"></i> Agregar</a>
        <br><br>

        <div class="table-responsive">  
          <table class="table table-striped" id="dataTable">
            <thead>
              <!--Fila-->
              <tr>
                <!--Columna-->
                <th>Nombre</th>
                <th>Descripciòn</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>

            <tbody>
              <!--Listar la varible-->
              <?php foreach($Clase1 as  $value): ?>
                <tr>
                  <td><?= $value->nombreClase?></td>
                  <td><?= $value->descripcion?></td>
                  <td><?= $value->estadoClase?></td>
                  <td>
                    <a onclick="editar('<?= $value->idClase ?>')" class="btn btn-success">Editar</a>
                    <?php if($value->estadoClase == "Activo"): ?>
                      <!--controlador/metodo/id parametro-->
                      <a href="<?= URL ?>Clase/estado/Inactivo/<?= $value->idClase ?>" class="btn btn-default">Estado</a>
                    <?php else: ?>
                      <a href="<?= URL ?>Clase/estado/Activo/<?= $value->idClase ?>" class="btn btn-danger">Estado</a>
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

<!-- Modal -->
<div id="ModalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar clase</h4>
      </div>

      <div class="modal-body">
        <div class="well">
         <form class="form-inline" id="formEditar">
           <input type="hidden" name="id" id="id" value="<?= $respuesta->idClase ?>">
           <div class="form-group">
             <label for="">Nombre :</label>
             <input type="text" class="form-control" name='nombre' id="nombre" value="<?= $respuesta->nombreClase?>">
           </div>
           <div class="form-group">
             <label for="">Descripciòn :</label>
             <input type="text" class="form-control" name='descripcion' id="descripcion" value="<?= $respuesta->descripcion?>">
           </div>
         </form>
       </div>
     </div>

     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-success" onclick="modificar()">Modificar</button>
    </div>

  </div>
</div>
</div>

<script>
  function editar(id){
    $.ajax({
      url: '<?=URL?>Clase/editar/'+id,
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data)
    {

      $("#id").val(data.idClase);
      $("#nombre").val(data.nombreClase);
      $("#descripcion").val(data.descripcion);
      $(".dtr-bs-modal").modal("hide");
      $("#ModalEditar").modal("show");
    });
  }

  function modificar(){
    $.ajax({
      url: '<?=URL?>Clase/modificar',
      data: $("#formEditar").serialize(),
      type: 'POST',
      dataType: 'JSON'
    }).done(function(data){
      
      if(data.success){
        $("#ModalEditar").modal("hide");
          
          swal({
                position: 'top-end',
                type: 'success',
                title: '!Éxito!',
                text: 'Se modifico correctamente',
                showConfirmButton: false,
                timer: 4000
            })
          setTimeout(function(){
                   location.reload();            
          
        },300);
      }else{
        alert("No se pudo modificar");
      }
    }).fail(function(){
      alert("Error");
    });

  }
</script>