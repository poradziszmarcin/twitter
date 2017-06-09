<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 05.06.2017
 * Time: 19:13
 */

namespace Twitter\Views\Renderer\Tweet;

use Twitter\Model\Classes\Tweet;
use Twitter\Model\DBase\UserDB;
use Twitter\Views\Form\CommentForm;
use Twitter\Views\Form\TweetAddForm;
use Twitter\Views\Renderer\Comment\CommentRenderer;
use Twitter\Views\Renderer\Interfaces\RenderInterfaceWithObject;

class TweetRenderer implements RenderInterfaceWithObject
{
    public function render($tweets)

    {

        echo "<br>";

        if ($tweets == null) {
            echo "Cos tutaj pusto - dodaj jakiegos tweeta";
        } else {
            $id = $this->getUserID();
            $userDB = new UserDB();
            $headerName = $userDB->getNameByID($id)["name"];
            echo "<h3>$headerName</h3>";
            foreach ($tweets as $tweetFromDB) {
                $userID = $tweetFromDB["userID"];

                $userName = $userDB->getNameByID($userID)["name"];
                $text = $tweetFromDB["text"];
                $date = $tweetFromDB["date"];


                echo "<div class='tweet'>";
                echo "<p class='tweetUser'>", $userName, "</p>";
                echo "<p class='tweetText'>", $text, "<p>";
                echo "<p class='tweetTime'>", $this->timeAgo($date), "<p>";
                echo "</div>";
                echo"<br>";
                echo "<p>Komentarze</p>";
                $commentRenderer = new CommentRenderer();
                $commentRenderer->render($tweetFromDB["id"]);
                $commentForm = new CommentForm();
                $commentForm->render($tweetFromDB["id"]);


            }
        }
    }

    public function timeAgo($time)
    {
        $now = mktime();
        $difference = $now - $time;
        switch ($difference) {

            case ($difference < 60):
                echo "$difference second ago";
                break;

            case ($difference >= 60 && $difference < 3600):
                echo round($difference / 60, 0), " minutes ago";
                break;

            case ($difference >= 3600 && $difference < 86400):
                echo round($difference / 3600, 0), " hours ago";
                break;


            case ($difference >= 8640):
                echo date("G:i d-n-o", $time);
                break;
        }
    }

    public function getUserID()
    {
        if (isset($_GET["id"]))
        {
            $id = $_GET["id"];
        }

        else
        {
            $id = $_COOKIE["userId"];
        }

        return $id;
    }

}