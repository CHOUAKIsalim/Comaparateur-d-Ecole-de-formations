<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 9:39 AM
 */


require_once ("bddConnexion.php");

class Comment
{
    public function getCommentaires()
    {
        $requete = "SELECT c.message, u.username, c.id FROM comment as c JOIN user as u ON u.id = c.userid JOIN ecole as e ON e.id = c.ecoleid";
        return bddConnexion::execute_query($requete);
    }

    public function supprimerCommentaire($id)
    {
        $requete = "Delete from comment where id = ".$id;
        return bddConnexion::execute_query($requete);
    }
}