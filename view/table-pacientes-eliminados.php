<?php 
  if($_SESSION['rol']==1){
    ?>
<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Registro Pacientes</h4>
                                        <p class="card-description">
                                            Pacientes Actuales
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombres</th>
                                                        <th>Apellidos</th>
                                                        <th>Nacionalidad</th>
                                                        <th>Documento de identidad</th>
                                                        <th>Fecha de Nacimiento</th>
                                                        <th>Teléfono</th>
                                                        <th>Sexo</th>
                                                        <th>Dirección</th>
                                                        <th>Número del paciente</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    while ($paciente = $pacientes->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $paciente->id_paciente ?></td>
                                                            <td><?= $paciente->nombre ?></td>
                                                            <td><?= $paciente->apellido ?></td>
                                                            <td><?= $paciente->nacionalidad ?></td>
                                                            <td><?= $paciente->documento_identidad ?></td>
                                                            <td><?= $paciente->fecha_nacimiento ?></td>
                                                            <td><?= $paciente->telefono ?></td>
                                                            <td><?= $paciente->sexo ?></td>
                                                            <td><span class="d-inline-block text-truncate" style="max-width: 150px;"><?= $paciente->direccion ?> </span></td>
                                                            <td><?= $paciente->numero_paciente ?></td>
                                                            <td>
                                                                <form method="post">
                                                                    <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente ?>">
                                                                    <!-- BOTON BORRAR -->
                                                                    <!--                                                                     <button class="btn btn-inverse-primary  btn-sm" name="accion" value="RESTORE_PACIENTE" type="submit">Restore </button> -->
                                                                    <button type="submit" name="accion" value="RESTORE_PACIENTE" class="btn btn-success btn-rounded btn-icon">
                                                                        <i class="mdi mdi-restore"></i>
                                                                        <button type="submit" name="accion" value="DESTROY_PACIENTE" class="btn btn-danger btn-rounded btn-icon">
                                                                            <i class="mdi mdi-delete-forever"></i>
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
            </div>
        </div>
    </div>
    <?php
} ?>
    <?php
    if ($_SESSION['rol']==2|| $_SESSION['rol']==3) {
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