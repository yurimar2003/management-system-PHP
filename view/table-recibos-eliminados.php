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
                                        <h4 class="card-title">Papelera Recibos</h4>
                                        <p class="card-description">
                                            Registros de recibos eliminados
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre del paciente</th>
                                                        <th>Apellido del paciente</th>
                                                        <th>DNI del paciente</th>
                                                        <th>Dirección del paciente</th>
                                                        <th>Empleado</th>
                                                        <th>Número del recibo</th>
                                                        <th>Fecha y hora del recibo</th>
                                                        <th>Costo total</th>
                                                        <th>Concepto</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    while ($recibo = $recibos->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $recibo->id_recibo ?></td>
                                                            <td><?= $recibo->nombre ?></td>
                                                            <td><?= $recibo->apellido ?></td>
                                                            <td><?= $recibo->documento_identidad ?></td>
                                                            <td><?= $recibo->direccion ?></td>
                                                            <td><?= $recibo->cargo ?></td>
                                                            <td><?= $recibo->numero_recibo ?></td>
                                                            <td><?= $recibo->fecha ?></td>
                                                            <td><?= $recibo->precio ?> USD</td>
                                                            <td><?= $recibo->concepto ?></td>
                                                            <td>
                                                                <form method="post">
                                                                    <input type="hidden" name="id_recibo" value="<?php echo $recibo->id_recibo ?>">
                                                                    <!-- BOTONES -->
                                                                    <button type="submit" name="accion" value="RESTORE_RECIBO" class="btn btn-success btn-rounded btn-icon">
                                                                        <i class="mdi mdi-restore"></i>
                                                                        <button type="submit" name="accion" value="DESTROY_RECIBO" class="btn btn-danger btn-rounded btn-icon">
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