<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 3:53 PM
 */

class Commune
{
    function getCommunes()
    {
        $req = "SELECT * from commune";
        return bddConnexion::execute_query($req);
    }

}