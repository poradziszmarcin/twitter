<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 09:15
 */

namespace Twitter\Controller\Base\GetController;
use Twitter\Controller\Base\BaseControllerInterface;
use Twitter\Controller\Tweet\TweetController;
use Twitter\Controller\User\UserController;
use Twitter\Controller\Comment\CommentController;

class GetContoller implements BaseControllerInterface
{
    public function getInput()
    {


        if (isset($_GET["user"]))
        {
            $userController = new userController();
            $userController->getMethod();
        }







    }

}