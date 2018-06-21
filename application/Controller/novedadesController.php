<?php
namespace Mini\Controller;

use Mini\Model\novedades;

class novedadesController{

    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    public function index(){
        $novedad= new novedades();
        $registros = $novedad->listar();
        
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/novedades/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    public function crear(){

        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/novedades/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }

//metodo que instancia el modelo, manda los datos por set
    public function registrar(){

        $novedad= new novedades();
        $novedad->__SET('descripcion',$_POST['descripcion']);
        $novedad->__SET('fechaNovedad',$_POST['fechaNovedad']);
        //llama al metodo guardar
        $respuesta = $novedad->registrarnovedades();
    }

    public function editar($idNovedades)
    {
        $novedad= new novedades;
        $novedad->__SET('idNovedades',$idNovedades);
        $respuesta = $novedad->editar();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/novedades/editar.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    //metodo que instancia el modelo, manda los datos por set
    public function modificar()
    {   
        $novedad= new novedades();
        $novedad->__SET('descripcion',$_POST['descripcion']);
        $novedad->__SET('fechaNovedad',$_POST['fechaNovedad']);
        $novedad->__SET('idNovedades',$_POST['idNovedades']);
        //llama al metodo guardar
        $respuesta = $novedad->modificar();       
    } 
}
?>