<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 09:15
 */

namespace Twitter\Controller\Base\PostController;
use Twitter\Controller\Base\BaseControllerInterface;
use Twitter\Controller\Tweet\TweetController;
use Twitter\Controller\User\UserController;
use Twitter\Controller\Comment\CommentController;

class PostController implements BaseControllerInterface
{
    public function getInput()
    {
        if (isset($_POST["tweet"]))
        {
            $tweetController = new TweetController();
            $tweetController->postMethod();
        }

        if (isset($_POST["comment"]))
        {
            $commentController = new commentController();
            $commentController->postMethod();
        }

        if (isset($_POST["user"]))
        {
            $userController = new userController();
            $userController->postMethod();
        }





    }

}