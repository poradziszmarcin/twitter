<?php

namespace Twitter\Controller\Tweet;
use Twitter\Controller\ClassesInterface;
use Twitter\Model\Classes\Tweet;
use Twitter\Model\DBase\TweetDB;
use Twitter\Model\Verification\UserVerify;

class TweetController implements ClassesInterface
{
    public function getMethod()
    {

    }

    public function postMethod()
    {
        if (isset($_POST["tweet"])==true)
        {
            if (UserVerify::verifyOperations()=="verified") {
                    $tweetPost = trim($_POST["tweet"]);


                switch ($tweetPost) {

                    case "edit":
                        echo "edit tweet";
                        break;


                    case "delete":
                        echo "delete tweet";
                        break;

                    case "add":

                        $text = trim($_POST["text"]);
                        $userId = $_COOKIE["userId"];
                        $tweet = new Tweet($userId, $text);
                        $tweetDB = new TweetDB();
                        $tweetDB->add($tweet);
                        header('Location: ' . "index.php?user=main");
                        break;

                    default:

                        echo "wrong tweet input";
                }
            }
            else {
                header( "refresh:5;url=index.php?user=logout" );
                echo "unauthorized operation <br>";
                echo "you will be logout in 5 second";

            }

        }
    }

}