<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 9:39 AM
 */


require_once ("bddConnexion.php");

class Categorie
{
    function getCategories()
    {
        $requete = "SELECT * FROM categorie";
        return bddConnexion::execute_query($requete);
    }

}