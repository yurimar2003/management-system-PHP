<?php
/*    session_start();
  if(!isset ($_SESSION ['rol'])){
    header('location: /sistema-consultorio-deysy/show-login.php');
  }else{
    if($_SESSION['rol'] !=3 ){
      header('location: /sistema-consultorio-deysy/show-login.php');
  }
}   */

?>

<div class="container-scroller">
  <!-- navbar -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="show-home-lector.php"><img src="src/images/corazon.png" class="mr-" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="show-home-lector.php"><img src="src/images/corazon.png" alt="logo" /></a>
    </div>
     <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button> 

      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="close-sesion" href="view/cerrar-sesion.php" data-toggle="dropdown" id="profileDropdown">
            <i class="icon-ellipsis"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="show-cerrar-sesion.php">
              <i class="ti-power-off text-primary"></i>
              Cerrar sesión
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>

  <div class="container-fluid page-body-wrapper">
    <!-- Comienza Sidebar -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <div class="fs-2 mb-3">
          <svg width="40" height="40" class="text-primary" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
          </svg>
          Lector (a)
        </div>
        <li class="nav-item">
          <a class="nav-link" href="show-home-lector.php">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">Inicio</span>
          </a>
        </li>
        <!--         <li class="nav-item">
          <a class="nav-link" href="show-citas.php">
            <i class="mdi mdi-clipboard-outline menu-icon"></i>
            <span class="menu-title">Citas</span>
          </a>
        </li> -->
        <!--           <li class="nav-item"> 
            <a class="nav-link" href="show-consultas.php">
              <i class="mdi mdi-weight-kilogram menu-icon"></i>
              <span class="menu-title">Consultas</span>
            </a>
          </li> -->
        <!--         <li class="nav-item">
          <a class="nav-link" href="show-empleados.php">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">Empleados</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-stethoscope menu-icon"></i>
            <span class="menu-title">Pacientes</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="show-form-pacientes.php">Nuevo Paciente</a></li>
              <li class="nav-item"> <a class="nav-link" href="show-table-pacientes.php">Pacientes</a></li>
              <li class="nav-item"> <a class="nav-link" href="show-table-pacientes-eliminados.php?status=eliminados">Eliminados</a></li> 
            </ul>
          </div>
        </li> -->
        <!--         <li class="nav-item">
          <a class="nav-link" href="show-patologias.php">
            <i class="mdi mdi-heart-pulse menu-icon"></i>
            <span class="menu-title">Patologias</span>
          </a>
        </li> -->
        <!--         <li class="nav-item">
          <a class="nav-link" href="show-roles.php">
            <i class="mdi mdi-account-convert menu-icon"></i>
            <span class="menu-title">Roles</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="show-recibos.php">
            <i class=" icon-paper menu-icon"></i>
            <span class="menu-title">Recibos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-antecedentes-general.php">
            <i class="mdi mdi-pill menu-icon"></i>
            <span class="menu-title">Antecedentes</span>
          </a>
        </li>
        <!--         <li class="nav-item">
          <a class="nav-link" href="show-usuarios.php">
            <i class="mdi mdi-account-multiple menu-icon"></i>
            <span class="menu-title">Usuarios</span>
          </a>
        </li> -->
        <!-- COMIENZA PAPELERA -->
        <!--         <li class="nav-item">
          <a class="nav-link" href="">
            <i class="mdi mdi-recycle menu-icon"></i>
            <span class="menu-title">Papelera</span>
          </a>
        </li> -->
        <!-- COMIENZAN MODULOS PAPELERA -->
        <!--         <li class="nav-item">
          <a class="nav-link" href="show-table-pacientes-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Pacientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-citas-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Citas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-empleados-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Empleados</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-consultas-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Consultas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-antecedentes-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Antecedentes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-patologias-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Patologías</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-recibos-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Recibos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-usuarios-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Usuarios</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-table-roles-eliminados.php?status=eliminados">
            <i class=""></i>
            <span class="menu-title">Roles</span>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- Termina Sidebar -->