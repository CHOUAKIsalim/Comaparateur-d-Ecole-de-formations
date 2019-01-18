<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 3:12 PM
 */

require_once ("CommentController.php");

$commentController = new CommentController();
$commentaire = $_POST["commentaire"];
$user = $_POST["user"];
$ecole = $_POST["ecole"];

$commentController->insererCommentaire($commentaire,$user,$ecole);