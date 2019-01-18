<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 9:39 AM
 */


require_once ("bddConnexion.php");

class Ecole
{
    function getEcoles($num)
    {
            $requete = "SELECT d.nom as domaine,e.nom as nom, c.nom as categorie, w.nom as wilaya, co.nom as commune, e.adresse, e.tel, e.id FROM ecole e JOIN categorie c on e.categorie = c.id 
                        JOIN commune co on co.id = e.commune
                        JOIN wilaya w on w.id = co.wilaya
                        LEFT OUTER JOIN domaine d on d.id = e.domaine 
                        WHERE e.categorie =".$num;
        return bddConnexion::execute_query($requete);
    }

}