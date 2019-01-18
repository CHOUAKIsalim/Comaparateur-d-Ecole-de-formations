<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 8:15 PM
 */

require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/User/Model/Ecole.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/User/Model/Categorie.php");


class CategorieController
{
    private $ecolesGetter;

    public function __construct()
    {
        $this->categoriesGetter = new Ecole();
    }

    public function getEcoles($num)
    {
        return $this->categoriesGetter->getEcoles($num);
    }

    public function getCategories()
    {
        $temp = new Categorie();
        return $temp->getCategories();
    }

}