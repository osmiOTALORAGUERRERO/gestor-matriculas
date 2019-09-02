<?php
class Alumno
{
	private $pdo;
    
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $fechaRegistro;
    private $fechaNacimiento;
    private $foto;
    private $correo;

	public function __CONSTRUCT()
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
			$stm = $this->pdo->prepare("SELECT * FROM alumnos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM alumnos WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM alumnos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function actualizar($data)
	{
		try 
		{
			$sql = "UPDATE alumnos SET 
						Nombre          = ?, 
						Apellido        = ?,
                        Correo        = ?,
						Sexo            = ?, 
						FechaNacimiento = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->getNombre(), 
                        $data->getApellido(),
                        $data->getCorreo(),
                        $data->getSexo(),
                        $data->getFechaNacimiento(),
                        $data->getid()
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO alumnos (Nombre,Correo,Apellido,Sexo,FechaNacimiento,FechaRegistro) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->getNombre(),
                    $data->getCorreo(), 
                    $data->getApellido(), 
                    $data->getSexo(),
                    $data->getFechaNacimiento(),
                    date('Y-m-d')
                )
			);
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
     * Get the value of Nombre
     */ 
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set the value of Nombre
     *
     * @return  self
     */ 
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * Get the value of Apellido
     */ 
    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * Set the value of Apellido
     *
     * @return  self
     */ 
    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;

        return $this;
    }

    /**
     * Get the value of Sexo
     */ 
    public function getSexo()
    {
        return $this->Sexo;
    }

    /**
     * Set the value of Sexo
     *
     * @return  self
     */ 
    public function setSexo($Sexo)
    {
        $this->Sexo = $Sexo;

        return $this;
    }

    /**
     * Get the value of FechaRegistro
     */ 
    public function getFechaRegistro()
    {
        return $this->FechaRegistro;
    }

    /**
     * Set the value of FechaRegistro
     *
     * @return  self
     */ 
    public function setFechaRegistro($FechaRegistro)
    {
        $this->FechaRegistro = $FechaRegistro;

        return $this;
    }

    /**
     * Get the value of FechaNacimiento
     */ 
    public function getFechaNacimiento()
    {
        return $this->FechaNacimiento;
    }

    /**
     * Set the value of FechaNacimiento
     *
     * @return  self
     */ 
    public function setFechaNacimiento($FechaNacimiento)
    {
        $this->FechaNacimiento = $FechaNacimiento;

        return $this;
    }

    /**
     * Get the value of Foto
     */ 
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * Set the value of Foto
     *
     * @return  self
     */ 
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;

        return $this;
    }

    /**
     * Get the value of Correo
     */ 
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * Set the value of Correo
     *
     * @return  self
     */ 
    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;

        return $this;
    }
}