<h1 class="page-header">Materias</h1>

<div class="well well-sm text-right py-1 px-1">
    <a class="btn btn-primary" href="?c=Materia&a=crud">Nueva materia</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th style="width:100px;">Creditos</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($materia->listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Creditos; ?></td>
            <td>
                <a href="?c=Materia&a=crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Materia&a=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
