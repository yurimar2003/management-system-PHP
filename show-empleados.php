<?php 
session_start();
if(!isset ($_SESSION ['rol'])){
 header('location: /sistema-consultorio-deysy/show-login.php');
}else{
 if($_SESSION['rol']==1){
    include('header.php');
    include('controller/empleados.php');
    include('sidebar.php');
    include('view/empleados.php');
include('footer.php');
}
if($_SESSION['rol']==2){
    include('header.php');
    include('controller/empleados.php');
    include('sidebar-editor.php');
    include('view/empleados.php');
include('footer.php');
}
if($_SESSION['rol']==3){
    include('header.php');
    include('controller/empleados.php');
    include('sidebar-lector.php');
    include('view/empleados.php');
include('footer.php');
}
} 
/* include('controller/empleados.php');
include('header.php');
include('sidebar.php');
include('view/empleados.php'); 
include('footer.php');
 */
