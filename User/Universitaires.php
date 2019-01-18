
<?php

    require("View/CategorieView.php");
    $pageAcceuil = new CategorieView();
    $pageAcceuil->afficherHead();
    $pageAcceuil->afficherHeader();
    $pageAcceuil->afficherMenu();
    $pageAcceuil->afficherCorps(1);
    $pageAcceuil->afficherPiedDePage();
    $pageAcceuil->fermerBody();
?>


