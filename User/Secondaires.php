
<?php

    require("View/CategorieView.php");
    $pageAcceuil = new CategorieView();
    $pageAcceuil->afficherHead();
    $pageAcceuil->afficherHeader();
    $pageAcceuil->afficherMenu();
    $pageAcceuil->afficherCorps(3);
    $pageAcceuil->afficherPiedDePage();
    $pageAcceuil->fermerBody();
?>