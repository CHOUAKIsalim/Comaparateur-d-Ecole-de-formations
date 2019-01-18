
<?php

require("View/CategorieView.php");
$pageAcceuil = new CategorieView();
$pageAcceuil->afficherHead();
$pageAcceuil->afficherHeader();
$pageAcceuil->afficherMenu();
$pageAcceuil->afficherCorps(6);
$pageAcceuil->afficherPiedDePage();
$pageAcceuil->fermerBody();
?>