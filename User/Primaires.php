<?php

require("View/CategorieView.php");
$pageAcceuil = new CategorieView();
$pageAcceuil->afficherHead();
$pageAcceuil->afficherHeader();
$pageAcceuil->afficherMenu();
$pageAcceuil->afficherCorps(5);
$pageAcceuil->afficherPiedDePage();
$pageAcceuil->fermerBody();
?>