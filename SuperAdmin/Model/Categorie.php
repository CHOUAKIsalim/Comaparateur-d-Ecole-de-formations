<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 10:08 PM
 */

class Categorie
{
    public function getCategories()
    {
        $req = "SELECT * from categorie";
        return bddConnexion::execute_query($req);
    }
}