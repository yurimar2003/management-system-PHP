<?php 
  if($_SESSION['rol']==1){
    ?>
<body>
    <!-- Comienza Formulario-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Patologías</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para registrar una nueva patología
                            </p>
                            <form class="forms-sample" method="POST">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de la patología">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="Ingrese una descripción de la patología"></textarea>
                                </div>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_PATOLOGIA">Añadir</button>
                                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Comienza Tabla -->
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Registro de patologías</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="card-description">
                                        Patologías activas
                                    </p>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <button type="button" onclick=" location = 'reports/report_patologias.php'" name="accion" class="btn btn-inverse-primary btn-icon-text  btn-sm" value="REPORT_PDF">
                                        Reporte
                                        <i class="ti-printer btn-icon-append"></i>
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($patologia = $patologias->fetch_object()) { ?>
                                                <tr>
                                                    <td><?= $patologia->id_patologia ?></td>
                                                    <td><?= $patologia->nombre_patologia ?></td>
                                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;"><?= $patologia->descripcion ?> </span></td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="id_patologia" value="<?php echo $patologia->id_patologia ?>">
                                                            <!-- BOTON BORRAR -->
                                                            <button type="submit" name="accion" value="DELETE_PATOLOGIA" class="btn btn-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-delete"></i>
                                                                <!-- BOTON BORRAR -->
                                                                <button onclick=" location = 'show-edit-patologias.php?id_patologia=<?php echo $patologia->id_patologia ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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
