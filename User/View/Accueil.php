<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 3:05 PM
 */

require_once ("Controller/AccueilController.php");

class Accueil
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new AccueilController();
    }

    public function afficherHead()
    {
        echo '<html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="cache-control" content="no-cache" />
                    <link rel="stylesheet" type="text/css" href="View/Styles/acceuil.css" />
                    <title>Choose Your Formation ! </title>
                
                </head>
                
                <body>';
    }

    public function afficherHeader()
    {
        echo "<div id ='head'>";
            $this->afficherLogo();
            $this->afficherDiaporama();
        echo "</div>";
    }

    public function afficherLogo()
    {
        echo '  <div id="entete">
                    <img id="logo" src="View/Images/logo.jpg"/>
                </div>';
    }

    public function afficherDiaporama()
    {
        echo '    <div id="diaporama">

                </div>';
    }

    public function afficherMenu()
    {
        $categoriesEcole = $this->controleur->getCategories();
        $element= '    
                <div id="aside" width="100%">
                    <div class="menu">
                        <ul >
                             <li><a href="index.php">Accueil</a></li>';
                            foreach ($categoriesEcole as $categorie)
                            {
                                $element.='     
                                <li><a href="'.$categorie["nom"].'">Formations '.$categorie["nom"].'</a> </li>';
                            }
                            $element.=' <li><a href="comparer">Comparer</a></li>
                                        <li><a href="#">A propos</a></li>
                        </ul>
                    </div>
                    <div id="zonePub">
                        <img id ="photo_pub" src="View/Images/publicite.jpg"/>
                    </div>
                ';
        session_start();
        if(!isset($_SESSION["username"]) || empty($_SESSION["username"]))
        {
            $element.="<div id='connexionDiv'>
                            <form id='connexionForm' action='Controller/login.php' method='post'> 
                                <input type='text' name='username' placeholder='username' class='connexionInput'>     
                                <input type='text' name='password' placeholder='password' class='connexionInput'>     
                                <input type='submit' value='Login' class='connexionInput'>
                            </form>
                        </div>";
        }
        else
        {
            $element.="<div id='connexionDiv'>
                            <form id='connexionForm' action='Controller/logout.php' method='post'> 
                                <input type='submit' value='logout' class='connexionInput'>
                            </form>
                        </div>";
        }
        $element.='</div>';
        echo $element;
    }

    public function afficherCorps($num=null)
    {

        $element=
            '    
                <div id="corps">';
                $element.=$this->getCategories();
                $element.='
                </div>';
        echo $element;
    }

    public function afficherPiedDePage()
    {
        $categoriesEcole = $this->controleur->getCategories();
        $element="";

        echo '
                <div id=\'pied_de_page\'>
                <div id="formationsPiedDePage">
                    <ul >';
                    foreach ($categoriesEcole as $categorie) {
                        echo '<li><a href="'.$categorie["nom"].'">'.$categorie["nom"].'</a> </li>';
                    }
            echo '</ul></div>
            <div id="message_pied_de_page">
                <p>Changez votre vie avec nos formations <br />
                N hesiter pas <a href=\'mailto:fs_chouaki@esi.dz\'>à nous contacter</a> pour plus dinformations !</p> 
                Téléphone : +213 790008813 <br />
                Mail : fs_chouaki@esi.dz
            </div>   
      </div>';
    }

    public function fermerBody()
    {
        echo '
          
            </body>
                    <script type="text/javascript" src="View/Scripts/jquery-3.3.1.min.js"> </script>
                    <script type="text/javascript" src="View/Scripts/compare.js"> </script>
            </html>
    ';
    }

    private function getCategories()
    {
        $categoriesEcole = $this->controleur->getCategories();
        $element="";
        foreach ($categoriesEcole as $categorie)
        {
            $element.='                    
                    <div class="categorie"  >
                      <a href="'.$categorie["nom"].'">Formations '.$categorie["nom"].'</a>
                    </div>';
        }
        return $element;

    }

}