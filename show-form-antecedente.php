<?php 
session_start();
if(!isset ($_SESSION ['rol'])){
 header('location: /sistema-consultorio-deysy/show-login.php');
}else{
 if($_SESSION['rol']==1){
    include('header.php');
    include('controller/pacientes.php');
    include('controller/antecedentes.php');
    include('sidebar.php');
    include('view/form-antecedentes.php');
include('footer.php');
}
if($_SESSION['rol']==2){
    include('header.php');
    include('controller/pacientes.php');
    include('controller/antecedentes.php');
    include('sidebar-editor.php');
    include('view/form-antecedentes.php');
include('footer.php');
}
if($_SESSION['rol']==3){
    include('header.php');
    include('controller/pacientes.php');
    include('controller/antecedentes.php');
    include('sidebar-lector.php');
    include('view/form-antecedentes.php');
include('footer.php');
}
} 



/* include('controller/pacientes.php');
include('controller/antecedentes.php');
include('header.php');
include('sidebar.php');
include('view/form-antecedentes.php'); 
include('footer.php');
 */