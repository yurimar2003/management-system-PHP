<?php 
  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
    ?>
<body>
    <!-- Comienza info-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <!-- Comienza Tabla -->
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Antecedentes del paciente</h4>
                            <p class="card-description">
                                Antecedentes totales del paciente
                            </p>
                            <?php
                            while ($paciente = $pacientes->fetch_object()) { ?>
                                <?php
                                if ($paciente->id_paciente == $_GET['id_paciente']) {
                                ?>

                                    <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente ?>">
                                    <button type="button" onclick=" location = 'show-form-antecedente.php?id_paciente=<?php echo $paciente->id_paciente ?>'" name="accion" class="btn btn-inverse-primary btn-sm">Crear Antecedente</button>

                                    <form class="forms-sample" method="POST">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Patología</th>
                                                        <th>Fecha</th>
                                                        <th>Padece</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($antecedente = $antecedentes->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $antecedente->id_antecedente ?></td>
                                                            <td><?= $antecedente->nombre_patologia ?></td>
                                                            <td><?= $antecedente->fecha ?></td>
                                                            <td><?= $antecedente->padece ?></td>
                                                            <td>
                                                                <form method="post">
                                                                    <input type="hidden" name="id_antecedente" value="<?php echo $antecedente->id_antecedente ?>">
                                                                    <input type="hidden" name="id_paciente" value="<?php echo $antecedente->id_paciente ?>">

                                                                    <!-- BOTON BORRAR -->
                                                                    <button type="submit" name="accion" value="DELETE_ANTECEDENTE" class="btn btn-danger btn-rounded btn-icon">
                                                                        <i class="mdi mdi-delete"></i>
                                                                        <!-- BOTON EDITAR -->
                                                                        <button onclick=" location = 'show-edit-antecedentes.php?id_antecedente=<?php echo $antecedente->id_antecedente ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
                                                                            <i class="mdi mdi-lead-pencil"></i>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
                <!-- Comienza Tabla -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente ?>">
                            <?php
                            ?>
                            <h4 class="card-title">Paciente <?php echo $paciente->nombre ?> <?php echo $paciente->apellido ?></h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                    echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Ficha del paciente
                            </p>

                            <form class="forms-sample" method="POST">
                                <div class="form-group">
                                    <!-- <td class="py-2 mx-12">
                                            <img src="src/images/faces/face1.jpg" alt="image" />
                                        </td><br> -->
                                    <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente ?>">
                                    <?php $pac = $paciente->id_paciente ?>

                                    <label for="nombre">Nombre: <?php echo $paciente->nombre ?></label>
                                    <br>
                                    <label for="apellido">Apellido: <?php echo $paciente->apellido ?></label>
                                    <br>
                                    <label for="nacionalidad">Nacionalidad: <?php echo $paciente->nacionalidad ?></label>
                                    <br>
                                    <label for="doc_ide">Documento de identidad: <?php echo $paciente->documento_identidad ?></label>
                                    <br>
                                    <label for="fec_nac">Fecha de Nacimiento: <?php echo $paciente->fecha_nacimiento ?></label>
                                    <br>
                                    <label for="telefono">Telefono: <?php echo $paciente->telefono ?></label>
                                    <br>
                                    <label for="telefono">Sexo: <?php echo $paciente->sexo ?></label>
                                    <br>
                                    <label for="telefono">Dirección: <?php echo $paciente->direccion ?></label>
                                    <br>
                                    <input type="hidden" name="doc_hidden" value="<?php echo ($paciente->doc_ide) ?>">
                                    <button type="button" onclick=" location = 'show-edit-pacientes.php?id_paciente=<?php echo $paciente->id_paciente ?>'" name="accion" class="btn btn-inverse-warning btn-sm">Editar Paciente</button>


                                    <button onclick=" location = 'show-table-pacientes.php'" type="button" class="btn btn-inverse-secondary btn-sm">Volver</button>

                            </form>
                    <?php }
                            }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} ?>
    <?php
    if ($_SESSION['rol'] == 3) {
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