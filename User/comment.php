
<?php
    require_once("View/CommentView.php");
    $view = new CommentView();
    $view->afficherHead();
    $view->afficherHeader();
    $view->afficherMenu();
    $view->afficherCorps($_GET["nom"]);
    $view->afficherPiedDePage();
    $view->fermerBody();

?>




