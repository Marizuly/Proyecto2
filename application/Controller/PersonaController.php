<?php
namespace Mini\Controller;

use Mini\Model\Persona;
use Mini\Model\TipoDocumento;
use Mini\Model\Genero;
use Mini\Model\Eps;
use Mini\Model\Acudiente;

class PersonaController{

//    public function __CONSTRUCT(){
//      session_start();
//      $_SESSION["instructor"] = 1;
//      if (isset($_SESSION["instructor"])) {
//       header("location: ".URL."/admin");
//   }
// }

public function index()
{
    $persona= new Persona();
        // $registros = $persona->listar();
    $perfil = $persona->ListarPerfil();
    $TD= new TipoDocumento();
    $respuestaTD = $TD->listarActivo();
    $Genero= new Genero();
    $respuestaGe = $Genero->listarActivo();
    $eps= new Eps();
    $respuestaE = $eps->listarActivo();

    if (isset($_GET["tipo"])) {
        $registros = $persona->listarPorPerfil($_GET["tipo"]);
    }else{
        $registros = $persona->listar();
    }

    include APP.'view/_templates/headerAdmin.php';
    include APP.'view/Persona/index.php';
    include APP.'view/_templates/footerAdmin.php';
}

public function crear(){
        //crea un objeto que contiene las funciones del modelo
    $TD = new TipoDocumento();
        //llamar la funcion listar del modelo TD
    $TipoD = $TD->listarActivo();
    $persona= new Persona();
    $perfil = $persona->ListarPerfil();
    $Genero= new Genero();
    $registro= $Genero->listarActivo();
    $eps= new Eps();
    $registroE= $eps->listarActivo();

    include APP.'view/_templates/headerAdmin.php';
    include APP.'view/persona/crear.php';
    include APP.'view/_templates/footerAdmin.php';
}

public function registrar(){
    $acu= new Acudiente();
    $persona= new Persona();
    $idAcudiente= NULL; 

    if($_POST["gender"] == "menor"){

        $acu->__SET('primerN',$_POST['primerNA']);
        $acu->__SET('segundoN',$_POST['segundoNA']);
        $acu->__SET('primerA',$_POST['primerAA']);
        $acu->__SET('segundoA',$_POST['segundoAA']);
        $acu->__SET('telefono',$_POST['telefonoA']);
        $acu->__SET('direccion',$_POST['direccionA']);
        $respuesta = $acu->registrar(); 
        $idAcudiente= $acu->MaxIdAcudiente(); 
    }

    $persona->__SET('documento',$_POST['documento']);
    $persona->__SET('primerN',trim($_POST['primerN']));
    $persona->__SET('segundoN',$_POST['segundoN']);
    $persona->__SET('primerA',$_POST['primerA']);
    $persona->__SET('segundoA',$_POST['segundoA']);
    $persona->__SET('fecha',$_POST['fecha']);
    $persona->__SET('telefono',$_POST['telefono']);
    $persona->__SET('celular',$_POST['celular']);
    $persona->__SET('estadoC',$_POST['estadoC']);
    $persona->__SET('correo',$_POST['correo']);
    $persona->__SET('direccion',$_POST['direccion']);
    $persona->__SET('perfil',$_POST['perfil']);
    $persona->__SET('tipoDoc',$_POST['tipoDoc']);
    $persona->__SET('genero',$_POST['genero']);
    $persona->__SET('acudiente',$idAcudiente->id);
    $persona->__SET('eps',$_POST['eps']); 
    
    $valDoc = $persona->ValidarDocumento();
    
        if($valDoc){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: '¡Error!',
                text: 'El documento ya se encuentra registrado',
                showConfirmButton: false,
                timer: 2000
            })";
        }else{
        $respuesta = $persona->registrar();
        if($respuesta){
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'success',
                title: 'Éxito!',
                text: 'El registro se  realizó correctamente',
                showConfirmButton: false,
                timer: 2000
            })";
        }else{
            $_SESSION["mensaje"] = "swal({
                position: 'top-end',
                type: 'error',
                title: 'No se pudo hacer el Registro',
                showConfirmButton: false,
                timer: 2000
            })";
        }
    }
    header("location: ".URL."/Persona/crear");
}

public function editar($id)
{
    $persona= new Persona;
    $persona->__SET('id',$id);
    $respuesta = $persona->editar();
    echo json_encode($respuesta);
}

public function modificar()
{   
    $persona= new Persona();
    $persona->__SET('documento',$_POST['documento']);
    $persona->__SET('primerN',$_POST['primerN']);
    $persona->__SET('segundoN',$_POST['segundoN']);
    $persona->__SET('primerA',$_POST['primerA']);
    $persona->__SET('segundoA',$_POST['segundoA']);
    $persona->__SET('fecha',$_POST['fecha']);
    $persona->__SET('telefono',$_POST['telefono']);
    $persona->__SET('celular',$_POST['celular']);
    $persona->__SET('estadoC',$_POST['estadoC']);
    $persona->__SET('correo',$_POST['correo']);
    $persona->__SET('direccion',$_POST['direccion']);
    $persona->__SET('perfil',$_POST['perfil']);
    $persona->__SET('tipoDoc',$_POST['tipoDoc']);
    $persona->__SET('genero',$_POST['genero']);
    $persona->__SET('eps',$_POST['eps']);
    $persona->__SET('id',$_POST['id']);
    $respuesta = $persona->modificar();
    
    if($respuesta){
        echo json_encode(array("success" => true));
    }else{
        echo json_encode(array("success" => false));
    }
}

public function estado($estado, $id)
{   
    $persona= new Persona();
    $persona->__SET('estado', $estado);
    $persona->__SET('id', $id);
    $respuesta = $persona->cambiarEstado();  

    if($respuesta){
        $_SESSION["mensaje"]= "swal({
            position: 'top-end',
            type: 'success',
            title: '!Éxito!',
            text: 'El Estado se ha Modificado Exitosamente',
            showConfirmButton: false,
            timer: 3100
        })";
    }else{
        $_SESSION["mensaje"]= "swal({
            position: 'top-end',
            type: 'error',
            title: '!Error!',
            text: 'No se pudo cambiar el estado', 
            showConfirmButton: false,
            timer: 3100
        })";
    }
    
    header("location: ".URL."/Persona");
}

public function validar($tipo, $documento){
    $persona= new Persona();
    $persona->__SET('tipoDoc', $tipo);
    $persona->__SET('documento', $documento);
    $respuesta = $persona->validarDocumento();

    if($respuesta){
        echo json_encode(array("success"=>true));
    }else{
        echo json_encode(array("success"=>false));
    }
}
}
?>