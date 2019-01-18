<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:39 PM
 */

require_once ("Controller\AdminPageController.php");

class AdminPage
{

    private $adminPageController;

    public function __construct()
    {
        $this->adminPageController = new AdminPageController();
    }

    public function afficherTitre()
    {
        echo "<h1 align=\"center\">Page administrateur</h1>";
    }

    public function afficherTableauFormations()
    {
        $tableau =  '<table id="tarifs" align="center" border="1" class="tableau" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Nom</th>
                                        <th>Commune</th>
                                        <th>Wilaya</th>
                                        <th>Administrer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';

        $formations = $this->adminPageController->getEcoles();

        foreach ($formations as $row)
        {
            $element = " <tr onclick=''>"  ;
            $element.= "              
                        <td>".$row["id"]."</td>
                        <td>".$row["nom"]."</td>
                        <td>".$row["commune"]."</td>
                        <td>".$row["wilaya"]."</td>";
            if($row["lienAdmin"]) $element.="<td><a target='_blank' href='".$row["lienAdmin"]."'>".$row["nom"]."</a></td>";
            else $element.="<td></td>";
            $element.="<td>";
            if($row["actif"] == 1)
            {
                $element.="  <button onclick='desactiverEcole(".$row["id"].")'> Desactiver </button> 
                         <button onclick='SupprimerEcole(".$row["id"].")'> Supprimer </button>  </td>";
            }
            else
            {
                $element.="  <button onclick='activerEcole(".$row["id"].")'> Activer </button> 
                         <button onclick='SupprimerEcole(".$row["id"].")'> Supprimer </button>  </td>";
            }
            $element.="</tr> ";
            $tableau.= $element;
    }
    $tableau.="</tbody> </table>";
    echo $tableau;
    }

    public function afficherFormInsertion()
    {
        $formInsertion  = "<div id=\"forms\">";
        $formInsertion.=$this->afficherFormInsertionEcole();
        $formInsertion.=$this->afficherFormModification();
        $formInsertion.='</div>';

        echo $formInsertion;
    }

    public function afficherFormModification()
    {
        $communes = $this->adminPageController->getCommunes();
        $categories = $this->adminPageController->getCategories();
        $domaines = $this->adminPageController->getDomaines();
        $ecoles = $this->adminPageController->getEcoles();
        $resultat = '
                     <div class="formulaire" id="modificationForm">
                     <h3 align="center">Modifier une Ecole</h3>
                     Selectionnz une Ecole <select id="selectEcoleModification"> <option value=""> </option> ';
        foreach ($ecoles as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.='</select>
                  Le nom de votre Ecole si vous voulez le modifier <input type="text" id="nomEcoleModification"><br>
                  Voila l\'adresse de votre ecole <input type="text" id="adresseEcoleModification"><br>
                  Voila la commune de votre ecole <select id="communeEcoleModification">';

        foreach ($communes as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.="    </select>
                        Voila la categorie de cette Ecole
                        <select id=\"categorieEcoleModification\"><br>";
        foreach ($categories as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.=" </select>
                      Voila le domaine de votre ecole
                      <select id=\"domaineEcoleModification\"> <option value=''></option>";
        foreach ($domaines as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.="    </select>
                        Voila le numero de telephone <input type=\"text\" id=\"numeroEcoleModification\"><br>
                        Voila le numero du fax <input type=\"text\" id=\"faxEcoleModification\"><br>
                        <button class=\"formsButton\" id=\"edit\"> Modifier </button>
                      </div>";

        return $resultat;
    }

    private function afficherFormInsertionEcole()
    {
        $communes = $this->adminPageController->getCommunes();
        $categories = $this->adminPageController->getCategories();
        $domaines = $this->adminPageController->getDomaines();

        $resultat = '<div class="formulaire" id="insertionForm">
                             <h3 align="center">Ajouter une Ecole</h3>
                             Entrez le code de votre Ecole <input required type="number" id="codeEcoleInsertion"><br>
                             Entrez le nom de votre Ecole <input required type="text" id="nomEcoleInsertion"><br>
                             Entrez l\'adresse de votre ecole <input required type="text" id="adresseEcoleInsertion"><br>
                             Selectionnez la commune de votre ecole <select required id="communeEcoleInsertion">';

        foreach ($communes as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.="    </select>
                        Selectionnez la categorie de cette Ecole
                        <select required id=\"categorieEcoleInsertion\"><br>";
        foreach ($categories as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.=" </select>   
                      Selectionnez le domaine de votre ecole 
                      <select required id=\"domaineEcoleInsertion\"> <option value=''></option>";
        foreach ($domaines as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.="    </select>
                        Entrez le numero de telephone <input required type=\"text\" id=\"numeroEcoleInsertion\"><br>
                        Entrez le numero du fax <input required type=\"text\" id=\"faxEcoleInsertion\"><br>
                        <button class=\"formsButton\" id=\"add\"> Ajouter</button>
                      </div>";
        return $resultat;
    }

    public function afficherCommentaires()
    {
        $this->commentaires = $this->adminPageController->getCommentaires();
        echo '<table id="commentaire"><tr id="headTable"><th>Utilisateur</th><th>Commentaire</th><th>Action</th></tr>';
        foreach ($this->commentaires as $row)
        {
            echo '<tr><td>'.$row['username'].'</td><td><p>'.$row["message"].'</p></td>
                  <td> <button onclick="SupprimerCommentaire('.$row["id"].')"> Supprimer </button>  </td></tr>';
        }
        echo '</table>';
    }

    public function afficherUsers()
    {
        echo "<h3 align='center'>Gestion des Utilisateurs</h3>";
        $users = $this->adminPageController->getUsers();
        echo '<table width="100%" id="users" align="center"><tr id="headTable"><th>Username</th><th>Action</th></tr>';
        foreach ($users as $row)
        {
            echo '<tr><td>'.$row['username'].'</td>
                  <td> <button onclick="SupprimerUser('.$row["id"].')"> Supprimer </button>';
            if($row["actif"]==1)
            {
                echo ' <button onclick="desactiverUser('.$row["id"].')"> Desactiver</button>  </td></tr>';
            }
            else
            {
                echo ' <button onclick="activerUser('.$row["id"].')"> Activer</button>  </td></tr>';
            }
        }
        echo '</table>';

    }

    public function afficherDeconnexion()
    {
        echo "<footer>
                    <form action=\"deconnexion.php\">
                        <input type=\"submit\" value=\"Deconnecter\" style=\"float : right;\">
                    </form>
              </footer>";
    }


}
