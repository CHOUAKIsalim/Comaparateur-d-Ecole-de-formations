<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 9:45 PM
 */

require_once ("bddConnexion.php");
class TypeFormation
{

    public function getAllTypesFormation($id)
    {
        if($id ==null)
        {
            $requete = "Select * from type_formation";
            $res =  bddConnexion::execute_query($requete);
        }
        else
        {
                $requete = "Select * from type_formation t where t.ecoleid = ".$id;
                $res = bddConnexion::execute_query($requete);
        }
        return $res;

    }
}

