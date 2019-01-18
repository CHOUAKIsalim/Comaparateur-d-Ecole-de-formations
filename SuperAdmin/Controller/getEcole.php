<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 1:58 PM
 */

require_once ("AdminPageController.php");

$id = $_GET["code"];

$adminPageController = new AdminPageController();

$json = array();
$json = $adminPageController->getEcole($id);
echo json_encode($json);
