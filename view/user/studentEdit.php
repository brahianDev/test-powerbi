<?php foreach (parent::getStudent($_REQUEST['u']) as $user) {} ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Content Row -->
      <div class="row justify-content-center">
        <div class="col-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edición de estudiante</h1>
            </div>
            <form method="POST" action="<?php echo APP_URL ?>usuario/actualizarEstudiante">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['u'] ?>">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="documento" id="documento" placeholder="Documento" value="<?php echo $user->documento ?>" required>
                    </div>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" id="date" placeholder="Fecha Nacimiento" value="<?php echo $user->fechaNacimiento ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $user->nombreAlumno ?>" required>
                </div>
              <button type="submit" class="btn btn-success btn-user btn-block">Actualizar</button>
              <hr>
            </form>
            <form action="<?php echo APP_URL ?>usuario/eliminarEstudiante" method="POST">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['u'] ?>">
                <button type="submit" class="btn btn-danger btn-user btn-block">Eliminar</button>
            </form>
          </div>
        </div>
      </div>                        
    <!-- /.container-fluid -->
    </div>
  </div>
</div>