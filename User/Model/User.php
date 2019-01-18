<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:06 PM
 */

require_once ("bddConnexion.php");

class User
{
    public function verifyUser($username)
    {
        $requete="Select * from user where username = '".$username."'";
        return bddConnexion::execute_query($requete);
    }

}
