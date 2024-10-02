<?php 
session_start();
if(!isset ($_SESSION ['rol'])){
 header('location: /sistema-consultorio-deysy/show-login.php');
}else{
 if($_SESSION['rol']==1){
    include('header.php');
    include('sidebar.php');
    include('view/home.php');
include('footer.php');
}
if($_SESSION['rol']==2){
    include('header.php');
    include('sidebar-editor.php');
    include('view/home-editor.php');
include('footer.php');
}
if($_SESSION['rol']==3){
    include('header.php');
    include('sidebar-lector.php');
    include('view/home-lector.php');
include('footer.php');
}
} 
