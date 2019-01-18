<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 3:05 PM
 */

require_once ("Controller/CategorieController.php");
require_once ("View/Accueil.php");

class CategorieView extends Accueil
{

    private $controleur;
    public function __construct()
    {
        parent::__construct();
        $this->controleur = new CategorieController();
    }

    public function afficherHead()
    {
        echo '<html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="cache-control" content="no-cache" />
                    <link rel="stylesheet" type="text/css" href="View/Styles/acceuil.css" />
                    <link rel="stylesheet" type="text/css" href="View/Styles/categorie.css" />
                    <script type="text/javascript" src="View/Scripts/sort.js" ></script>
                    <title>Choose Your Formation ! </title>
                </head>
                <body>';
    }

    public function fermerBody()
    {
        echo '
                <script type="text/javascript" src="View/Scripts/jquery-3.3.1.min.js"> </script>
                <script type="text/javascript" src="View/Scripts/search.js"> </script>
                
                </html>
            ';
    }

    public function afficherCorps($num=null)
    {
        $ecoles = $this->controleur->getEcoles($num);
        $element='<div id="corps">
        <input id="myInput" type="text" placeholder="Search..">
        <br><br>
        <table>
            <thead>
                <tr>
                    <th onclick="sortTable(0)">Nom</th>
                    <th onclick="sortTable(1)">Categorie</th>
                    <th onclick="sortTable(2)">Commune</th>
                    <th onclick="sortTable(3)">Adresse</th>
                    <th onclick="sortTable(4)">Telephones</th>
                    <th onclick="sortTable(5)">Domaine</th>';
        if(isset($_SESSION["username"])) $element.='<th>Action</th>';
        $element.=' </tr> 
                    </thead>
                    <tbody id="myTable">';

        foreach ($ecoles as $ecole)
        {
            $element.= ' <tr>
                            <td><a href="../../Tesla" target="_blank">'.$ecole["nom"].'</a></td>
                            <td>'.$ecole["categorie"].'</td>
                            <td>'.$ecole["commune"].'</td>
                            <td>'.$ecole["adresse"].'</td>
                            <td>'.$ecole["tel"].'</td>';
            if($ecole["domaine"]) $element.='<td>'.$ecole["domaine"].'</td>';
            else $element.='<td></td>';
            if(isset($_SESSION["username"])) $element.='<td><a href="comment?nom='.$ecole["nom"].'"> <button>Comment</button></a> </td>';
            $element.='</tr>';
        }
        $element.='</tbody> </table> </div>';
        echo $element;
    }
}