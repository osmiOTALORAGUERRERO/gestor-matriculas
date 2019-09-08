<h1 class="page-header">
    <?php echo $matricula->getAlumno() != null ? $matricula->getAlumno()->Nombre : 'Nueva Matricula'; ?>
</h1>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?c=Matricula">Matriculas</a></li>
  <li class="breadcrumb-item active"><?php echo $matricula->getAlumno() != null ? $matricula->getAlumno()->Nombre : 'Nueva Matricula'; ?></li>
</ol>
<?php if($matricula->getAlumno() != null): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Materias Registradas</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($matricula->getMaterias() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro desea dar de baja esta materia?');" href="?c=Matricula&a=bajaMateria&id=<?php echo $matricula->getAlumno()->id; ?>&idMateria=<?php echo $r->id; ?>">Baja</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<?php endif; ?>
<form id="frm-alumno" action="?c=Matricula&a=guardar" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="hobbies">Alumno</label>
        <select class="form-control" name="Alumno" id="alumno">
        <?php if($matricula->getAlumno() != null): ?>
            <option value = <?php echo $matricula->getAlumno()->id  ?>><?php echo $matricula->getAlumno()->Nombre .' '. $matricula->getAlumno()->Apellido ?></option>
        <?php else: ?>
            <option disabled selected>seleciona un alumno</option>
            <?php foreach ($this->alumno->listar() as $alumno):?>
            <?php foreach ($matricula->listar() as $alumnoMatricula){
                if($alumnoMatricula->Alumno_id == $alumno->id){
                    $imprimir = false;
                }   
            }?>
            <?php if($imprimir): ?>
            <option value = <?php echo $alumno->id  ?>><?php echo $alumno->Nombre .' '. $alumno->Apellido ?></option>
            <?php endif; ?>
            <?php $imprimir=true;?>
        <?php endforeach; ?>
        <?php endif; ?>
        </select>   
    </div>
    <div class="form-group">
        <label for="studies">Materias alta</label>
        <select multiple class="form-control" name="Materias[]" id="materias">
        <?php foreach ($this->materia->listar() as $materia):?>
            <?php foreach ($matricula->getMaterias() as $materiaMatricula){
                if($materiaMatricula->id == $materia->id){
                    $imprimir = false;
                }   
            }?>
            <?php if($imprimir): ?>
            <option value = <?php echo $materia->id  ?>><?php echo $materia->Nombre ?></option>
            <?php endif; ?>
            <?php $imprimir=true;?>
        <?php endforeach; ?>
        </select>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>