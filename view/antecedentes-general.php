
<body>
    <!-- Comienza info-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <!-- Comienza Tabla panes -->
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Listado de Antecedentes</h4>
                            <p class="card-description">
                                Lista de todos los pacientes con antecedentes Medicos
                            </p>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button type="button" onclick=" location = 'reports/report_antecedentes.php'" name="accion" class="btn btn-inverse-primary btn-icon-text  btn-sm" value="REPORT_PDF">
                                    Reporte
                                    <i class="ti-printer btn-icon-append"></i>
                                </button>
                            </div>
                            <form class="forms-sample" method="POST">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Paciente</th>
                                                <th>Patología</th>
                                                <th>Fecha</th>
                                                <th>Padece</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($antecedente = $show->fetch_object()) { ?>
                                                <tr>
                                                    <td><?= $antecedente->id_antecedente ?></td>
                                                    <td><?= $antecedente->nombre ?></td>
                                                    <td><?= $antecedente->nombre_patologia ?></td>
                                                    <td><?= $antecedente->fecha ?></td>
                                                    <td><?= $antecedente->padece ?></td>
                                                    <td>
                                                        <form method="post">
                                                            <!--                                                             <input type="hidden" name="id_cita" value="<?php //echo $antecedente->id_antecedente 
                                                                                                                                                                        ?>">

                                                             BOTON BORRAR 
                                                            <button type="submit" name="accion" value="DELETE_ANTECEDENTE" class="btn btn-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-delete"></i>
                                                                BOTON EDITAR 
                                                                <button onclick=" location = 'show-edit-antecedente.php?id_antecedente=<?php // echo $antecedente->id_antecedente 
                                                                                                                                        ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
                                                                    <i class="mdi mdi-lead-pencil"></i> -->
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
            </div>
        </div>
    </div>

        