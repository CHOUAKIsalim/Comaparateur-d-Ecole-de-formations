<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 8:15 PM
 */

require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/User/Model/Categorie.php");

require_once ("C:\wamp64\www\ProjetWeb\User\Model\Categorie.php");

class AccueilController
{
    private $categoriesGetter;

    public function __construct()
    {
        $this->categoriesGetter = new Categorie();
    }

    public function getCategories()
    {
        return $this->categoriesGetter->getCategories();
    }

}