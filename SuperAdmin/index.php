<?php
session_start();
if(isset($_SESSION["username"]) && (isset($_SESSION["type"])) && ($_SESSION["type"]==0)) header('Location: /ProjetWeb/SuperAdmin/admin.php');
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />
    <title>Tesla School</title>
    <link href="View/Styles/connexionForm.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
    require_once ("View/Connexion.php");
    $connexion = new Connexion();
    $connexion->afficherFormulaire();
?>

</body>
</html>
