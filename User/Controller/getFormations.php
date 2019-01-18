<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 1:58 PM
 */

require_once ("FormationsController.php");

$id = $_GET["valeur"];

$formationController = new FormationsController();

$json = array(); // tu initialises ton array ici
$json = $formationController->getTypesFormations($id);
echo json_encode($json);
