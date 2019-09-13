<h1 class="page-header">
    <?php echo $nota->getAlumno() != null ? $nota->getAlumno()->Nombre : 'Nueva Matricula'; ?>
</h1>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?c=Nota">Calificaciones</a></li>
  <li class="breadcrumb-item active"><?php echo $nota->getAlumno() != null ? $nota->getAlumno()->Nombre : 'Nueva Matricula'; ?></li>
</ol>

<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:180px;">Materias</th>
                <th style="width:60px;">Creditos</th>
                <th style="width:60px;">Calificación</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($materias as $r): ?>
            <tr>
                <td><?php echo $r->Nombre?></td>
                <td><?php echo $r->Creditos ?></td>
                <td><?php echo $r->Nota ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 
</div>
    
<div class="text-right">
    <a href="index.php?c=Nota" class="btn btn-success">Regresar</a>
</div>
