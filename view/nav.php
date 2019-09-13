<div> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Bienvenido</a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo $_REQUEST['c']=='Alumno' ? 'active':'';?>">
          <a class="nav-link" href="?c=Alumno">Alumnos</a>
        </li>
        <li class="nav-item <?php echo $_REQUEST['c']=='Materia' ? 'active':'';?>">
          <a class="nav-link" href="?c=Materia">Materias</a>
        </li>
        <li class="nav-item <?php echo $_REQUEST['c']=='Matricula' ? 'active':'';?>">
          <a class="nav-link" href="?c=Matricula">Matriculas</a>
        </li>
        <li class="nav-item <?php echo $_REQUEST['c']=='Nota' ? 'active':'';?>">
          <a class="nav-link" href="?c=Nota">Notas</a>
        </li>
    </div>
  
  </nav>
</div>

