
<?php
    require ("View/Compare.php");
    $page = new Compare();
    $page->afficherHead();
    $page->afficherHeader();
    $page->afficherMenu();
    $page->afficherCorps();
    $page->afficherPiedDePage();
    $page->fermerBody();

?>
