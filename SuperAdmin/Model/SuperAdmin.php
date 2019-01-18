<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:06 PM
 */

require_once ("bddConnexion.php");

class Admin
{
    public function verifyAdmin($username)
    {
        $requete="Select * from superadmin where type = 0 and username = '".$username."'";
        return bddConnexion::execute_query($requete);
    }

}
