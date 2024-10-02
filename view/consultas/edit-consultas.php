<?php 
  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
    ?>
<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Consulta</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar la consulta seleccionada
                            </p>
                            <?php
                             //var_dump($consulta = $show->fetch_object()); die();
                            while ($consulta = $show->fetch_object()) { ?>
                                <?php
                                if ($consulta->id_consulta == $_GET['id_consulta']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_fecha">Fecha de la consulta</label>
                                                    <div class="col-sm-9">
                                                        <input type="datetime-local" value="<?php echo $consulta->fecha_consulta ?>" name="new_fecha" class="form-control" id="new_fecha" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_peso">Peso</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $consulta->peso ?>" name="new_peso" class="form-control" id="new_peso" placeholder="Peso del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_upeso">Unidad de medida del Peso</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" value="<?php echo $consulta->unidad_peso ?>" name="new_upeso" id="nacionalidad">
                                                            <option>Kilogramos</option>
                                                            <option>Gramos</option>
                                                            <!-- <option>Miligramos</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_talla">Talla</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $consulta->talla ?>" name="new_talla" class="form-control" id="new_talla" placeholder="Talla del paciente">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_utalla">Unidad de medida de talla</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" value="<?php echo $consulta->unidad_talla ?>" name="new_utalla" id="new_utalla">
                                                            <option>Metros</option>
                                                            <option>Centímetros</option>
                                                            <!-- <option>Milímetros</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_presion">Presion Arterial</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text" value="<?php echo $consulta->presion_arterial ?>" name="new_presion" class="form-control" id="new_presion" placeholder="Presion Arterial del paciente">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">mm Hg</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_diagnostico">Diagnostico</label>
                                                    <div class="col-sm-9">
                                                        <textarea name='new_diagnostico' rows="5" class="form-control"><?php echo $consulta->diagnostico ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_tratamiento">Tratamiento</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" rows="5" name="new_tratamiento" class="form-control" id="new_tratamiento" placeholder="Tratamiento del paciente"><?php echo $consulta->tratamiento ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="new_proxima_consulta">Proxima Consulta</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" value="<?php echo $consulta->proxima_consulta ?>" name="new_proxima_consulta" class="form-control" id="new_proxima_consulta" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="fecha_hidden" value="<?php echo $consulta->fecha_consulta ?>">
                                        <input type="hidden" name="id_paciente" value="<?php echo $consulta->id_paciente ?>">
                                        <input type="hidden" name="id_consulta" value="<?php echo $consulta->id_consulta ?>">

                                        
                                        <button type="submit" name="accion" class="btn btn-success mr-2" onclick=" location = 'show-edit-consultas.php?id_consulta=<?php echo $consulta->id_consulta ?>'" value="EDIT_CONSULTA">Editar</button>
                                        <button onclick=" location = 'show-historial.php?id_paciente=<?php echo $consulta->id_paciente ?>'" type="button" class="btn btn-light">Volver</button>

                                        <!-- <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_CONSULTA">Editar</button> -->
                                <?php }
                            }
                                ?>
                        </div>
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