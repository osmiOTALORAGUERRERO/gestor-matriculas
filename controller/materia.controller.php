<?php
require_once 'model/materia.php';

class MateriaController
{
    public function index()
    {
        $materia = new Materia();
        require_once 'view/header.php';
        require_once 'view/nav.php';
        require_once 'view/materia/materias.php';
        require_once 'view/footer.php';
    }

    public function crud()
    {
        $materia = new Materia();

        if (isset($_REQUEST['id'])) {
            $materia->obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/nav.php';
        require_once 'view/materia/materia-editar.php';
        require_once 'view/footer.php';
    }
    public function guardar()
    {
        $materia = new Materia();
        $materia->setNombre($_REQUEST['Nombre']);
        $materia->setCreditos($_REQUEST['Creditos']);
        $materia->setId($_REQUEST['id']);
        $materia->getId() > 0 ? $materia->actualizar() : $materia->registrar();
        
        header('location: index.php?c=Materia');
    }
    public function eliminar()
    {
        $materia = new Materia();
        $materia->eliminar($_REQUEST['id']);
        header('location: index.php?c=Materia');
    }
}

?>