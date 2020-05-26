
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-gray-800">Roles</h1> -->
    </div>

<!-- Content Row -->

<div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crea un nuevo rol</h1>
              </div>
              <form method="POST" action="<?php echo APP_URL ?>usuario/rol">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="rol_name" id="rol_name" placeholder="Nombre" required>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" name="rol_estado" id="rol_estado" placeholder="Estado" required>
                        <option value="" selected>Selecciona... </option>
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
                <button type="submit" class="btn btn-success btn-user btn-block">Crear</button>
                <hr>
              </form>
            </div>
          </div>
        </div>

</div>
<!-- /.container-fluid -->
</div>
</div>