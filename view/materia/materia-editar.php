<h1 class="page-header">
    <?php echo $materia->getId() != null ? $materia->getNombre() : 'Nueva Materia'; ?>
</h1>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?c=Materia">Materias</a></li>
  <li class="breadcrumb-item active"><?php echo $materia->getId() != null ? $materia->getNombre() : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-materia" action="?c=Materia&a=guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $materia->getId(); ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $materia->getNombre(); ?>" class="form-control" placeholder="Ingrese el nombre de la materia" data-validacion-tipo="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Creditos</label>
        <input type="text" name="Creditos" value="<?php echo $materia->getCreditos(); ?>" class="form-control" placeholder="Ingrese el nombre de la materia" data-validacion-tipo="requerido|numero|longitud:1" />
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-materia").submit(function(){
            return $(this).validate();
        });
    })
</script>