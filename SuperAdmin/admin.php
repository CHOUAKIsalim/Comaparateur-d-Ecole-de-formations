<?php
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["type"]) || $_SESSION["type"]!=0) header('Location: /ProjetWeb/SuperAdmin');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />

    <title>Page administrateur</title>

    <link href="View/Styles/adminstyle.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="View/Scripts/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="View/Scripts/gestionUsersetComments.js"></script>
    <script type="text/javascript" src="View/Scripts/gestionEcoles.js"></script>

</head>

<body>
<?php
    require_once ("View/AdminPage.php");
    $adminPage = new AdminPage();
    $adminPage->afficherTitre();
    $adminPage->afficherTableauFormations();
    $adminPage->afficherFormInsertion();
    $adminPage->afficherDeconnexion();
    $adminPage->afficherCommentaires();
    $adminPage->afficherUsers();
?>





</body>
</html>

