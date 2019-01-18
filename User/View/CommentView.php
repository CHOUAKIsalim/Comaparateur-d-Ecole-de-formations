<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 9:59 AM
 */

require_once ("Controller/CommentController.php");
require_once ("View/Accueil.php");

class CommentView extends Accueil
{

    private $idEcole;

    private $controleur;

    private $commentaires;


    public function __construct()
    {
        parent::__construct();
        $this->controleur = new CommentController();

    }

    public function getIdEcole($titre)
    {
        $this->idEcole = $this->controleur->getEcoleId($titre)[0]["id"];
    }

    public function afficherTitre($titre)
    {
        $this->getIdEcole($titre);
        echo "<h3 align='center'> Commentaires Pour : ".$titre."</h3>";
    }

    public function afficherCommentaires()
    {
        $this->commentaires = $this->controleur->getCommentaires($this->idEcole);
        echo '<table id="commentaire"><tr id="headTable"><th>Utilisateur</th><th>Commentaire</th></tr>';
        foreach ($this->commentaires as $row)
        {
            echo '<tr><td>'.$row['username'].'</td><td><p>'.$row["message"].'</p></td></tr>';
        }
        echo '</table>';
    }

    public function afficherCorps($num = null)
    {

        echo '<div id="corps" style="color: black">  ';
        $this->afficherTitre($num);
        $this->afficherCommentaires();
        $this->affihcerInputCommentaire();
        echo '</div>';
    }
    public function affihcerInputCommentaire()
    {

        echo '<div id="commentaireSection">
                          <textarea placeholder="Laissez un commentaire ..." id="commentaireInput" name="commentaireInput"></textarea>
                          <input  type="HIDDEN"  id="ecoleComment" value="'.$this->idEcole.'"  >
                              <input  type="HIDDEN"  id="userComment" value="'.$_SESSION["id"].'"  >
                          <button style="width: 100%" onclick="insererCommentaire()"> Inserer </button> 
                  </div>';
    }


}