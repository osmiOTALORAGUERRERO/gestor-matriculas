<?php
require_once 'model/alumno.php';

class AlumnoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    }
    
    public function index(){
        require_once 'view/nav.php';
        require_once 'view/header.php';
        require_once 'view/alumno/alumno.php';
        require_once 'view/footer.php';
    }
    
    public function crud(){
        $alm = new Alumno();
        
        if(isset($_REQUEST['id'])){
            $result = $this->model->obtener($_REQUEST['id']);
            $alm->setId($result->id);
            $alm->setNombre($result->Nombre);
            $alm->setApellido($result->Apellido);
            $alm->setSexo($result->Sexo);
            $alm->setFechaNacimiento($result->FechaNacimiento);
            $alm->setFechaRegistro($result->FechaRegistro);
            $alm->setFoto($result->Foto);
            $alm->setCorreo($result->Correo);
        }
        
        require_once 'view/nav.php';
        require_once 'view/header.php';
        require_once 'view/alumno/alumno-editar.php';
        require_once 'view/footer.php';
    }
    
    public function guardar(){
        $alm = new Alumno();
        
        $alm->setId($_REQUEST['id']);
        $alm->setNombre($_REQUEST['Nombre']);
        $alm->setApellido($_REQUEST['Apellido']);
        $alm->setCorreo($_REQUEST['Correo']);
        $alm->setSexo($_REQUEST['Sexo']);
        $alm->setFechaNacimiento($_REQUEST['FechaNacimiento']);

        $alm->getId() > 0 ? $this->model->actualizar($alm) : $this->model->registrar($alm);
        
        header('Location: index.php?c=Alumno');
    }
    
    public function eliminar(){
        $this->model->eliminar($_REQUEST['id']);
        header('Location: index.php?c=Alumno');
    }
}