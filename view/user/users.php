
  <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Content Row -->
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Crea un nuevo usuario</h1>
            </div>
            <form method="POST" action="<?php echo APP_URL ?>usuario/crear">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                </div>
                <div class="col-sm-6">
                  <select class="form-control" name="estado" id="estado" placeholder="Estado" required>
                        <option value="" selected>Estado... </option>
                        <?php
                            foreach (parent::getStates() as $states) {
                        ?>
                            <option value="<?php echo($states->idEstado) ?>"> <?php echo( ucfirst($states->nombreEstado)) ?></option>
                        <?php
                            }
                        ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <select class="form-control" name="type_identification" id="type_identification" placeholder="Estado" required>
                          <option value="" selected>Tipo documento... </option>
                          <?php
                              foreach (parent::getTypeDocument() as $typeDocument) {
                          ?>
                              <option value="<?php echo($typeDocument->id) ?>"> <?php echo( ucfirst($typeDocument->tipo)) ?></option>
                          <?php
                              }
                          ?>
                  </select>
                </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="document" id="document" placeholder="Documento" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="date" class="form-control" name="date" id="date" placeholder="Fecha de nacimiento" required>
                </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="phone" id="phone" placeholder="Celular" required>
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" required>
              </div>
              <button type="submit" class="btn btn-success btn-user btn-block">Crear</button>
              <hr>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tableUsers" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Estado</th>
                      <th>Tipo identificación</th>
                      <th>Documento</th>
                      <th>Fecha nacimiento</th>
                      <th>Celular</th>
                      <th>Correo electronico</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach (parent::getUsers() as $users)
                    {
                    ?>
                      <tr>
                        <td><a href="<?php echo APP_URL.'usuario/editar/'.$users->id ?>"><?php echo ucfirst($users->nombre) ?></a></td>
                        <td><?php echo ucfirst($users->apellido) ?></td>
                        <td><?php echo parent::getState($users->estado) ?></td>
                        <td><?php echo parent::getDocument($users->tipo_identificacion) ?></td>
                        <td><?php echo ucfirst($users->nit) ?></td>
                        <td><?php echo ucfirst($users->fecha_nacimiento) ?></td>
                        <td><?php echo ucfirst($users->celular) ?></td>
                        <td><?php echo ucfirst($users->email) ?></td>
                      </tr>
                    <?php
                      } 
                    ?>
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