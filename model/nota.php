<?php
class Nota
{
    private $alumno;
    private $materia;
    private $valor;
    private $pdo;

    public function __construct($alumno = null, Materia $materia = null, $valor = null)
    {
        $this->alumno = $alumno;
        $this->materia = $materia;
        $this->valor = $valor;
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

    public function obtener($idAlumno)
    {
        try 
		{
			$stm = $this->pdo->prepare("SELECT id, Nombre, Nota, Creditos from alumno_curso
                JOIN cursos ON alumno_curso.Curso_id=cursos.id
                WHERE Alumno_id = ?");
			$stm->execute(array($idAlumno));
            return $stm->fetchAll(PDO::FETCH_OBJ);
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    public function calificar($alumnoId, $materiaId, $valor)
    {
        try 
		{
        $sql = 'UPDATE alumno_curso SET Nota=:nota WHERE Curso_id=:materia AND Alumno_id=:alumno';

        $this->pdo->prepare($sql)
            ->execute(
            array(
                ':nota' => (float)$valor,
                ':materia' => $materiaId,
                ':alumno' => $alumnoId
            )
        );
		
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
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