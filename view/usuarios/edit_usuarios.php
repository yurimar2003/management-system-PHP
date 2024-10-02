<?php 
  if($_SESSION['rol']==1 ){
    ?>
<body>
  <!-- Comienza Formulario usuarios-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Usuarios</h4>
              <div class="text-danger mt-1" ?php if ($error) ?>
                <?php
                echo $error
                ?>
              </div>
              <p class="card-description">
                Formulario para registrar un nuevo usuario
              </p>
              <?php
              while ($usuario = $usuarios->fetch_object()) { ?>
                <?php
                if ($usuario->id_usuario == $_GET['id_usuario']) {
                ?>
                  <form class="forms-sample" method="POST">
                    <!-- EMPLEADO -->
                    <?php foreach ($listEmp as $value) { ?>
                      <div class="form-group">
                        <label for="text">Empleados</label>
                        <select class="form-control" name="new_empleado" data-iduser="<?php echo $value['id_empleado'] ?>" id="empleado">
                          <?php foreach ($listEmp as $number_emp => $emp) { ?>
                            <option value="<?php echo $emp['id_empleado'] ?>" <?php if ($usuario->nombre === $emp['nombre']) echo 'selected'; ?>>
                              <?php echo ($emp['documento_identidad']) ?>
                              <?php echo ($emp['nombre']) ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } ?>
                    <!-- ROL -->
                    <?php foreach ($listRol as $value) { ?>
                      <div class="form-group">
                        <label for="text">Roles</label>
                        <select class="form-control" name="new_rol" data-iduser="<?php echo $value['id_rol'] ?>" id="rol">
                          <?php foreach ($listRol as $number_rol => $rol) { ?>
                            <option value="<?php echo $rol['id_rol'] ?>" <?php if ($usuario->tipo_rol === $rol['tipo_rol']) echo 'selected'; ?>>
                              <?php echo ($rol['tipo_rol']) ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } ?>
                    <div class="form-group">
                      <label for="correo">Correo</label>
                      <input type="email" value="<?php echo $usuario->correo ?>" name="new_correo" class="form-control" id="correo" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">
                      <label for="contrasena">Nueva contraseña</label>
                      <input type="password" name="new_contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
                    </div>
                    <input type="hidden" value="<?php echo $usuario->contrasena ?>" name="current_pass" class="form-control" id="current_pass" placeholder="Contraseña">
                <?php }
              }
                ?>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_USUARIO">Editar</button>
                <button onclick=" location = 'show-usuarios.php'" type="button" class="btn btn-light">Volver</button>
                  </form>
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
