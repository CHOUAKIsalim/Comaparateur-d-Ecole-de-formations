<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:09 PM
 */

require_once ("../Model/SuperAdmin.php");


class ConnexionController
{
    private $adminGetter;

    public function __construct()
    {
        $this->adminGetter = new Admin();
    }

    public function verifierConnexion($username, $password)
    {

        $result = $this->adminGetter->verifyAdmin($username);
        if(count($result)>0)
        {
            if($result[0]["password"] == $password)
            {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["type"] =0;
                header('Location: /ProjetWeb/SuperAdmin/admin.php');
            }
            else
            {
                header('Location: /ProjetWeb/SuperAdmin');
            }
        }
        else
        {
            header('Location: /ProjetWeb/SuperAdmin');
        }
    }
}