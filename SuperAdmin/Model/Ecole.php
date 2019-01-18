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
    function getEcoles($num =null)
    {
        if($num)
            $requete = "SELECT d.nom,e.nom as nom, c.nom as categorie, w.nom as wilaya, co.nom as commune, e.adresse, e.tel, e.id, e.actif, e.lienAdmin FROM ecole e JOIN categorie c on e.categorie = c.id 
                        JOIN commune co on co.id = e.commune
                        JOIN wilaya w on w.id = co.wilaya
                        LEFT OUTER JOIN domaine d on d.id = e.domaine 
                        WHERE e.categorie =".$num;
        else
            $requete = "SELECT e.id, d.nom,e.nom as nom, c.nom as categorie, w.nom as wilaya, co.nom as commune, e.adresse, e.tel, e.id, e.actif, e.lienAdmin FROM ecole e JOIN categorie c on e.categorie = c.id 
                        JOIN commune co on co.id = e.commune
                        JOIN wilaya w on w.id = co.wilaya
                        LEFT OUTER JOIN domaine d on d.id = e.domaine ORDER BY e.id";
        return bddConnexion::execute_query($requete);
    }

    public function supprimerEcole($id)
    {
        $query = "Delete from ecole where id = ".$id;
        return bddConnexion::execute_query($query);
    }

    public function insererEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax)
    {
        if($domaine!="")
        {
            $req = "INSERT INTO ecole (id,nom,adresse,commune,categorie,domaine,tel,fax) 
                VALUES (".$code.",'".$nom."','".$adresse."',".$commune.",".$categorie.",".$domaine.",'".$telephone."','".$fax."')";
        }
        else
        {
            $req = "INSERT INTO ecole (id,nom,adresse,commune,categorie,tel,fax) 
                VALUES (".$code.",'".$nom."','".$adresse."',".$commune.",".$categorie.",'".$telephone."','".$fax."')";
        }
        return bddConnexion::execute_query($req);
    }

    public function getEcole($id)
    {
        $req = "Select * from ecole where id = ".$id;
        return bddConnexion::execute_query($req);
    }

    public function modifierEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax)
    {
        if($domaine!="")
        {
            $req = "UPDATE ecole SET nom = '" . $nom . "', adresse = '" . $adresse . "', commune = " . $commune . ", categorie = " . $categorie . "
                , domaine = " . $domaine . ", tel = '" . $telephone . "', fax = '" . $fax . "' 
                WHERE id = " . $code;
        }
        else
        {
            $req = "UPDATE ecole SET nom = '" . $nom . "', adresse = '" . $adresse . "', commune = " . $commune . ", categorie = " . $categorie . "
                ,  tel = '" . $telephone . "', fax = '" . $fax . "' 
                WHERE id = " . $code;
        }
        return bddConnexion::execute_query($req);
    }

    public function desactiverEcole($id)
    {
        $req = "UPDATE ecole SET actif = 0 where id = ".$id;
        return bddConnexion::execute_query($req);
    }

    public function activerEcole($id)
    {
        $req = "UPDATE ecole SET actif = 1 where id = ".$id;
        return bddConnexion::execute_query($req);
    }

}