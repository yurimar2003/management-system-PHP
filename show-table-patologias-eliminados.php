<?php 
session_start();
if(!isset ($_SESSION ['rol'])){
 header('location: /sistema-consultorio-deysy/show-login.php');
}else{
 if($_SESSION['rol']==1){
    include('controller/patologias.php');
    include('header.php');
    include('sidebar.php');
    include('view/table-patologias-eliminados.php');
include('footer.php');
}
if($_SESSION['rol']==2){
    include('controller/patologias.php');
    include('header.php');
    include('sidebar-editor.php');
    include('view/table-patologias-eliminados.php');
include('footer.php');
}
if($_SESSION['rol']==3){
    include('controller/patologias.php');
    include('header.php');
    include('sidebar-lector.php');
    include('view/table-patologias-eliminados.php');
include('footer.php');
}
}
/* include('controller/patologias.php');
include('header.php');
include('sidebar.php');
include('view/table-patologias-eliminados.php'); 
include('footer.php'); */