<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 17/01/2019
 * Time: 6:03 PM
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

$admincontroler->modifierEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax);