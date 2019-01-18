<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 8:26 AM
 */

require_once ('../Model/User.php');

class LoginController
{
    private $userGetter;

    public function __construct()
    {
        $this->userGetter = new User();
    }

    public function verifierConnexion($username, $password)
    {
        $result = $this->userGetter->verifyUser($username);
        if(count($result)>0)
        {
            if($result[0]["password"] == $password)
            {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $result[0]["id"];
            }
        }
        header('Location: ../../User');
    }

    public function deconnexion()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../../User');

    }

}