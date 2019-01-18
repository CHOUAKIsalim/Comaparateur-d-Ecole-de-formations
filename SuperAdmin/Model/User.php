<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 10:08 PM
 */

class User
{
    public function getUsers()
    {
        $req = "SELECT * from user";
        return bddConnexion::execute_query($req);
    }

    public function supprimerUser($id)
    {
        $requete = "Delete from user where id = " . $id;
        return bddConnexion::execute_query($requete);
    }

    public function desactiverUser($id)
    {
        $req = "UPDATE user SET actif = 0 where id = ".$id;
        return bddConnexion::execute_query($req);
    }

    public function activerUser($id)
    {
        $req = "UPDATE user SET actif = 1 where id = ".$id;
        return bddConnexion::execute_query($req);
    }

}