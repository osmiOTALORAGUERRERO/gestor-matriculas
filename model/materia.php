<?php
class Materia
{
    private $id;
    private $nombre;
    private $creditos;
    private $pdo;

    public function __construct()
	{
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
			$stm = $this->pdo->prepare("SELECT * FROM cursos");
            $stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    public function obtener($id)
    {
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM cursos WHERE id = ?");
			$stm->execute(array($id));
            $result = $stm->fetch(PDO::FETCH_OBJ);
            $this->id = $result->id;
            $this->nombre = $result->Nombre;
            $this->creditos = $result->Creditos;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    public function actualizar()
    {
        try 
		{
			$sql = "UPDATE cursos SET Nombre = ?, Creditos = ? WHERE id = ?";

			$this->pdo->prepare($sql)
			    ->execute(
				    array(
                        $this->nombre, 
                        $this->creditos,
                        $this->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}   
    }

    public function registrar()
    {
        try 
		{
		$sql = "INSERT INTO cursos (Nombre, Creditos) VALUES (?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $this->nombre,
                    $this->creditos
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    public function eliminar($id)
    {
        try 
		{
			$stm = $this->pdo->prepare("DELETE FROM cursos WHERE id = ?");
			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }
}

?>