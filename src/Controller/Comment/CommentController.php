<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 09:31
 */

namespace Twitter\Controller\Comment;
use Twitter\Controller\ClassesInterface;
use Twitter\Model\Classes\Comment;
use Twitter\Model\DBase\CommentDB;
use Twitter\Model\Verification\UserVerify;


class CommentController implements ClassesInterface
{

    public function postMethod()
    {
        if (isset($_POST["comment"]) == true) {
            if (UserVerify::verifyOperations() == "verified") {
                $commentPost = trim($_POST["comment"]);


                switch ($commentPost) {

                    case "add":

                        $tweetId = trim($_POST["tweetId"]);
                        $userId = trim($_POST["userId"]);
                        $text = trim($_POST["text"]);
                        $comment = new Comment($tweetId, $userId, $text);
                        $commentDB = new CommentDB();
                        $commentDB->add($comment);
                        header("Refresh:0");

                        break;


                    default:

                        echo "wrong comment input";
                }

            }
        }

    }
}

