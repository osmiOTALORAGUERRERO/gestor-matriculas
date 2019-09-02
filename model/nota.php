<?php
class Nota
{
    private $alumno;
    private $materia;
    private $valor;

    public function __construct(Alumno $alumno, Materia $materia, $valor = null)
    {
        $this->alumno = $alumno;
        $this->materia = $materia;
        $this->valor = $valor;
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
}


?>