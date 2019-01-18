<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 10:20 PM
 */

class Domaine
{

    public function getDomaines()
    {
        $req = "SELECT * from domaine";
        return bddConnexion::execute_query($req);
    }

}