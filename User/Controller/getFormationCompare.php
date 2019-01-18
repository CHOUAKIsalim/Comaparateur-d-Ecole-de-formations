<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 1:28 PM
 */

require_once ('../Model/Ecole.php');

$id = $_GET["valeur"];

$ecole = new Ecole();

$json = array(); // tu initialises ton array ici
$json = $ecole->getEcoles($id);
echo json_encode($json);
