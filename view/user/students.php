
  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Content Row -->
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Estudiantes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tableUsers" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Documento</th>
                      <th>Nombre</th>
                      <th>Programa</th>
                      <th>Grado</th>
                      <th>Cursos inscritos</th>
                      <th>Estado</th>
                      <th>Vinculación</th>
                      <th>Valor cargo</th>
                      <th>Valor pago</th>
                      <th>Valor beca</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach (parent::getAllStudents() as $student) { ?>
                        <tr>
                            <td><a href="<?php echo APP_URL ?>estudiantes/edit/<?php echo $student->identificacion ?>"><?php echo $student->identificacion ?></a></td>
                            <td><?php echo $student->nombreAlumno ?></td>
                            <td><?php echo $student->programa ?></td>
                            <td><?php echo $student->gradoAcademico ?></td>
                            <td><?php echo $student->cursosInscritos ?></td>
                            <td><?php echo $student->estado == 1 ? 'Activo' : 'Inactivo' ?></td>
                            <td><?php echo $student->tipoVinculacion ?></td>
                            <td><?php echo $student->valorCargo ?></td>
                            <td><?php echo $student->valorPago * -1 ?></td>
                            <td><?php echo $student->valorBeca * -1 ?></td>
                        </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


                        
    <!-- /.container-fluid -->
    </div>
  </div>
</div>