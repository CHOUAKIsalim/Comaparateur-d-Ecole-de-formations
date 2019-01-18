<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 8:26 AM
 */

require_once ('LoginController.php');
$username = $_POST["username"];
$password =sha1($_POST["password"]);
$loginController = new loginController();
$loginController->verifierConnexion($username,$password);
