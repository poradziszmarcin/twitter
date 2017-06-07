<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 09:31
 */

namespace Twitter\Controller\Comment;
use Twitter\Controller\ClassesInterface;

class CommentController implements ClassesInterface
{

    public function postMethod()
    {
        if (isset($_POST["comment"]) == true) {
            $tweetPost = trim($_POST["comment"]);
            var_dump($tweetPost);

            switch ($tweetPost) {

                case "edit":
                    echo "edit comment";
                    break;

                case "update":
                    echo "update comment";
                    break;

                case "delete":
                    echo "delete comment";
                    break;
                default:

                    echo "wrong comment input";
            }

        }

    }
}

