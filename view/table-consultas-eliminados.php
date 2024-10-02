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
                                        <h4 class="card-title">Papelera Historial</h4>
                                        <p class="card-description">
                                            Registro de consultas eliminadas
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Fecha de la consulta</th>
                                                        <th>Peso</th>
                                                        <th>Unidad de Medida</th>
                                                        <th>Talla</th>
                                                        <th>Unidad de Medida</th>
                                                        <th>Presión Arterial</th>
                                                        <th>Diagnóstico</th>
                                                        <th>Tratamiento</th>
                                                        <th>Próxima Consulta</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    while ($consulta = $show->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $consulta->id_consulta ?></td>
                                                            <td><?= $consulta->fecha_consulta ?></td>
                                                            <td><?= $consulta->peso ?></td>
                                                            <td><?= $consulta->unidad_peso ?></td>
                                                            <td><?= $consulta->talla ?></td>
                                                            <td><?= $consulta->unidad_talla ?></td>
                                                            <td><?= $consulta->presion_arterial ?> mm Hg </td>
                                                            <td><span class="d-inline-block text-truncate" style="max-width: 150px;"> <?= $consulta->diagnostico ?> </span></td>
                                                            <td> <span class="d-inline-block text-truncate" style="max-width: 150px;"> <?= $consulta->tratamiento ?> </span> </td>
                                                            <td><?= $consulta->proxima_consulta ?></td>
                                                            <td>
                                                                <form method="post">
                                                                    <input type="hidden" name="id_paciente" value="<?php echo $consulta->id_paciente ?>">
                                                                    <input type="hidden" name="id_consulta" value="<?php echo $consulta->id_consulta ?>">
                                                                    <!-- BOTON BORRAR -->
                                                                    <!--                                                                     <button class="btn btn-inverse-primary  btn-sm" name="accion" value="RESTORE_PACIENTE" type="submit">Restore </button> -->
                                                                    <button type="submit" name="accion" value="RESTORE_CONSULTA" class="btn btn-success btn-rounded btn-icon">
                                                                        <i class="mdi mdi-restore"></i>
                                                                        <button type="submit" name="accion" value="DESTROY_CONSULTA" class="btn btn-danger btn-rounded btn-icon">
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