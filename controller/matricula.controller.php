<?php
require_once 'model/matricula.php';
require_once 'model/alumno.php';
require_once 'model/materia.php';

class MatriculaController
{
    private $alumno;
    private $materia;

    public function __construct()
    {
        $this->alumno = new Alumno();
        $this->materia = new Materia();
    }

    public function index()
    {
        $matricula = new Matricula();

        require_once 'view/nav.php';
        require_once 'view/header.php';
        require_once 'view/matricula/matriculas.php';
        require_once 'view/footer.php';
    }

    public function crud()
    {
        $matricula = new Matricula();
        $imprimir = true;
        if (isset($_REQUEST['id'])) {    
            $alumnoMatricula = $this->alumno->obtener($_REQUEST['id']);
            $matricula->obtener($_REQUEST['id'], $alumnoMatricula);
        }
        
        require_once 'view/nav.php';
        require_once 'view/header.php';
        require_once 'view/matricula/matricula-editar.php';
        require_once 'view/footer.php';
    }

    public function bajaMateria()
    {
        $matricula = new Matricula();

        $matricula->bajaMateria($_REQUEST['id'], $_REQUEST['idMateria']);
        
        $this->crud();
    }
    public function guardar()
    {   
        $matricula = new Matricula();
        $error = null;
        if (isset($_REQUEST['Alumno']) && isset($_REQUEST['Materias'])) {
            $alumnoId = $_REQUEST['Alumno'];
            $materiasId = $_REQUEST['Materias'];
            $matricula->registrar($alumnoId, $materiasId);
            header('location: index.php?c=Matricula');
        } else {
            header('location: index.php?c=Matricula');
        }
        
    }

    public function eliminar()
    {
        $matricula = new Matricula();
        $matricula->eliminar($_REQUEST['id']);
        header('location: index.php?c=Matricula');
    }
}

?>