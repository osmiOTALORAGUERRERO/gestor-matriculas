<h1 class="page-header">Matriculas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Matricula&a=crud">Nueva matricula</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Matricula</th>
            <th style="width:180px;">Materias</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($matricula->listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre . ' '. $r->Apellido; ?></td>
            <td><?php echo $r->Materias ?></td>
            <td>
                <a href="?c=Matricula&a=crud&id=<?php echo $r->Alumno_id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Matricula&a=eliminar&id=<?php echo $r->Alumno_id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
