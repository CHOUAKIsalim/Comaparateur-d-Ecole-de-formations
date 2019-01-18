<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 12:36 PM
 */

require_once ("Accueil.php");
require_once ("Controller/CategorieController.php");

class Compare extends Accueil
{
    private $categorie;
    public function __construct()
    {
        parent::__construct();
        $this->categorie = new CategorieController();
    }

    public function afficherHead()
    {
        echo '<html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="cache-control" content="no-cache" />
                    <link rel="stylesheet" type="text/css" href="View/Styles/acceuil.css" />
                    <link rel="stylesheet" type="text/css" href="View/Styles/compare.css" />
                    <link rel="stylesheet" type="text/css" href="View/Styles/categorie.css" />
                    
                    <title>Choose Your Formation ! </title>
                
                </head>
                
                <body>';
    }


    public function afficherCorps($num = null)
    {
        $categoriesDispo =  $this->categorie->getCategories();
        echo '<div id="corps">';
        echo '<select id="categorieSelect" style="width: 100%"> <option value=""></option>';
        foreach ($categoriesDispo as $row)
        {
            echo '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        echo '</select> 
                <div id="divEcole1"> <select id="ecole1"></select> 
                    <table id="tableauEcole1"> 
                        <tr>
                            <th>Formation</th>
                            <th>Volume horraire</th>
                            <th>Prix HT</th>
                            <th>Taxe</th>
                            <th>Prix TTC</th>
                        </tr>
                    </table>
                </div>
                <div id="divEcole2"> <select id="ecole2"></select> 
                    <table id="tableauEcole2"> 
                        <tr>
                            <th>Formation</th>
                            <th>Volume horraire</th>
                            <th>Prix HT</th>
                            <th>Taxe</th>
                            <th>Prix TTC</th>
                        </tr>
                    </table>
                </div>
            </div>';
    }

}