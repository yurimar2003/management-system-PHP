<?php 
  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
    ?>
<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modificar Patologia</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para modificar la patología seleccionada
                            </p>
                            <?php
                            while ($patologia = $patologias->fetch_object()) { ?>
                                <?php
                                if ($patologia->id_patologia == $_GET['id_patologia']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" value="<?php echo $patologia->nombre_patologia ?>" name="new_nombre" class="form-control" id="nombre" placeholder="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <textarea class="form-control" name="new_descripcion" id="descripcion" rows="5" placeholder="Ingrese una descripción de la patología"><?php echo $patologia->descripcion ?></textarea>
<!--                                             <input type="text" value="<?php echo $patologia->descripcion ?>" name="new_descripcion" class="form-control" id="descripcion" placeholder="descripcion">
 -->                                        </div>
                                        <input type="hidden" value="<?php echo $patologia->nombre_patologia ?>" name="hidden_nombre" class="form-control" id="descripcion" placeholder="descripcion">
                                <?php }
                            }
                                ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_PATOLOGIA">Editar</button>
                                <button onclick=" location = 'show-patologias.php'" type="button" class="btn btn-light">Volver</button>
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
