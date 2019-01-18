
<?php
    require ("View/Accueil.php");
    $pageAcceuil = new Accueil();
    $pageAcceuil->afficherHead();
    $pageAcceuil->afficherHeader();
    $pageAcceuil->afficherMenu();
    $pageAcceuil->afficherCorps();
    $pageAcceuil->afficherPiedDePage();
    $pageAcceuil->fermerBody();

?>
