<?php
require_once 'model/nota.php';
require_once 'model/alumno.php';

class NotaController
{
    private $alumno;
    public function __construct()
    {
        $this->alumno = new Alumno();
    }

    public function index()
    {
        $nota = new Nota();
        require_once 'view/nav.php';
        require_once 'view/header.php';
        require_once 'view/notas/notas.php';
        require_once 'view/footer.php';
    }

    public function crud()
    {
        $nota = new Nota();
        $materias = $nota->obtener($_REQUEST['id']);
        $nota->setAlumno($this->alumno->obtener($_REQUEST['id']));
        require_once 'view/nav.php';
        require_once 'view/header.php';
        require_once 'view/notas/nota-editar.php';
        require_once 'view/footer.php';
    }

    public function guardar()
    {
        $nota = new Nota();
        $materias = $nota->obtener($_REQUEST['id']);
        foreach ($materias as $materia) {
            $nota->calificar($_REQUEST['id'], $materia->id, $_REQUEST[$materia->id]);
        }
        header('location: index.php?c=Nota');
    }
}

?>