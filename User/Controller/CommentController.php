<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 16/01/2019
 * Time: 10:35 AM
 */

require_once ($_SERVER["DOCUMENT_ROOT"]."/ProjetWeb/User/Model/Comment.php");

class CommentController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }

    public function getEcoleId($titre)
    {
        return $this->commentModel->getId($titre);
    }

    public function getCommentaires($id)
    {
        return $this->commentModel->getCommentaires($id);
    }

    public function insererCommentaire($commentaire,$user,$ecole)
    {
        return $this->commentModel->insererCommentaire($commentaire,$user,$ecole);

    }
}