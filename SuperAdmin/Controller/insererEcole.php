<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 11:05 PM
 */


require_once ("AdminPageController.php");
$code = $_POST["code"];
$nom = $_POST["nom"];
$adresse = $_POST["adresse"];
$commune = $_POST["commune"];
$categorie = $_POST["categorie"];
$domaine = $_POST["domaine"];
$telephone = $_POST["telephone"];
$fax = $_POST["fax"];

$admincontroler = new AdminPageController();

$admincontroler->insererEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax);