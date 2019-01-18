<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 8:15 PM
 */

require_once ("../Model/TypeFormation.php");
require_once ("../Model/Formation.php");

class FormationsController
{
    private $typeFormationGetter;
    private $formationGetter;

    public function __construct()
    {
        $this->typeFormationGetter = new TypeFormation();
        $this->formationGetter = new Formation();
    }

    public function getTypesFormations($id = null)
    {
        $res = $this->typeFormationGetter->getAllTypesFormation($id);
        for ($i=0 ; $i<count($res) ; $i++)
        {
            $res[$i]["ttc"] = $res[$i]["prixht"] +  ($res[$i]["prixht"] * $res[$i]["taux"] / 100);
        }
        return $res;
    }

    public function getSousFormations($typesFormations)
    {
        $result = [];
        foreach ($typesFormations as $row)
       {

             $sousFormations = $this->formationGetter->getFormations($row["id"]);
             $result[$row["id"]] = $sousFormations;
        }
        return $result;
    }

}