<h1 class="page-header">
    <?php echo $nota->getAlumno() != null ? $nota->getAlumno()->Nombre : 'Nueva Matricula'; ?>
</h1>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?c=Nota">Calificaciones</a></li>
  <li class="breadcrumb-item active"><?php echo $nota->getAlumno() != null ? $nota->getAlumno()->Nombre : 'Nueva Matricula'; ?></li>
</ol>

<form id="frm-nota" action="?c=Nota&a=guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $nota->getAlumno()->id; ?>">
    <?php foreach ($materias as $materia):?>
    <div class="form-group row">
        <label for="<?php echo $materia->id; ?>" class="col-sm-2 col-form-label"><?php echo $materia->Nombre;?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="<?php echo $materia->id; ?>" placeholder="0.0 - 5.0" value="<?php echo $materia->Nota; ?>" data-validacion-tipo="decimal|val-min:0|val-max:5.0">
        </div>
    </div>
    <?php endforeach; ?>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-nota").submit(function(){
            return $(this).validate();
        });
    })
</script>