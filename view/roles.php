<?php 
  if($_SESSION['rol']==1){
    ?>
<body>
  <!-- Comienza Formulario panes-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Roles</h4>
              <div class="text-danger mt-1">
                <div class="text-danger mt-1" ?php if ($error) ?>
                  <?php
                  echo $error
                  ?>
                </div>
              </div>
              <p class="card-description">
                Formulario para añadir roles a su tabla
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="tipo_rol">Tipo de rol</label>
                  <input type="text" name="tipo_rol" class="form-control" id="tipo_rol" placeholder="Ingrese tipo de rol">
                </div>
                <div>
                  <blockquote class="blockquote blockquote-warning">
                    <h4 class="card-title text-warning">Nota:</h4>
                    <p class="text-warning"> Comuniquese con el desarrolador para poder realizar acciones en este módulo (yurimar2003@gmail.com).</p>
                  </blockquote>
                </div>
                <!-- <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_ROL">Añadir</button> -->
                <button type="submit" name="accion" class="btn btn-success mr-2" value="">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla panes -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla de Roles</h4>
              <p class="card-description">

              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Tipo de rol</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($rol = $roles->fetch_object()) { ?>
                      <tr>
                        <td><?= $rol->id_rol ?></td>
                        <td><?= $rol->tipo_rol ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id_rol" value="<?php echo $rol->id_rol ?>">

                            <!-- BOTON BORRAR -->
<!--                             <button type="submit" name="accion" value="DELETE_ROL" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i> -->
                              <button type="submit" name="accion" value="" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDIATR -->
                              <button onclick=" location = 'show-edit-roles.php?id_rol=<?php echo $rol->id_rol ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
                                <i class="mdi mdi-lead-pencil"></i>
                          </form>

                        </td>
                      </tr>

                    <?php }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
} ?>
    <?php
    if ($_SESSION['rol'] == 3 || $_SESSION['rol']==2) {
    ?>
        <body>
            <div class="main-panel">
                <div class="content-wrapper bg-primary">
                    <div class="row">
                        <!--       <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary"> -->
                        <div class="row flex-grow">
                            <div class="col-lg-7 mx-auto text-white">
                                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                    <h2>¡LO SENTIMOS!</h2>
                                    <br>
                                    <h3 class="font-weight-light"> No se encontró la página que está buscando. Quizás no tengas acceso</h3>
                                    <hr>
                                    <h1 class="mb-0">404</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

        }
