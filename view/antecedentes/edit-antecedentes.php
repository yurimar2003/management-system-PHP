<?php 
  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
    ?>
<body>
    <!-- Comienza Formulario -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Antecedentes</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar el antecedente seleccionado
                            </p>

                            <?php
                            // var_dump($antecedete = $show->fetch_object()); die();
                            while ($antecedente = $show->fetch_object()) { ?>
                                <?php
                                if ($antecedente->id_antecedente == $_GET['id_antecedente']) {
                                ?>
                                    <form class="forms-sample" method="POST">



                                        <?php foreach ($listPatologias as $value) { ?>
                                            <div class="form-group">
                                                <label for="text">Patología</label>
                                                <select class="form-control" name="patologia" data-iduser="<?php echo $value['id_patologia'] ?>" id="id_patologia">
                                                    <?php foreach ($listPatologias as $number_emp => $emp) { ?>
                                                        <option value="<?php echo $emp['id_patologia'] ?>" <?php if ($antecedente->nombre_patologia === $emp['nombre_patologia']) echo 'selected'; ?>>
                                                            <?php echo ($emp['nombre_patologia']) ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>
                                        <div class=" row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="fecha">Fecha</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" value="<?php echo $antecedente->fecha ?>" name="new_fecha" class="form-control" id="fecha" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="padece">Padece</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?php echo $antecedente->padece ?>" name="new_padece" class="form-control" id="padece" placeholder="Ingrese lo que padece el paciemte">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_antecedente" value="<?php echo $antecedente->id_antecedente ?>">
                                        <input type="hidden" name="id_paciente" value="<?php echo $antecedente->id_paciente ?>">


                                        <!-- BOTON EDITAR -->
                                        <button type="submit" name="accion" class="btn btn-success mr-2" onclick=" location = 'show-edit-antecedentes.php?id_antecedente=<?php echo $antecedente->id_antecedente ?>'" value="EDIT_ANTECEDENTE">Editar</button>
                                        <!-- BOTON VOLVER -->
                                        <button onclick=" location = 'show-antecedentes.php?id_paciente=<?php echo $antecedente->id_paciente ?>'" type="button" class="btn btn-light">Volver</button>
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
</body>
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
