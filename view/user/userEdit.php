<?php foreach (parent::getUser($_REQUEST['u']) as $user) {} ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edición de usuario</h1>
            </div>
            <form method="POST" action="<?php echo APP_URL ?>usuario/actualizar">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['u'] ?>">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php echo ucfirst($user->nombre) ?>" required>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido" value="<?php echo ucfirst($user->apellido) ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value="<?php echo $user->clave ?>" disabled>
                </div>
                <div class="col-sm-6">
                  <select class="form-control" name="estado" id="estado" placeholder="Estado" required>
                        <?php
                            foreach (parent::getStates() as $states) {
                        ?>
                            <option value="<?php echo($states->idEstado) ?>" <?php $states->idEstado == $user->estado ? 'selected' : '' ?> > <?php echo( ucfirst($states->nombreEstado)) ?></option>
                        <?php
                            }
                        ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <select class="form-control" name="type_identification" id="type_identification" placeholder="Estado" required>
                          <?php
                              foreach (parent::getTypeDocument() as $typeDocument) {
                          ?>
                              <option value="<?php echo($typeDocument->id) ?>" <?php $typeDocument->id == $user->tipo_identificacion ? 'selected' : '' ?> > <?php echo( ucfirst($typeDocument->tipo)) ?></option>
                          <?php
                              }
                          ?>
                  </select>
                </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="document" id="document" placeholder="Documento" value="<?php echo $user->nit ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="date" class="form-control" name="date" id="date" placeholder="Fecha de nacimiento" value="<?php echo $user->fecha_nacimiento ?>" required>
                </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="phone" id="phone" placeholder="Celular" value="<?php echo $user->celular ?>" required>
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" value="<?php echo $user->email ?>" required>
              </div>
              <button type="submit" class="btn btn-success btn-user btn-block">Actualizar</button>
              <hr>
            </form>
            <form action="<?php echo APP_URL ?>usuario/eliminar" method="POST">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['u'] ?>">
                <button type="submit" class="btn btn-danger btn-user btn-block">Eliminar</button>
              </form>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Asignación de roles</h1>
            </div>
            <form method="POST" action="<?php echo APP_URL ?>usuario/asignar">
            <input type="hidden" name="id" value="<?php echo $_REQUEST['u'] ?>">
              <div class="form-group">
                <select class="form-control" name="rol" id="rol" required>
                    <?php
                    foreach (parent::getRoles() as $rol) {
                        ?>
                            <option value="<?php echo($rol->id) ?>" <?php $rol->id == $user->cod_rol ? 'selected' : '' ?> > <?php echo( ucfirst($rol->nombre)) ?></option>
                        <?php
                    } 
                    ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="estado" id="estado" placeholder="Estado" required>
                        <?php
                            foreach (parent::getStates() as $states) {
                        ?>
                            <option value="<?php echo($states->idEstado) ?>" <?php $states->idEstado == $user->cod_estado ? 'selected' : '' ?> > <?php echo( ucfirst($states->nombreEstado)) ?></option>
                        <?php
                            }
                        ?>
                  </select>
              </div>
              <button type="submit" class="btn btn-success btn-user btn-block">Asignar</button>
              <hr>
            </form>
          </div>
        </div>
      </div>                        
    <!-- /.container-fluid -->
    </div>
  </div>
</div>