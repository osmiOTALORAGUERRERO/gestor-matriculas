<?php
require_once 'model/alumno.php';
require_once 'model/materia.php';

class Matricula
{
    private $alumno;
    private $materias;
    private $pdo;

    public function __construct(Alumno $alumno = null, Array $materias = Array())
    {
        $this->alumno = $alumno;
        $this->materias = $materias;
        try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function listar()
    {
        try
		{
			$stm = $this->pdo->prepare("SELECT Alumno_id, Nombre, Apellido, COUNT(Alumno_id) AS Materias FROM alumno_curso
            JOIN alumnos ON alumno_curso.Alumno_id=alumnos.id
            GROUP BY Alumno_id
            HAVING COUNT(*) > 0");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
    public function obtener($id = null, $alumno)
    {
        try 
		{
			$stm = $this->pdo->prepare("SELECT id, Nombre from alumno_curso
                JOIN cursos ON alumno_curso.Curso_id=cursos.id
                WHERE Alumno_id = ?");
			$stm->execute(array($id));
            $this->materias = $stm->fetchAll(PDO::FETCH_OBJ);
            $stm = $this->pdo->prepare("SELECT id, Nombre from alumno_curso
                JOIN cursos ON alumno_curso.Curso_id=cursos.id
                WHERE Alumno_id = ?");
			$stm->execute(array($id));
            $this->alumno = $alumno;
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    public function registrar($alumnoId, $materiasId)
    {
        try 
		{
		$sql = "INSERT INTO alumno_curso (Curso_id, Alumno_id) VALUES (?, ?)";

        foreach ($materiasId as $materiaId) {
            $this->pdo->prepare($sql)
		     ->execute(
				array(
                    $materiaId,
                    $alumnoId
                )
			);
        }
		
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    public function bajaMateria($alumnoId, $cursoId)
    {
        try 
		{
			$stm = $this->pdo->prepare("DELETE FROM alumno_curso WHERE Alumno_id = ? AND Curso_id = ?");
			$stm->execute(array($alumnoId, $cursoId));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    public function eliminar($id)
    {
        try 
		{
			$stm = $this->pdo->prepare("DELETE FROM alumno_curso WHERE Alumno_id = ?");
			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    public function getAlumno()
    {
        return $this->alumno;
    }

    public function setAlumno($alumno)
    {
        $this->alumno = $alumno;
    }

    public function getMaterias()
    {
        return $this->materias;
    }

    public function setMaterias($materias)
    {
        $this->materias = $materias;
    }

}


?>