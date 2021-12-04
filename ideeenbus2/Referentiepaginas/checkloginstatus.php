<?php

session_start();

$host = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

switch($host) {
    case 'localhost/ideeenbus2/Webpaginas/accountAanmaken.php';
        if (isset($_SESSION["gebruikerId"])) {
            header("location: ../Webpaginas/home.php");
        } else {

        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/inlog.php';
        if (isset($_SESSION["gebruikerId"])) {
            header("location: ../Webpaginas/home.php");
        } else {

        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/start.php';
        if (isset($_SESSION["gebruikerId"])) {
            header("location: ../Webpaginas/home.php");
        } else {

        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/besteideeen.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/home.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/onderwerp.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/postidee.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/profiel.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/profielaanpassen.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/recenteideeen.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/wachtwoordwijzigen.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;
    case 'localhost/ideeenbus2/Webpaginas/zoek.php';
        if (isset($_SESSION["gebruikerId"])) {
            
        } else {
            header("location: ../Webpaginas/start.php");
        }
    break;

}
