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
    function getId($name)
    {
        $requete = "SELECT id FROM ecole where nom = '".$name."'";
        return bddConnexion::execute_query($requete);
    }

    public function getCommentaires($id)
    {
        $requete = "SELECT c.message, u.username FROM comment as c JOIN user as u ON u.id = c.userid JOIN ecole as e ON e.id = c.ecoleid where e.id = ".$id;
        return bddConnexion::execute_query($requete);
    }

    public function insererCommentaire($commentaire,$user,$ecole)
    {
        $requete = "Insert into comment (message,userid,ecoleid) VALUES ('".$commentaire."',".$user.",".$ecole.")";
        return bddConnexion::execute_query($requete);
    }
}