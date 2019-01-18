<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 17/01/2019
 * Time: 6:18 PM
 */

require_once ("AdminPageController.php");
$admincontroler = new AdminPageController();
$id = $_POST["id"];

$admincontroler->desactiverEcole($id);
