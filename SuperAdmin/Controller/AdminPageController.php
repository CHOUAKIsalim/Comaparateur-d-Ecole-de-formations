<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:45 PM
 */


require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/SuperAdmin/Model/Ecole.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/SuperAdmin/Model/Commune.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/SuperAdmin/Model/Categorie.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/SuperAdmin/Model/Domaine.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/SuperAdmin/Model/Comment.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/SuperAdmin/Model/User.php");



class AdminPageController
{
    private $ecoles;
    private $commune;
    private $categorie;
    private $domaine;
    private $commentaire;
    private $users;
    public function __construct()
    {
        $this->ecoles = new Ecole();
        $this->commune = new Commune();
        $this->categorie = new Categorie();
        $this->domaine = new Domaine();
        $this->commentaire = new Comment();
        $this->users = new User();
    }

    public function getEcoles()
    {
        return $this->ecoles->getEcoles();
    }

    public function getCommunes()
    {
        return $this->commune->getCommunes();
    }

    public function getCategories()
    {
        return $this->categorie->getCategories();
    }

    public function getDomaines()
    {
        return $this->domaine->getDomaines();
    }
    public function supprimerEcole($id)
    {
        return $this->ecoles->supprimerEcole($id);
    }

    public function insererEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax)
    {
        return $this->ecoles->insererEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax);
    }

    public function getEcole($code)
    {
        return $this->ecoles->getEcole($code);
    }

    public function modifierEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax)
    {
        return $this->ecoles->modifierEcole($code,$nom,$adresse,$commune,$categorie,$domaine,$telephone,$fax);

    }

    public function desactiverEcole($id)
    {
        return $this->ecoles->desactiverEcole($id);
    }

    public function activerEcole($id)
    {
        return $this->ecoles->activerEcole($id);
    }

    public function getCommentaires()
    {
        return $this->commentaire->getCommentaires();
    }

    public function supprimerCommentaire($id)
    {
        return $this->commentaire->supprimerCommentaire($id);
    }

    public function getUsers()
    {
        return $this->users->getUsers();
    }

    public function supprimerUser($id)
    {
        return $this->users->supprimerUser($id);
    }

    public function desactiverUser($id)
    {
        return $this->users->desactiverUser($id);
    }
    public function activerUser($id)
    {
        return $this->users->activerUser($id);
    }
}