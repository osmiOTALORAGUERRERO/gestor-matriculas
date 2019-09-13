<h1 class="page-header">Calificaciones</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" disabled>Calificacion de estudiantes matriculados</a>
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
    <?php foreach($nota->listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre . ' '. $r->Apellido; ?></td>
            <td><?php echo $r->Materias ?></td>
            <td>
                <a href="?c=Nota&a=crud&id=<?php echo $r->Alumno_id; ?>">Calificar</a>
            </td>
            <td>
                <a href="?c=Nota&a=revisar&id=<?php echo $r->Alumno_id; ?>">Visualizar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
