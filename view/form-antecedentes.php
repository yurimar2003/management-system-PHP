<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Antecedente</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para crear antecedentes
                            </p>
                            <form class="forms-sample" method="POST">
                                <?php foreach ($listPatologias as $value) { ?>
                                    <div class="form-group">
                                        <label class="" for="text">Patología</label> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <select class="js-example-basic-single" name="patologia" data-iduser="<?php echo $value['id_patologia'] ?>" id="patologia">
                                            <?php foreach ($listPatologias as $number_pat => $pat) { ?>
                                                <option class="col-2 text-truncate" value="<?php echo $pat['id_patologia'] ?>" <?php if ($value['nombre_patologia'] == $pat['nombre_patologia']) echo 'selected'; ?>>
                                                    <?php echo ($pat['nombre_patologia']) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="fecha">Fecha</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="fecha" class="form-control" id="fecha" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="padece">Padece</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="padece" class="form-control" id="padece" placeholder="Ingrese que padece el paciemte">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            while ($paciente = $pacientes->fetch_object()) { ?>
                                                <?php
                                                if ($paciente->id_paciente == $_GET['id_paciente']) {
                                                ?>
                                                    <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente ?>">
                                            <?php }
                                            }
                                            ?>
                                </div>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_ANTECEDENTE">Añadir</button>
                                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>