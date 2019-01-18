<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 4:01 PM
 */

require_once ("AdminPageController.php");
$admincontroler = new AdminPageController();
$id = $_POST["id"];

$admincontroler->supprimerEcole($id);
