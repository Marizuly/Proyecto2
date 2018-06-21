<?php
namespace Mini\Controller;

use Mini\Model\controlE_S;
use Mini\Model\Persona;
class controlE_SController {
    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    // public function index(){
    //     $control= new controlE_S();
    //     $registros = $control->listar();
        
    //     include APP.'view/_templates/headerAdmin.php';
    //     include APP.'view/controlE_S/index.php';
    //     include APP.'view/_templates/footerAdmin.php';
    // }


    public function crear(){
        $TD= new Persona();
        $TipoD = $TD->listarDocumento();
        
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/controlE_S/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

//metodo que instancia el modelo, manda los datos por set
    public function registrar(){
        $control= new controlE_S();
        $control2 = $control->listarDocumento();
        $control->__SET('documento',$_POST['documento']);       
        $document = $control2->idVenta;
          

        $respuesta2 = $persona->insertarInscripcion();

        $respuesta = $acudient->registrarcontroE_S();
    }

    public function editar($idcontrolE_S)
    {
        $control= new controlE_S;
        $control->__SET('idcontrolE_S',$idcontrolE_S);
        $respuesta = $control->editar();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/controlE_S/editar.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    //metodo que instancia el modelo, manda los datos por set
    public function modificar()
    {   
         $control= new controlE_S();
        $control->__SET('idcontrolE_S',$_POST['idcontrolE_S']);
        $control->__SET('horaE',$_POST['horaE']);
        $control->__SET('horaS',$_POST['horaS']);
        $control->__SET('fecha',$_POST['fecha']);
        //llama al metodo guardar
        $respuesta = $control->modificar();       
    } 
}
?>